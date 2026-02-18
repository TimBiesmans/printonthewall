<?php

// app/Http/Controllers/PublicQuoteController.php
namespace App\Http\Controllers;

use App\Models\QuoteDocument;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PublicQuoteController extends Controller
{
    public function show(string $hash)
    {
        $doc = QuoteDocument::query()
            ->where('public_hash', $hash)
            ->where('public_enabled', true)
            ->with(['lines', 'request'])
            ->firstOrFail();

        if ($doc->public_expires_at && now()->greaterThan($doc->public_expires_at)) {
            abort(410, 'Deze offerte-link is vervallen.');
        }

        return view('public.quote_show', [
            'doc' => $doc,
            'pdfUrl' => route('public.quote.pdf', $hash),
        ]);
    }

    public function pdf(string $hash)
    {
        $doc = QuoteDocument::query()
            ->where('public_hash', $hash)
            ->where('public_enabled', true)
            ->with(['lines', 'request'])
            ->firstOrFail();

        if ($doc->public_expires_at && now()->greaterThan($doc->public_expires_at)) {
            abort(410, 'Deze offerte-link is vervallen.');
        }

        $pdf = Pdf::loadView('quotes.pdf', [
            'doc' => $doc,
        ])->setPaper('a4');

        $filename = ($doc->number ?: "offerte-{$doc->id}") . ".pdf";

        return $pdf->download($filename);
    }
}