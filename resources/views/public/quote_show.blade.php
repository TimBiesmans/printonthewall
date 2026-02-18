<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Offerte {{ $doc->number ?? ('#'.$doc->id) }} - Print on the wall</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900">
  <div class="max-w-3xl mx-auto px-4 py-10 space-y-6">
    <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6">
      <div class="flex items-start justify-between gap-4">
        <div>
          <h1 class="text-2xl font-extrabold">Offerte {{ $doc->number ?? ('#'.$doc->id) }}</h1>
          <div class="text-sm text-slate-500">
            Datum: {{ optional($doc->date)->format('d/m/Y') ?? '-' }}
            · Geldig tot: {{ optional($doc->valid_until)->format('d/m/Y') ?? '-' }}
          </div>
        </div>

        <a href="{{ $pdfUrl }}"
           class="inline-flex items-center rounded-md bg-[#c22229] px-4 py-2 text-sm font-semibold text-white hover:opacity-90">
          Download PDF
        </a>
      </div>
    </div>

    <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6">
      <div class="text-sm font-semibold text-slate-700">Klant</div>
      <div class="mt-2 text-sm text-slate-800">
        {{ $doc->customer_name ?? '-' }}<br>
        {{ $doc->customer_email ?? '-' }}<br>
        {{ $doc->customer_phone ?? '-' }}<br>
        {{ $doc->customer_location ?? '-' }}
      </div>
    </div>

    @if($doc->intro)
      <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6 text-sm text-slate-700 whitespace-pre-wrap">{{ $doc->intro }}</div>
    @endif

    <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6">
      <div class="text-sm font-semibold text-slate-700">Offerte regels</div>
      <div class="mt-4 space-y-3">
        @foreach($doc->lines as $l)
          <div class="rounded-xl border border-slate-200 p-4">
            <div class="flex items-start justify-between gap-3">
              <div>
                <div class="font-bold">{{ $l->title }}</div>
                @if($l->description)
                  <div class="mt-1 text-sm text-slate-600 whitespace-pre-wrap">{{ $l->description }}</div>
                @endif
                <div class="mt-2 text-xs text-slate-500">
                  {{ number_format((float)$l->qty, 2, ',', '.') }} {{ $l->unit ?? '' }} ·
                  € {{ number_format((float)$l->unit_price, 2, ',', '.') }}
                </div>
              </div>
              <div class="font-extrabold">€ {{ number_format((float)$l->line_total, 2, ',', '.') }}</div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="mt-6 border-t pt-4 space-y-1 text-sm">
        <div class="flex justify-between"><span class="text-slate-600">Subtotaal</span><span class="font-semibold">€ {{ number_format((float)$doc->subtotal, 2, ',', '.') }}</span></div>
        <div class="flex justify-between"><span class="text-slate-600">Korting</span><span class="font-semibold">€ {{ number_format((float)$doc->discount, 2, ',', '.') }}</span></div>
        <div class="flex justify-between"><span class="text-slate-600">BTW ({{ number_format((float)$doc->vat_rate, 2, ',', '.') }}%)</span><span class="font-semibold">€ {{ number_format((float)$doc->vat_amount, 2, ',', '.') }}</span></div>
        <div class="flex justify-between text-base"><span class="font-bold">Totaal</span><span class="font-extrabold">€ {{ number_format((float)$doc->total, 2, ',', '.') }}</span></div>
      </div>
    </div>

    @if($doc->terms)
      <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6">
        <div class="text-sm font-semibold text-slate-700">Voorwaarden</div>
        <div class="mt-2 text-sm text-slate-700 whitespace-pre-wrap">{{ $doc->terms }}</div>
      </div>
    @endif

    <div class="text-xs text-slate-500 text-center">
      © {{ date('Y') }} Print on the wall
    </div>
  </div>
</body>
</html>