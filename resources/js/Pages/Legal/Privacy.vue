<template>
  <PotwLegalLayout
    title="Privacybeleid"
    subtitle="Hoe we jouw gegevens verwerken bij offerte-aanvragen en contact."
    updatedAt="[DATUM]"
    active="privacy"
  >
    <div class="prose prose-slate max-w-none">
      <h2>1. Wie zijn wij?</h2>
      <p>
        Print on the wall BV - [Adres] - [Postcode + Gemeente] - België - BTW: [BE...].
        Contact: info@printonthewall.be.
      </p>

      <h2>2. Welke gegevens verzamelen wij?</h2>
      <ul>
        <li>Naam, e-mail, telefoon</li>
        <li>Locatie of gemeente</li>
        <li>Projectinfo (afmetingen, ondergrond, timing, bericht)</li>
        <li>Uploads (referentiefoto of PDF) - enkel voor prijsinschatting en uitvoering</li>
      </ul>

      <h2>3. Doeleinden</h2>
      <ul>
        <li>Behandelen van offerte-aanvragen</li>
        <li>Contact opnemen en planning</li>
        <li>Administratie en wettelijke verplichtingen</li>
      </ul>

      <h2>4. Rechtsgrond</h2>
      <ul>
        <li>Toestemming (formulier/checkbox)</li>
        <li>Noodzaak voor uitvoering overeenkomst (als je klant wordt)</li>
        <li>Wettelijke verplichtingen (boekhouding)</li>
      </ul>

      <h2>5. Bewaartermijnen</h2>
      <ul>
        <li>Offerte-aanvragen zonder opdracht: max. 24 maanden</li>
        <li>Klantgegevens: volgens wettelijke termijnen</li>
      </ul>

      <h2>6. Delen met derden</h2>
      <p>
        We verkopen geen gegevens. We kunnen wel gebruik maken van hosting/e-mail/boekhoudsoftware als verwerker.
      </p>

      <h2>7. Jouw rechten</h2>
      <p>
        Je hebt recht op inzage, correctie, verwijdering, beperking en overdraagbaarheid. Contacteer ons via e-mail.
      </p>

      <h2>8. Beveiliging</h2>
      <p>
        We nemen passende technische en organisatorische maatregelen om gegevens te beveiligen.
      </p>

      <h2>9. Wijzigingen</h2>
      <p>
        We kunnen dit beleid aanpassen. De nieuwste versie staat steeds op deze pagina.
      </p>
    </div>
  </PotwLegalLayout>
</template>

<script setup>
import PotwLegalLayout from "@/Layouts/PotwLegalLayout.vue";
</script>