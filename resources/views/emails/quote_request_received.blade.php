<h2>Nieuwe offerte-aanvraag</h2>

<ul>
  <li><strong>Naam:</strong> {{ $quote->name }}</li>
  <li><strong>E-mail:</strong> {{ $quote->email }}</li>
  <li><strong>Telefoon:</strong> {{ $quote->phone ?? '-' }}</li>
  <li><strong>Locatie:</strong> {{ $quote->location ?? '-' }}</li>
  <li><strong>Afmetingen:</strong> {{ $quote->size ?? '-' }}</li>
  <li><strong>Ondergrond:</strong> {{ $quote->surface ?? '-' }}</li>
  <li><strong>Indoor/Outdoor:</strong> {{ $quote->indoor_outdoor ?? '-' }}</li>
  <li><strong>Timing:</strong> {{ $quote->timeline ?? '-' }}</li>
</ul>

<p><strong>Bericht</strong></p>
<p>{{ $quote->message ?? '-' }}</p>

@if($quote->reference_file_path)
  <p><strong>Upload:</strong> {{ $quote->reference_file_path }}</p>
@endif