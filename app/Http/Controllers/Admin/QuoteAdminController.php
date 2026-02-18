<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\QuoteDocumentLinkMail;
use App\Models\QuoteDocument;
use App\Models\QuoteRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class QuoteAdminController extends Controller
{
    public function index(Request $request)
    {
        $status = (string) $request->query('status', '');
        $q      = trim((string) $request->query('q', ''));

        $quotes = QuoteRequest::query()
            ->when($status !== '', fn ($qry) => $qry->where('status', $status))
            ->when($q !== '', function ($qry) use ($q) {
                $qry->where(function ($s) use ($q) {
                    $s->where('name', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%")
                        ->orWhere('location', 'like', "%{$q}%");
                });
            })
            ->orderByRaw("CASE WHEN status = 'new' THEN 0 ELSE 1 END")
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return Inertia::render('Admin/Quotes/Index', [
            'filters' => [
                'status' => $status !== '' ? $status : null,
                'q' => $q !== '' ? $q : null,
            ],
            'quotes' => $quotes,
        ]);
    }

    public function show(QuoteRequest $quote)
    {
        $hasFile = !empty($quote->reference_file_path);

        $doc = QuoteDocument::query()
            ->where('quote_request_id', $quote->id)
            ->first();

        $publicUrl = null;
        if ($doc && $doc->public_enabled && $doc->public_hash) {
            $publicUrl = route('public.quote.show', $doc->public_hash);
        }

        return Inertia::render('Admin/Quotes/Show', [
            'quote' => $quote,

            // upload helpers
            'has_file' => $hasFile,
            'download_url' => $hasFile ? route('admin.quotes.download', $quote) : null,
            'preview_url' => $hasFile ? route('admin.quotes.preview', $quote) : null,

            // document helpers (voor knoppen in Show)
            'document_edit_url' => route('admin.quotes.document', $quote),
            'document_pdf_url' => route('admin.quotes.pdf', $quote),
            'document_public_url' => $publicUrl,
            'document_public_enabled' => (bool) ($doc?->public_enabled),
            'document_public_expires_at' => $doc?->public_expires_at,
            'document_sent_at' => $doc?->sent_at,
            'document_sent_to' => $doc?->sent_to,

            // voor acties (enable/disable/send) vanuit Show
            'document_public_enable_url' => route('admin.quotes.public.enable', $quote),
            'document_public_disable_url' => route('admin.quotes.public.disable', $quote),
            'document_send_url' => route('admin.quotes.send', $quote),
        ]);
    }

    public function edit(QuoteRequest $quote)
    {
        return Inertia::render('Admin/Quotes/Edit', [
            'quote' => $quote,
            'status_options' => $this->statusOptions(),
        ]);
    }

    public function update(Request $request, QuoteRequest $quote)
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,contacted,quoted,handled,archived'],
            'admin_notes' => ['nullable', 'string', 'max:10000'],
        ]);

        if ($data['status'] === 'handled' && $quote->status !== 'handled') {
            $data['handled_at'] = now();
            $data['handled_by_user_id'] = Auth::id();
        }

        $quote->update($data);

        return redirect()
            ->route('admin.quotes.show', $quote)
            ->with('success', 'Offerte bijgewerkt.');
    }

    public function destroy(QuoteRequest $quote)
    {
        $this->deleteUploadIfExists($quote);

        $quote->delete();

        return redirect()
            ->route('admin.quotes.index')
            ->with('success', 'Offerte verwijderd.');
    }

    /**
     * Document builder/editor pagina.
     */
    public function document(QuoteRequest $quote)
    {
        $doc = QuoteDocument::query()
            ->where('quote_request_id', $quote->id)
            ->with('lines')
            ->first();

        // auto-create eerste keer (met snapshot van aanvraag)
        if (!$doc) {
            $doc = QuoteDocument::create([
                'quote_request_id' => $quote->id,
                'date' => now()->toDateString(),
                'valid_until' => now()->addDays(30)->toDateString(),
                'customer_name' => $quote->name,
                'customer_email' => $quote->email,
                'customer_phone' => $quote->phone,
                'customer_location' => $quote->location,
                'vat_rate' => 21.00,
                'discount' => 0,
                'intro' => "Bedankt voor je aanvraag. Hieronder vind je onze prijsinschatting.",
                'terms' => "Betaling: 30 dagen.\nPlaatsing op afspraak.\nOfferte geldig tot bovenstaande datum.",
            ]);

            $doc->lines()->createMany([
                [
                    'title' => 'Voorbereiding & opmeting',
                    'description' => 'Op locatie + uitlijning print.',
                    'qty' => 1,
                    'unit' => 'stuk',
                    'unit_price' => 0,
                    'line_total' => 0,
                    'sort_order' => 1,
                ],
            ]);

            $doc->load('lines');
        }

        return Inertia::render('Admin/Quotes/Document', [
            'quote' => $quote,
            'document' => $doc,
        ]);
    }

    /**
     * Document opslaan + regels upsert + totals herberekenen.
     */
    public function documentUpdate(Request $request, QuoteRequest $quote)
    {
        $data = $request->validate([
            'date' => ['nullable', 'date'],
            'valid_until' => ['nullable', 'date'],
            'vat_rate' => ['required', 'numeric', 'min:0', 'max:100'],
            'discount' => ['nullable', 'numeric', 'min:0'],

            'intro' => ['nullable', 'string', 'max:20000'],
            'notes' => ['nullable', 'string', 'max:20000'],
            'terms' => ['nullable', 'string', 'max:20000'],

            'customer_name' => ['nullable', 'string', 'max:255'],
            'customer_email' => ['nullable', 'email', 'max:255'],
            'customer_phone' => ['nullable', 'string', 'max:255'],
            'customer_location' => ['nullable', 'string', 'max:255'],

            'lines' => ['array'],
            'lines.*.id' => ['nullable', 'integer'],
            'lines.*.title' => ['required', 'string', 'max:255'],
            'lines.*.description' => ['nullable', 'string', 'max:2000'],
            'lines.*.qty' => ['required', 'numeric', 'min:0'],
            'lines.*.unit' => ['nullable', 'string', 'max:50'],
            'lines.*.unit_price' => ['required', 'numeric', 'min:0'],
            'lines.*.sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $doc = QuoteDocument::query()->firstOrCreate(
            ['quote_request_id' => $quote->id],
            [
                'date' => now()->toDateString(),
                'valid_until' => now()->addDays(30)->toDateString(),
                'customer_name' => $quote->name,
                'customer_email' => $quote->email,
                'customer_phone' => $quote->phone,
                'customer_location' => $quote->location,
                'vat_rate' => 21.00,
                'discount' => 0,
            ]
        );

        DB::transaction(function () use ($doc, $data) {
            // doc fields
            $doc->fill([
                'date' => $data['date'] ?? $doc->date,
                'valid_until' => $data['valid_until'] ?? $doc->valid_until,
                'vat_rate' => $data['vat_rate'],
                'discount' => $data['discount'] ?? 0,

                'intro' => $data['intro'] ?? null,
                'notes' => $data['notes'] ?? null,
                'terms' => $data['terms'] ?? null,

                'customer_name' => $data['customer_name'] ?? null,
                'customer_email' => $data['customer_email'] ?? null,
                'customer_phone' => $data['customer_phone'] ?? null,
                'customer_location' => $data['customer_location'] ?? null,
            ]);

            // ✅ FIX: correcte delete-logica
            $incomingIds = collect($data['lines'] ?? [])->pluck('id')->filter()->values();

            if ($incomingIds->count() > 0) {
                $doc->lines()->whereNotIn('id', $incomingIds)->delete();
            } else {
                // als je lines key meestuurt zonder ids => we vervangen alles
                if (array_key_exists('lines', $data)) {
                    $doc->lines()->delete();
                }
            }

            // upsert/create
            foreach (($data['lines'] ?? []) as $line) {
                $qty = (float) $line['qty'];
                $unitPrice = (float) $line['unit_price'];
                $lineTotal = round($qty * $unitPrice, 2);

                $payload = [
                    'title' => $line['title'],
                    'description' => $line['description'] ?? null,
                    'qty' => $qty,
                    'unit' => $line['unit'] ?? null,
                    'unit_price' => $unitPrice,
                    'line_total' => $lineTotal,
                    'sort_order' => (int) $line['sort_order'],
                ];

                if (!empty($line['id'])) {
                    $doc->lines()->where('id', (int) $line['id'])->update($payload);
                } else {
                    $doc->lines()->create($payload);
                }
            }

            // totals
            $subtotal = (float) $doc->lines()->sum('line_total');
            $discount = (float) ($doc->discount ?? 0);
            $vatRate  = (float) ($doc->vat_rate ?? 0);

            $base = max(0, $subtotal - $discount);
            $vatAmount = round($base * ($vatRate / 100), 2);
            $total = round($base + $vatAmount, 2);

            $doc->subtotal = round($subtotal, 2);
            $doc->vat_amount = $vatAmount;
            $doc->total = $total;

            $doc->save();
        });

        return redirect()
            ->route('admin.quotes.document', $quote)
            ->with('success', 'Offerte-document opgeslagen.');
    }

    /**
     * Force download referentie-upload (admin only).
     */
    public function download(QuoteRequest $quote)
    {
        abort_unless($quote->reference_file_path, 404);

        $path = $quote->reference_file_path;

        abort_unless(Storage::disk('public')->exists($path), 404);

        return Storage::disk('public')->download($path);
    }

    /**
     * Inline preview (images/pdf).
     */
    public function preview(QuoteRequest $quote)
    {
        abort_unless($quote->reference_file_path, 404);

        $path = $quote->reference_file_path;

        abort_unless(Storage::disk('public')->exists($path), 404);

        $disk = Storage::disk('public');
        $mime = $disk->mimeType($path) ?: 'application/octet-stream';
        $contents = $disk->get($path);

        return Response::make($contents, 200, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ]);
    }

    /**
     * Admin PDF download van het offerte-document.
     */
    public function pdf(QuoteRequest $quote)
    {
        $doc = $this->getOrCreateDocumentFor($quote)
            ->load(['lines', 'request']);

        $filename = ($doc->number ?: "offerte-{$quote->id}") . ".pdf";

        $pdf = Pdf::loadView('quotes.pdf', [
            'doc' => $doc,
        ])
        ->setPaper('a4')
        ->setOption('dpi', 96);

        // Enterprise UX → open inline
        return $pdf->stream($filename);
    }

    public function enablePublicLink(Request $request, QuoteRequest $quote)
    {
        $doc = $this->getOrCreateDocumentFor($quote);

        $request->validate([
            'expires_days' => ['nullable', 'integer', 'min:1', 'max:365'],
        ]);

        $this->ensurePublicHash($doc);

        $doc->public_enabled = true;

        $days = $request->integer('expires_days');
        $doc->public_expires_at = $days ? now()->addDays($days) : null;

        $doc->save();

        return back()->with('success', 'Publieke link ingeschakeld.');
    }

    public function disablePublicLink(QuoteRequest $quote)
    {
        $doc = $this->getOrCreateDocumentFor($quote);

        $doc->public_enabled = false;
        $doc->save();

        return back()->with('success', 'Publieke link uitgeschakeld.');
    }

    public function sendOffer(Request $request, QuoteRequest $quote)
    {
        $doc = $this->getOrCreateDocumentFor($quote);
        $this->ensurePublicHash($doc);

        $data = $request->validate([
            'to' => ['nullable', 'email'],
            'expires_days' => ['nullable', 'integer', 'min:1', 'max:365'],
            'message' => ['nullable', 'string', 'max:10000'],
        ]);

        $to = $data['to'] ?: ($doc->customer_email ?: $quote->email);
        abort_unless($to, 422, 'Geen e-mail om naar te sturen.');

        // enable link + expiry
        $doc->public_enabled = true;
        $days = $request->integer('expires_days');
        $doc->public_expires_at = $days ? now()->addDays($days) : null;

        // sent tracking
        $doc->sent_at = now();
        $doc->sent_to = $to;
        $doc->save();

        $publicUrl = route('public.quote.show', $doc->public_hash);

        Mail::to($to)->send(new QuoteDocumentLinkMail(
            doc: $doc->load('lines', 'request'),
            publicUrl: $publicUrl,
            extraMessage: $data['message'] ?? null
        ));

        if (in_array($quote->status, ['new', 'contacted'], true)) {
            $quote->update(['status' => 'quoted']);
        }

        return back()->with('success', 'Offerte verstuurd.');
    }

    // ---------------------------
    // Helpers
    // ---------------------------

    private function deleteUploadIfExists(QuoteRequest $quote): void
    {
        if (!$quote->reference_file_path) return;

        $path = $quote->reference_file_path;

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    private function statusOptions(): array
    {
        return [
            ['value' => 'new', 'label' => 'Nieuw'],
            ['value' => 'contacted', 'label' => 'Gecontacteerd'],
            ['value' => 'quoted', 'label' => 'Offerte gemaakt'],
            ['value' => 'handled', 'label' => 'Afgehandeld'],
            ['value' => 'archived', 'label' => 'Gearchiveerd'],
        ];
    }

    private function getOrCreateDocumentFor(QuoteRequest $quote): QuoteDocument
    {
        return QuoteDocument::query()->firstOrCreate(
            ['quote_request_id' => $quote->id],
            [
                'date' => now()->toDateString(),
                'valid_until' => now()->addDays(30)->toDateString(),
                'customer_name' => $quote->name,
                'customer_email' => $quote->email,
                'customer_phone' => $quote->phone,
                'customer_location' => $quote->location,
                'vat_rate' => 21.00,
                'discount' => 0,
            ]
        );
    }

    private function ensurePublicHash(QuoteDocument $doc): void
    {
        if ($doc->public_hash) return;

        $doc->public_hash = hash('sha256', Str::random(64) . '|' . $doc->id . '|' . microtime(true));
        $doc->save();
    }
}