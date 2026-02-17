<template>
  <PotwLegalLayout
    title="Cookiebeleid"
    subtitle="Welke cookies we gebruiken en waarom."
    updatedAt="[DATUM]"
    active="cookies"
  >
    <div class="prose prose-slate max-w-none">
      <h2>1. Wat zijn cookies?</h2>
      <p>
        Cookies zijn kleine tekstbestanden die op jouw toestel worden opgeslagen bij een bezoek aan de website.
      </p>

      <h2>2. Welke cookies gebruiken wij?</h2>
      <p>
        We gebruiken enkel noodzakelijke cookies om de website correct te laten werken (bv. formulierverzending, sessiebeveiliging).
      </p>

      <h2>3. Geen marketing of tracking</h2>
      <p>
        We gebruiken momenteel geen tracking pixels of marketing cookies. Als dit verandert, vragen we eerst toestemming.
      </p>

      <h2>4. Cookies beheren</h2>
      <p>
        Je kan cookies beheren of verwijderen via je browserinstellingen. Sommige functies kunnen dan minder goed werken.
      </p>

      <h2>5. Contact</h2>
      <p>Vragen? info@printonthewall.be</p>
    </div>
  </PotwLegalLayout>
</template>

<script setup>
import PotwLegalLayout from "@/Layouts/PotwLegalLayout.vue";
</script>