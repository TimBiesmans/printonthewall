<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
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
            // Eerst nieuwe, dan rest; binnen elke groep newest first
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

        return Inertia::render('Admin/Quotes/Show', [
            'quote' => $quote,
            'has_file' => $hasFile,
            // Gebruik altijd download route in admin (veilig & future-proof)
            'download_url' => $hasFile ? route('admin.quotes.download', $quote) : null,
            // Optioneel: preview URL (inline openen in browser)
            'preview_url' => $hasFile ? route('admin.quotes.preview', $quote) : null,
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

        // handled_at/handled_by enkel zetten wanneer status "handled" wordt (eerste keer)
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
     * Force download van de referentie-upload (admin only).
     */
    public function download(QuoteRequest $quote)
    {
        abort_unless($quote->reference_file_path, 404);

        $path = $quote->reference_file_path;

        abort_unless(Storage::disk('public')->exists($path), 404);

        // download() geeft juiste headers + filename
        return Storage::disk('public')->download($path);
    }

    /**
     * Inline preview (openen in browser). Handig voor images/pdf.
     */
    public function preview(QuoteRequest $quote)
    {
        abort_unless($quote->reference_file_path, 404);

        $path = $quote->reference_file_path;

        abort_unless(Storage::disk('public')->exists($path), 404);

        $disk = Storage::disk('public');
        $mime = $disk->mimeType($path) ?: 'application/octet-stream';
        $contents = $disk->get($path);

        // Content-Disposition inline => browser probeert te tonen
        return Response::make($contents, 200, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        ]);
    }

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
}