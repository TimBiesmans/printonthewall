<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Offerte</title>
  <style>
    @page { margin: 28px 34px; }
    body { font-family: DejaVu Sans, Arial, sans-serif; color: #0f172a; font-size: 12px; line-height: 1.35; }
    .muted { color: #64748b; }
    .small { font-size: 10px; }
    .h1 { font-size: 18px; font-weight: 800; margin: 0; }
    .h2 { font-size: 12px; font-weight: 800; margin: 0; }
    .card { border: 1px solid #e2e8f0; border-radius: 10px; padding: 12px 14px; }
    .row { width: 100%; }
    .right { text-align: right; }
    .center { text-align: center; }
    .mt8 { margin-top: 8px; }
    .mt12 { margin-top: 12px; }
    .mt16 { margin-top: 16px; }
    .mt20 { margin-top: 20px; }
    .mt24 { margin-top: 24px; }
    .mb0 { margin-bottom: 0; }
    .hr { border-top: 1px solid #e2e8f0; margin: 10px 0; }
    .tag { display: inline-block; padding: 3px 8px; border-radius: 999px; font-size: 10px; border: 1px solid #e2e8f0; background: #f8fafc; color: #334155; }

    table { border-collapse: collapse; width: 100%; }
    .meta td { vertical-align: top; }
    .meta .label { color: #64748b; font-size: 10px; }
    .meta .value { font-weight: 700; }

    .lines th { text-align: left; font-size: 10px; color: #475569; background: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 8px; }
    .lines td { border-bottom: 1px solid #eef2f7; padding: 8px; vertical-align: top; }
    .lines .num { text-align: right; white-space: nowrap; }
    .lines .desc { color: #64748b; font-size: 10px; margin-top: 2px; }

    .totals { width: 100%; }
    .totals td { padding: 4px 0; }
    .totals .label { color: #64748b; }
    .totals .value { text-align: right; font-weight: 700; white-space: nowrap; }
    .totals .grand { font-size: 16px; font-weight: 900; }

    .footer {
      position: fixed;
      bottom: -8px;
      left: 0;
      right: 0;
      color: #94a3b8;
      font-size: 9px;
    }
    .footer .line { border-top: 1px solid #e2e8f0; margin-bottom: 6px; }
    .footer .cols { width: 100%; }
    .footer .cols td { vertical-align: top; }
  </style>
</head>
<body>
@php
  $fmtMoney = function($n) { return number_format((float)($n ?? 0), 2, ',', '.'); };
  $fmtDate  = function($d) {
    if (!$d) return '-';
    try { return \Carbon\Carbon::parse($d)->format('d/m/Y'); } catch (\Throwable $e) { return (string)$d; }
  };

  $subtotal = (float)($doc->subtotal ?? 0);
  $discount = (float)($doc->discount ?? 0);
  $vatRate  = (float)($doc->vat_rate ?? 0);
  $vatAmt   = (float)($doc->vat_amount ?? 0);
  $total    = (float)($doc->total ?? 0);

  $docNumber = $doc->number ?: ('OFF-' . str_pad((string)$doc->id, 5, '0', STR_PAD_LEFT));
@endphp

  <!-- HEADER -->
  <table class="row">
    <tr>
      <td style="width: 64%;">
        <table>
          <tr>
            <td style="width: 64px; vertical-align: middle;">
              @php
                $logoPath = public_path('images/potw/logo.png');
              @endphp
              @if(file_exists($logoPath))
                <img src="file://{{ $logoPath }}" style="width: 54px; height: auto;">
              @endif
            </td>
            <td style="vertical-align: middle;">
              <div class="h1">Print on the wall</div>
              <div class="muted">You think it, we print it</div>
            </td>
          </tr>
        </table>

        <div class="mt12">
          <span class="tag">Offerte</span>
          <span class="muted small" style="margin-left:8px;">Professionele wallprinter realisaties</span>
        </div>
      </td>

      <td style="width: 36%;" class="right">
        <div style="font-weight:900; font-size: 16px;">Offerte {{ $docNumber }}</div>
        <div class="muted small">Aanvraag #{{ $doc->quote_request_id }}</div>
        <div class="mt8 small">
          <div><span class="muted">Datum:</span> <strong>{{ $fmtDate($doc->date) }}</strong></div>
          <div><span class="muted">Geldig tot:</span> <strong>{{ $fmtDate($doc->valid_until) }}</strong></div>
        </div>
      </td>
    </tr>
  </table>

  <!-- CUSTOMER + COMPANY -->
  <table class="row mt16 meta">
    <tr>
      <td style="width: 52%; padding-right: 10px;">
        <div class="card">
          <div class="h2">Klant</div>
          <div class="hr"></div>

          <table style="width:100%;">
            <tr>
              <td style="width: 34%;">
                <div class="label">Naam</div>
                <div class="value">{{ $doc->customer_name ?: '-' }}</div>
              </td>
              <td style="width: 66%;">
                <div class="label">Locatie</div>
                <div class="value">{{ $doc->customer_location ?: '-' }}</div>
              </td>
            </tr>
            <tr>
              <td style="padding-top: 8px;">
                <div class="label">E-mail</div>
                <div class="value">{{ $doc->customer_email ?: '-' }}</div>
              </td>
              <td style="padding-top: 8px;">
                <div class="label">Telefoon</div>
                <div class="value">{{ $doc->customer_phone ?: '-' }}</div>
              </td>
            </tr>
          </table>
        </div>
      </td>

      <td style="width: 48%; padding-left: 10px;">
        <div class="card">
          <div class="h2">Print on the wall</div>
          <div class="hr"></div>

          <div class="small">
            <div><strong>Bedrijfsnaam</strong> – vul dit in</div>
            <div class="muted">Straat + nr, 0000 Gemeente</div>
            <div class="muted">BTW: BE0XXX.XXX.XXX · RPR: Gent</div>
            <div class="muted">E-mail: info@... · Tel: +32 ...</div>
            <div class="muted">IBAN: BE.. .... .... ....</div>
          </div>

          {{-- OPTIONEEL: QR naar publieke link (als je controller publicUrl meegeeft) --}}
          @if(!empty($publicUrl))
            <div class="mt12">
              <div class="label">Publieke link</div>
              <div class="small" style="word-break: break-all;">{{ $publicUrl }}</div>
            </div>
          @endif
        </div>
      </td>
    </tr>
  </table>

  <!-- INTRO -->
  @if(!empty($doc->intro))
    <div class="mt16 card">
      <div class="h2">Intro</div>
      <div class="hr"></div>
      <div>{!! nl2br(e($doc->intro)) !!}</div>
    </div>
  @endif

  <!-- LINES -->
  <div class="mt16 card">
    <div class="h2">Offerte-regels</div>
    <div class="hr"></div>

    <table class="lines">
      <thead>
        <tr>
          <th>Omschrijving</th>
          <th style="width: 60px;" class="num">Qty</th>
          <th style="width: 60px;">Unit</th>
          <th style="width: 95px;" class="num">Prijs</th>
          <th style="width: 105px;" class="num">Totaal</th>
        </tr>
      </thead>
      <tbody>
        @forelse(($doc->lines ?? []) as $l)
          <tr>
            <td>
              <strong>{{ $l->title }}</strong>
              @if(!empty($l->description))
                <div class="desc">{!! nl2br(e($l->description)) !!}</div>
              @endif
            </td>
            <td class="num">{{ rtrim(rtrim(number_format((float)$l->qty, 2, ',', '.'), '0'), ',') }}</td>
            <td>{{ $l->unit ?: '-' }}</td>
            <td class="num">€ {{ $fmtMoney($l->unit_price) }}</td>
            <td class="num"><strong>€ {{ $fmtMoney($l->line_total) }}</strong></td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="center muted" style="padding: 16px;">Geen regels</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="mt12" style="display:flex; justify-content: space-between;">
      <table class="totals" style="width: 45%; margin-left: auto;">
        <tr>
          <td class="label">Subtotaal</td>
          <td class="value">€ {{ $fmtMoney($subtotal) }}</td>
        </tr>
        <tr>
          <td class="label">Korting</td>
          <td class="value">- € {{ $fmtMoney($discount) }}</td>
        </tr>
        <tr>
          <td class="label">BTW ({{ rtrim(rtrim(number_format($vatRate, 2, ',', '.'), '0'), ',') }}%)</td>
          <td class="value">€ {{ $fmtMoney($vatAmt) }}</td>
        </tr>
        <tr>
          <td colspan="2"><div class="hr"></div></td>
        </tr>
        <tr>
          <td class="label"><strong>Totaal</strong></td>
          <td class="value grand">€ {{ $fmtMoney($total) }}</td>
        </tr>
      </table>
    </div>
  </div>

  <!-- NOTES + TERMS -->
  @if(!empty($doc->notes) || !empty($doc->terms))
    <table class="row mt16">
      <tr>
        <td style="width: 50%; padding-right: 10px;">
          <div class="card">
            <div class="h2">Notities</div>
            <div class="hr"></div>
            <div class="muted">{!! nl2br(e($doc->notes ?: '—')) !!}</div>
          </div>
        </td>
        <td style="width: 50%; padding-left: 10px;">
          <div class="card">
            <div class="h2">Voorwaarden</div>
            <div class="hr"></div>
            <div class="muted">{!! nl2br(e($doc->terms ?: '—')) !!}</div>
          </div>
        </td>
      </tr>
    </table>
  @endif

  <!-- FOOTER -->
  <div class="footer">
    <div class="line"></div>
    <table class="cols">
      <tr>
        <td style="width: 65%;">
          <div>© {{ date('Y') }} Print on the wall · Bedrijfsgegevens: vul aan (BTW, adres, IBAN)</div>
          <div>Deze offerte is indicatief tot bevestiging na opmeting/ondergrondcontrole.</div>
        </td>
        <td style="width: 35%;" class="right">
          <div>Pagina <script type="text/php"> if (isset($pdf)) { echo $PAGE_NUM . " / " . $PAGE_COUNT; } </script></div>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>