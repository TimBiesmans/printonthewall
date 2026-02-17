<?php

namespace App\Http\Controllers;

use App\Mail\QuoteRequestReceived;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class QuoteRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required','string','max:190'],
            'email'         => ['required','email','max:190'],
            'phone'         => ['nullable','string','max:60'],
            'location'      => ['nullable','string','max:190'],
            'size'          => ['nullable','string','max:120'],
            'surface'       => ['nullable','string','max:120'],
            'indoor_outdoor'=> ['nullable','in:indoor,outdoor'],
            'timeline'      => ['nullable','string','max:120'],
            'message'       => ['nullable','string','max:5000'],
            'reference_file'=> ['nullable','file','max:8192'], // 8MB
        ]);

        $path = null;
        if ($request->hasFile('reference_file')) {
            $file = $request->file('reference_file');
            $name = now()->format('Ymd_His') . '_' . Str::random(8) . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('quote_uploads', $name, 'public');
        }

        $quote = QuoteRequest::create([
            ...collect($data)->except('reference_file')->toArray(),
            'reference_file_path' => $path,
        ]);

        // mail naar jou (zet dit in .env als je wil)
        $to = config('mail.quote_to', env('QUOTE_TO_EMAIL', 'info@printonthewall.be'));
        Mail::to($to)->send(new QuoteRequestReceived($quote));

        return back()->with('success', 'Bedankt! Je offerte-aanvraag is verzonden.');
    }
}