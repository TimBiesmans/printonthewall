<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">

    <title>
        Offerte {{ $doc->number ?? '' }}
    </title>

    <style>
        @page {
            margin: 30px 38px 62px 38px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, Arial, sans-serif;
            color: #172033;
            font-size: 10.5px;
            line-height: 1.45;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            vertical-align: top;
        }

        p {
            margin: 0 0 6px 0;
        }

        .muted {
            color: #6b7280;
        }

        .small {
            font-size: 9px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .nowrap {
            white-space: nowrap;
        }

        /*
        |--------------------------------------------------------------------------
        | Header
        |--------------------------------------------------------------------------
        */

        .header {
            margin-bottom: 16px;
        }

        .header-brand {
            width: 64%;
        }

        .header-document {
            width: 36%;
            text-align: right;
        }

        .logo {
            width: 66px;
            height: auto;
        }

        .brand-name {
            margin: 0;
            font-size: 20px;
            line-height: 1.1;
            font-weight: 800;
            color: #111827;
        }

        .brand-tagline {
            margin-top: 4px;
            font-size: 10px;
            color: #6b7280;
        }

        .document-label {
            margin-bottom: 4px;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.3px;
            text-transform: uppercase;
            color: #c22229;
        }

        .document-number {
            margin: 0;
            font-size: 18px;
            line-height: 1.15;
            font-weight: 800;
            color: #111827;
        }

        .document-request {
            margin-top: 3px;
            font-size: 9px;
            color: #6b7280;
        }

        .document-dates {
            width: auto;
            margin-top: 10px;
            margin-left: auto;
        }

        .document-dates td {
            padding: 1px 0 1px 12px;
        }

        .document-dates .label {
            color: #6b7280;
        }

        .document-dates .value {
            font-weight: 700;
            text-align: right;
            white-space: nowrap;
        }

        .header-line {
            height: 3px;
            margin-bottom: 20px;
            background: #c22229;
        }

        /*
        |--------------------------------------------------------------------------
        | Sections
        |--------------------------------------------------------------------------
        */

        .section {
            margin-top: 18px;
        }

        .section-title {
            margin: 0 0 9px 0;
            padding-bottom: 6px;
            border-bottom: 1px solid #dfe3ea;
            font-size: 10.5px;
            font-weight: 800;
            letter-spacing: 0.55px;
            text-transform: uppercase;
            color: #172033;
        }

        .section-title-bar {
            display: inline-block;
            width: 3px;
            height: 11px;
            margin-right: 7px;
            vertical-align: -1px;
            background: #c22229;
        }

        /*
        |--------------------------------------------------------------------------
        | Customer and company
        |--------------------------------------------------------------------------
        */

        .parties {
            margin-top: 0;
        }

        .party-left {
            width: 51%;
            padding-right: 18px;
        }

        .party-right {
            width: 49%;
            padding-left: 18px;
            border-left: 1px solid #e1e5eb;
        }

        .party-heading {
            margin-bottom: 9px;
            font-size: 8.5px;
            font-weight: 800;
            letter-spacing: 0.7px;
            text-transform: uppercase;
            color: #c22229;
        }

        .party-name {
            margin-bottom: 5px;
            font-size: 12px;
            font-weight: 800;
            color: #111827;
        }

        .party-line {
            margin-bottom: 2px;
            color: #4b5563;
        }

        .contact-table {
            margin-top: 9px;
        }

        .contact-table td {
            padding: 2px 0;
        }

        .contact-label {
            width: 25%;
            padding-right: 8px;
            color: #6b7280;
        }

        .contact-value {
            width: 75%;
            color: #172033;
        }

        /*
        |--------------------------------------------------------------------------
        | Intro
        |--------------------------------------------------------------------------
        */

        .intro {
            margin-top: 19px;
            padding: 12px 14px;
            border-left: 3px solid #c22229;
            background: #f7f8fa;
            color: #374151;
            page-break-inside: avoid;
        }

        /*
        |--------------------------------------------------------------------------
        | Offer lines
        |--------------------------------------------------------------------------
        */

        .offer-lines {
            margin-top: 2px;
        }

        .offer-lines thead {
            display: table-header-group;
        }

        .offer-lines tr {
            page-break-inside: avoid;
        }

        .offer-lines th {
            padding: 8px 7px;
            border-top: 1px solid #d9dee6;
            border-bottom: 1px solid #cfd5de;
            background: #f3f4f6;
            color: #4b5563;
            font-size: 8px;
            font-weight: 800;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .offer-lines td {
            padding: 9px 7px;
            border-bottom: 1px solid #e8ebef;
        }

        .description-column {
            width: 48%;
        }

        .quantity-column {
            width: 9%;
            text-align: right;
        }

        .unit-column {
            width: 10%;
        }

        .price-column {
            width: 15%;
            text-align: right;
        }

        .total-column {
            width: 18%;
            text-align: right;
        }

        .line-title {
            font-weight: 700;
            color: #172033;
        }

        .line-description {
            margin-top: 3px;
            color: #77808f;
            font-size: 9px;
            line-height: 1.4;
        }

        .line-total {
            font-weight: 800;
            color: #111827;
        }

        /*
        |--------------------------------------------------------------------------
        | Totals
        |--------------------------------------------------------------------------
        */

        .totals-wrapper {
            margin-top: 14px;
            page-break-inside: avoid;
        }

        .totals-empty {
            width: 53%;
        }

        .totals-cell {
            width: 47%;
        }

        .totals td {
            padding: 4px 0 4px 12px;
        }

        .totals-label {
            color: #667085;
        }

        .totals-value {
            font-weight: 700;
            text-align: right;
            white-space: nowrap;
            color: #172033;
        }

        .grand-total td {
            padding-top: 10px;
            padding-bottom: 10px;
            border-top: 2px solid #c22229;
            border-bottom: 2px solid #c22229;
            background: #faf4f4;
        }

        .grand-total .totals-label {
            font-size: 11.5px;
            font-weight: 800;
            color: #111827;
        }

        .grand-total .totals-value {
            font-size: 16px;
            font-weight: 900;
            color: #c22229;
        }

        /*
        |--------------------------------------------------------------------------
        | Notes and terms
        |--------------------------------------------------------------------------
        */

        .information-table {
            margin-top: 20px;
        }

        .information-table tr {
            page-break-inside: avoid;
        }

        .information-left {
            width: 50%;
            padding-right: 12px;
        }

        .information-right {
            width: 50%;
            padding-left: 12px;
        }

        .information-full {
            width: 100%;
        }

        .information-block {
            padding-top: 9px;
            border-top: 2px solid #172033;
        }

        .information-title {
            margin-bottom: 7px;
            font-size: 9.5px;
            font-weight: 800;
            letter-spacing: 0.45px;
            text-transform: uppercase;
            color: #172033;
        }

        .information-content {
            font-size: 9.5px;
            color: #596273;
        }

        /*
        |--------------------------------------------------------------------------
        | Public URL
        |--------------------------------------------------------------------------
        */

        .public-url {
            margin-top: 18px;
            padding: 10px 12px;
            border: 1px solid #e1e5eb;
            background: #f8f9fb;
            page-break-inside: avoid;
        }

        .public-url-label {
            margin-bottom: 4px;
            font-size: 8.5px;
            font-weight: 800;
            text-transform: uppercase;
            color: #6b7280;
        }

        .public-url-value {
            font-size: 8.5px;
            color: #374151;
            word-break: break-all;
        }

        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */

        .footer {
            position: fixed;
            right: 0;
            bottom: -43px;
            left: 0;
            height: 35px;
            padding-top: 7px;
            border-top: 1px solid #dfe3e8;
            color: #8a93a0;
            font-size: 8px;
            line-height: 1.35;
        }

        .footer-left {
            width: 72%;
        }

        .footer-right {
            width: 28%;
            text-align: right;
        }
    </style>
</head>

<body>
@php
    /*
    |--------------------------------------------------------------------------
    | Formatting
    |--------------------------------------------------------------------------
    */

    $fmtMoney = function ($number) {
        return number_format(
            (float) ($number ?? 0),
            2,
            ',',
            '.'
        );
    };

    $fmtQuantity = function ($number) {
        return rtrim(
            rtrim(
                number_format(
                    (float) ($number ?? 0),
                    2,
                    ',',
                    '.'
                ),
                '0'
            ),
            ','
        );
    };

    $fmtPercentage = function ($number) {
        return rtrim(
            rtrim(
                number_format(
                    (float) ($number ?? 0),
                    2,
                    ',',
                    '.'
                ),
                '0'
            ),
            ','
        );
    };

    $fmtDate = function ($date) {
        if (!$date) {
            return '-';
        }

        try {
            return \Carbon\Carbon::parse($date)->format('d/m/Y');
        } catch (\Throwable $exception) {
            return (string) $date;
        }
    };

    /*
    |--------------------------------------------------------------------------
    | Document values
    |--------------------------------------------------------------------------
    */

    $subtotal = (float) ($doc->subtotal ?? 0);
    $discount = (float) ($doc->discount ?? 0);
    $vatRate = (float) ($doc->vat_rate ?? 0);
    $vatAmount = (float) ($doc->vat_amount ?? 0);
    $total = (float) ($doc->total ?? 0);

    $documentNumber = !empty($doc->number)
        ? $doc->number
        : 'OFF-' . str_pad(
            (string) $doc->id,
            5,
            '0',
            STR_PAD_LEFT
        );

    $logoPath = public_path('images/potw/logo.png');

    /*
    |--------------------------------------------------------------------------
    | Optional dynamic company data
    |--------------------------------------------------------------------------
    |
    | De controller kan eventueel een $company-object of array meegeven.
    | Wanneer dit niet gebeurt, wordt enkel de vaste merknaam weergegeven.
    |
    */

    $companyData = $company ?? ($doc->company ?? null);

    $companyValue = function ($key, $fallback = null) use ($companyData) {
        if (!$companyData) {
            return $fallback;
        }

        if (is_array($companyData)) {
            return $companyData[$key] ?? $fallback;
        }

        return $companyData->{$key} ?? $fallback;
    };

    $companyName = $companyValue('name', 'Print on the wall');

    $companyAddress = $companyValue('address');
    $companyPostalCode = $companyValue('postal_code');
    $companyCity = $companyValue('city');
    $companyVat = $companyValue('vat_number')
        ?? $companyValue('vat');
    $companyRegistration = $companyValue('registration_number')
        ?? $companyValue('rpr');
    $companyEmail = $companyValue('email');
    $companyPhone = $companyValue('phone');
    $companyIban = $companyValue('iban');
    $companyWebsite = $companyValue('website');
@endphp

{{-- HEADER --}}
<table class="header">
    <tr>
        <td class="header-brand">
            <table>
                <tr>
                    @if(file_exists($logoPath))
                        <td style="width: 82px; vertical-align: middle;">
                            <img
                                src="file://{{ $logoPath }}"
                                class="logo"
                                alt="Print on the wall"
                            >
                        </td>
                    @endif

                    <td style="vertical-align: middle;">
                        <div class="brand-name">
                            {{ $companyName }}
                        </div>

                        <div class="brand-tagline">
                            You think it, we print it
                        </div>
                    </td>
                </tr>
            </table>
        </td>

        <td class="header-document">
            <div class="document-label">
                Offerte
            </div>

            <div class="document-number">
                {{ $documentNumber }}
            </div>

            {{-- @if(!empty($doc->quote_request_id))
                <div class="document-request">
                    Aanvraag #{{ $doc->quote_request_id }}
                </div>
            @endif --}}

            <table class="document-dates">
                <tr>
                    <td class="label">
                        Offertedatum
                    </td>

                    <td class="value">
                        {{ $fmtDate($doc->date) }}
                    </td>
                </tr>

                <tr>
                    <td class="label">
                        Geldig tot
                    </td>

                    <td class="value">
                        {{ $fmtDate($doc->valid_until) }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<div class="header-line"></div>

{{-- CUSTOMER AND COMPANY --}}
<table class="parties">
    <tr>
        <td class="party-left">
            <div class="party-heading">
                Offerte voor
            </div>

            <div class="party-name">
                {{ $doc->customer_name ?: '-' }}
            </div>

            @if(!empty($doc->customer_location))
                <div class="party-line">
                    {!! nl2br(e($doc->customer_location)) !!}
                </div>
            @endif

            @if(
                !empty($doc->customer_email)
                || !empty($doc->customer_phone)
            )
                <table class="contact-table">
                    @if(!empty($doc->customer_email))
                        <tr>
                            <td class="contact-label">
                                E-mail
                            </td>

                            <td class="contact-value">
                                {{ $doc->customer_email }}
                            </td>
                        </tr>
                    @endif

                    @if(!empty($doc->customer_phone))
                        <tr>
                            <td class="contact-label">
                                Telefoon
                            </td>

                            <td class="contact-value">
                                {{ $doc->customer_phone }}
                            </td>
                        </tr>
                    @endif
                </table>
            @endif
        </td>

        <td class="party-right">
            <div class="party-heading">
                Aangeboden door
            </div>

            <div class="party-name">
                Print On The Wall
            </div>

            <div class="party-line">
                Kathelijne Idestraat 34
            </div>

            <div class="party-line">
                8310 Assebroek
            </div>

            <table class="contact-table">
                  <tr>
                      <td class="contact-label">
                          BTW
                      </td>

                      <td class="contact-value">
                          BE0695762192
                      </td>
                  </tr>

                  <tr>
                      <td class="contact-label">
                          E-mail
                      </td>

                      <td class="contact-value">
                          print@printonthewall.be
                      </td>
                  </tr>

              @if(!empty($companyPhone))
                  <tr>
                      <td class="contact-label">
                          Telefoon
                      </td>

                      <td class="contact-value">
                          +32 451 03 14 92
                      </td>
                  </tr>
              @endif

              @if(!empty($companyWebsite))
                  <tr>
                      <td class="contact-label">
                          Website
                      </td>

                      <td class="contact-value">
                          {{ $companyWebsite }}
                      </td>
                  </tr>
              @endif

              @if(!empty($companyIban))
                  <tr>
                      <td class="contact-label">
                          IBAN
                      </td>

                      <td class="contact-value">
                          {{ $companyIban }}
                      </td>
                  </tr>
              @endif
          </table>
        </td>
    </tr>
</table>

{{-- INTRO --}}
@if(!empty($doc->intro))
    <div class="intro">
        {!! nl2br(e($doc->intro)) !!}
    </div>
@endif

{{-- OFFER LINES --}}
<div class="section">
    <div class="section-title">
        <span class="section-title-bar"></span>
        Omschrijving en prijs
    </div>

    <table class="offer-lines">
        <thead>
            <tr>
                <th class="description-column">
                    Omschrijving
                </th>

                <th class="quantity-column">
                    Aantal
                </th>

                <th class="unit-column">
                    Eenheid
                </th>

                <th class="price-column">
                    Eenheidsprijs
                </th>

                <th class="total-column">
                    Bedrag
                </th>
            </tr>
        </thead>

        <tbody>
            @forelse(($doc->lines ?? []) as $line)
                <tr>
                    <td class="description-column">
                        <div class="line-title">
                            {{ $line->title ?: '-' }}
                        </div>

                        @if(!empty($line->description))
                            <div class="line-description">
                                {!! nl2br(e($line->description)) !!}
                            </div>
                        @endif
                    </td>

                    <td class="quantity-column nowrap">
                        {{ $fmtQuantity($line->qty) }}
                    </td>

                    <td class="unit-column">
                        {{ $line->unit ?: '-' }}
                    </td>

                    <td class="price-column nowrap">
                        € {{ $fmtMoney($line->unit_price) }}
                    </td>

                    <td class="total-column nowrap line-total">
                        € {{ $fmtMoney($line->line_total) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td
                        colspan="5"
                        class="text-center muted"
                        style="padding: 18px;"
                    >
                        Er werden geen offerteregels toegevoegd.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- TOTALS --}}
    <table class="totals-wrapper">
        <tr>
            <td class="totals-empty"></td>

            <td class="totals-cell">
                <table class="totals">
                    <tr>
                        <td class="totals-label">
                            Subtotaal excl. BTW
                        </td>

                        <td class="totals-value">
                            € {{ $fmtMoney($subtotal) }}
                        </td>
                    </tr>

                    @if($discount != 0)
                        <tr>
                            <td class="totals-label">
                                Korting
                            </td>

                            <td class="totals-value">
                                - € {{ $fmtMoney(abs($discount)) }}
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td class="totals-label">
                            BTW {{ $fmtPercentage($vatRate) }}%
                        </td>

                        <td class="totals-value">
                            € {{ $fmtMoney($vatAmount) }}
                        </td>
                    </tr>

                    <tr class="grand-total">
                        <td class="totals-label">
                            Totaal incl. BTW
                        </td>

                        <td class="totals-value">
                            € {{ $fmtMoney($total) }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>

{{-- NOTES AND TERMS --}}
@if(!empty($doc->notes) || !empty($doc->terms))
    <table class="information-table">
        <tr>
            @if(!empty($doc->notes))
                <td
                    class="{{ !empty($doc->terms) ? 'information-left' : 'information-full' }}"
                >
                    <div class="information-block">
                        <div class="information-title">
                            Opmerkingen
                        </div>

                        <div class="information-content">
                            {!! nl2br(e($doc->notes)) !!}
                        </div>
                    </div>
                </td>
            @endif

            @if(!empty($doc->terms))
                <td
                    class="{{ !empty($doc->notes) ? 'information-right' : 'information-full' }}"
                >
                    <div class="information-block">
                        <div class="information-title">
                            Voorwaarden
                        </div>

                        <div class="information-content">
                            {!! nl2br(e($doc->terms)) !!}
                        </div>
                    </div>
                </td>
            @endif
        </tr>
    </table>
@endif

{{-- OPTIONAL PUBLIC URL --}}
@if(!empty($publicUrl))
    <div class="public-url">
        <div class="public-url-label">
            Digitale offerte
        </div>

        <div class="public-url-value">
            {{ $publicUrl }}
        </div>
    </div>
@endif

{{-- FOOTER --}}
<div class="footer">
    <table>
        <tr>
            <td class="footer-left">
                <strong>{{ $companyName }}</strong>

                @if(!empty($companyVat))
                    · {{ $companyVat }}
                @endif

                @if(!empty($companyEmail))
                    · {{ $companyEmail }}
                @endif

                @if(!empty($companyPhone))
                    · {{ $companyPhone }}
                @endif

                <br>

                Deze offerte is onder voorbehoud van definitieve opmeting,
                bereikbaarheid en controle van de ondergrond.
            </td>

            <td class="footer-right">
                Offerte {{ $documentNumber }}
            </td>
        </tr>
    </table>
</div>

{{-- DOMPDF PAGE NUMBERING --}}
<script type="text/php">
    if (isset($pdf) && isset($fontMetrics)) {
        $font = $fontMetrics->get_font(
            "DejaVu Sans",
            "normal"
        );

        $pdf->page_text(
            470,
            814,
            "Pagina {PAGE_NUM} van {PAGE_COUNT}",
            $font,
            8,
            array(0.54, 0.58, 0.63)
        );
    }
</script>
</body>
</html>