<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Offerte – Print on the wall</title>
</head>
<body style="margin:0;background:#f3f5f8;font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif;color:#0f172a;">
  <div style="max-width:640px;margin:0 auto;padding:24px;">
    <div style="background:#ffffff;border:1px solid #e2e8f0;border-radius:16px;overflow:hidden;">
      <div style="padding:20px 22px;border-bottom:1px solid #e2e8f0;">
        <div style="font-weight:800;font-size:18px;line-height:1.2;">{{ $brandName }}</div>
        <div style="color:#64748b;font-size:12px;margin-top:4px;">You think it, we print it</div>
      </div>

      <div style="padding:22px;">
        <h1 style="margin:0 0 10px 0;font-size:18px;line-height:1.3;">Je offerte is klaar</h1>

        <p style="margin:0 0 14px 0;color:#334155;font-size:14px;line-height:1.6;">
          Hallo {{ $quote->name }},
          <br>
          Je kan je offerte bekijken via onderstaande knop.
        </p>

        <div style="margin:18px 0;">
          <a href="{{ $publicUrl }}"
             style="display:inline-block;background:#c22229;color:#fff;text-decoration:none;font-weight:700;font-size:14px;padding:12px 16px;border-radius:10px;">
            Offerte bekijken
          </a>
        </div>

        <p style="margin:0 0 10px 0;color:#64748b;font-size:12px;line-height:1.6;">
          Werkt de knop niet? Kopieer deze link in je browser:
          <br>
          <span style="color:#0f172a;">{{ $publicUrl }}</span>
        </p>

        <div style="margin-top:18px;padding-top:14px;border-top:1px solid #e2e8f0;color:#64748b;font-size:12px;line-height:1.6;">
          <div><strong>Referentie:</strong> Offerte #{{ $quote->id }}</div>
          <div><strong>Aanvraagdatum:</strong> {{ \Carbon\Carbon::parse($quote->created_at)->format('d/m/Y H:i') }}</div>
        </div>
      </div>

      <div style="padding:16px 22px;background:#f8fafc;border-top:1px solid #e2e8f0;color:#64748b;font-size:12px;line-height:1.6;">
        <div>© {{ now()->year }} {{ $brandName }}. Alle rechten voorbehouden.</div>
      </div>
    </div>
  </div>
</body>
</html>