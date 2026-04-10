<template>
  <footer class="relative mt-20 border-t border-slate-200 bg-gradient-to-b from-white to-[#f6f7f9]">
    <div class="pointer-events-none absolute inset-x-0 -top-px h-px bg-gradient-to-r from-transparent via-slate-300 to-transparent"></div>

    <div class="mx-auto max-w-6xl px-4 py-14">
      <!-- TOP CTA -->
      <div class="mb-12 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
        <div class="grid items-center gap-6 lg:grid-cols-[1fr_auto]">
          <div>
            <div class="text-sm font-bold uppercase tracking-[0.18em] text-[#c22229]">
              Klaar om jouw muur tot leven te brengen?
            </div>

            <h2 class="mt-2 text-2xl font-black text-slate-900 sm:text-3xl">
              Vraag vandaag nog je voorstel of visualisatie aan
            </h2>

            <p class="mt-3 max-w-2xl text-slate-600">
              Stuur ons je idee, afmetingen en liefst ook een foto van de muur.
              Dan bekijken we snel wat mogelijk is voor jouw woning, zaak of kantoor.
            </p>
          </div>

          <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
            <button
              type="button"
              @click="scrollTo('#offerte')"
              class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-6 py-3 text-sm font-semibold text-white shadow hover:opacity-90"
            >
              Vraag gratis visualisatie aan
            </button>

            <a
              v-if="whatsappUrl"
              :href="whatsappUrl"
              target="_blank"
              rel="noopener"
              class="inline-flex items-center justify-center gap-2 rounded-md border border-green-200 bg-green-50 px-6 py-3 text-sm font-semibold text-green-700 shadow-sm hover:bg-green-100"
            >
              <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current">
                <path d="M20.52 3.48A11.86 11.86 0 0 0 12.06 0C5.5 0 .17 5.33.17 11.89c0 2.09.55 4.13 1.59 5.93L0 24l6.37-1.67a11.8 11.8 0 0 0 5.69 1.45h.01c6.56 0 11.89-5.33 11.89-11.89c0-3.18-1.24-6.17-3.44-8.41ZM12.07 21.74h-.01a9.8 9.8 0 0 1-4.99-1.37l-.36-.21-3.78.99l1.01-3.68l-.23-.38a9.8 9.8 0 0 1-1.5-5.2c0-5.42 4.41-9.83 9.84-9.83c2.63 0 5.1 1.02 6.96 2.89a9.77 9.77 0 0 1 2.87 6.95c0 5.42-4.41 9.84-9.82 9.84Zm5.39-7.35c-.3-.15-1.77-.87-2.05-.97c-.27-.1-.47-.15-.67.15c-.2.3-.77.97-.94 1.17c-.17.2-.35.22-.65.08c-.3-.15-1.26-.46-2.4-1.47c-.88-.78-1.48-1.74-1.65-2.04c-.17-.3-.02-.46.13-.61c.13-.13.3-.35.45-.52c.15-.17.2-.3.3-.5c.1-.2.05-.37-.02-.52c-.08-.15-.67-1.62-.92-2.22c-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.08-.8.37c-.27.3-1.04 1.02-1.04 2.48c0 1.47 1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.09 4.49c.71.31 1.27.49 1.7.63c.71.23 1.36.2 1.87.12c.57-.08 1.77-.72 2.02-1.42c.25-.7.25-1.29.17-1.42c-.07-.12-.27-.2-.57-.35Z" />
              </svg>
              Stuur je muurfoto via WhatsApp
            </a>

            <button
              type="button"
              @click="scrollTo('#portfolio')"
              class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-900 hover:bg-slate-50"
            >
              Bekijk realisaties
            </button>
          </div>
        </div>
      </div>

      <div class="grid gap-12 lg:grid-cols-5">
        <!-- BRAND -->
        <div class="lg:col-span-2">
          <div class="text-xl font-black tracking-tight">
            <span class="text-orange-600">Print</span>
            <span class="text-slate-900">onthe</span>
            <span class="text-blue-700">wall</span>
          </div>

          <p class="mt-4 max-w-md leading-relaxed text-slate-600">
            Unieke muurprints rechtstreeks op jouw muur geprint.
            Voor bedrijven en particulieren - van branding en signalisatie tot interieur, kunst en decoratie.
          </p>

          <div class="mt-4 rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-600 shadow-sm">
            <div class="font-semibold text-slate-800">You think it, we print it.</div>
            <div class="mt-1">
              Geen stickers. Geen behang. Wel een echte blikvanger op maat.
            </div>
          </div>

          <!-- SOCIALS -->
          <div class="mt-6 flex items-center gap-4">
            <a
              v-if="socials.facebook"
              :href="socials.facebook"
              target="_blank"
              rel="noopener"
              class="group grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-[2px] hover:border-[#c22229]"
              aria-label="Facebook"
              title="Facebook"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-slate-500 group-hover:text-[#c22229]">
                <path d="M22 12a10 10 0 1 0-11.6 9.9v-7H8v-3h2.4V9.5c0-2.4 1.4-3.7 3.6-3.7c1 0 2.1 .2 2.1 .2v2.3h-1.2c-1.2 0-1.6 .7-1.6 1.5V12H16l-.4 3h-2.3v7A10 10 0 0 0 22 12Z" />
              </svg>
            </a>

            <a
              v-if="socials.instagram"
              :href="socials.instagram"
              target="_blank"
              rel="noopener"
              class="group grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-[2px] hover:border-[#c22229]"
              aria-label="Instagram"
              title="Instagram"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-slate-500 group-hover:text-[#c22229]">
                <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7Zm5 5a5 5 0 1 1 0 10a5 5 0 0 1 0-10Zm6.5-.8a1.2 1.2 0 1 1 0 2.4a1.2 1.2 0 0 1 0-2.4Z" />
              </svg>
            </a>

            <a
              v-if="socials.linkedin"
              :href="socials.linkedin"
              target="_blank"
              rel="noopener"
              class="group grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-[2px] hover:border-[#c22229]"
              aria-label="LinkedIn"
              title="LinkedIn"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-slate-500 group-hover:text-[#c22229]">
                <path d="M4.98 3.5a2.5 2.5 0 1 1-.01 5a2.5 2.5 0 0 1 .01-5ZM3 9h4v12H3V9Zm7 0h3.6v1.6h.05c.5-.9 1.7-1.8 3.5-1.8c3.7 0 4.4 2.4 4.4 5.5V21h-4v-5.6c0-1.3 0-3-1.8-3s-2 1.4-2 2.9V21h-4V9Z" />
              </svg>
            </a>

            <a
              v-if="whatsappUrl"
              :href="whatsappUrl"
              target="_blank"
              rel="noopener"
              class="group grid h-10 w-10 place-items-center rounded-xl border border-green-200 bg-green-50 shadow-sm transition hover:-translate-y-[2px] hover:border-green-500"
              aria-label="WhatsApp"
              title="Stuur je muurfoto via WhatsApp"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-green-600">
                <path d="M20.52 3.48A11.86 11.86 0 0 0 12.06 0C5.5 0 .17 5.33.17 11.89c0 2.09.55 4.13 1.59 5.93L0 24l6.37-1.67a11.8 11.8 0 0 0 5.69 1.45h.01c6.56 0 11.89-5.33 11.89-11.89c0-3.18-1.24-6.17-3.44-8.41Z" />
              </svg>
            </a>
          </div>
        </div>

        <!-- BEDRIJF -->
        <div>
          <div class="mb-4 font-extrabold text-slate-800">Bedrijfsgegevens</div>

          <div class="space-y-1 text-sm text-slate-600">
            <div>{{ company.name }}</div>
            <div>{{ company.street }}</div>
            <div>{{ company.city }}</div>
            <div v-if="company.vat">BTW: {{ company.vat }}</div>
          </div>
        </div>

        <!-- CONTACT -->
        <div>
          <div class="mb-4 font-extrabold text-slate-800">Contact</div>

          <div class="space-y-3 text-sm text-slate-600">
            <a
              v-if="company.email"
              :href="`mailto:${company.email}`"
              class="block transition hover:text-[#c22229]"
            >
              {{ company.email }}
            </a>

            <a
              v-if="company.phone"
              :href="phoneHref"
              class="block transition hover:text-[#c22229]"
            >
              {{ company.phone }}
            </a>

            <a
              v-if="whatsappUrl"
              :href="whatsappUrl"
              target="_blank"
              rel="noopener"
              class="inline-flex items-center gap-2 rounded-md border border-green-200 bg-green-50 px-3 py-2 font-semibold text-green-700 transition hover:bg-green-100"
            >
              <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current">
                <path d="M20.52 3.48A11.86 11.86 0 0 0 12.06 0C5.5 0 .17 5.33.17 11.89c0 2.09.55 4.13 1.59 5.93L0 24l6.37-1.67a11.8 11.8 0 0 0 5.69 1.45h.01c6.56 0 11.89-5.33 11.89-11.89c0-3.18-1.24-6.17-3.44-8.41Z" />
              </svg>
              Stuur je muurfoto via WhatsApp
            </a>
          </div>
        </div>

        <!-- INFO -->
        <div>
          <div class="mb-4 font-extrabold text-slate-800">Info</div>

          <div class="space-y-2 text-sm">
            <button
              type="button"
              @click="scrollTo('#diensten')"
              class="block text-slate-600 transition hover:text-[#c22229]"
            >
              Toepassingen
            </button>

            <button
              type="button"
              @click="scrollTo('#portfolio')"
              class="block text-slate-600 transition hover:text-[#c22229]"
            >
              Realisaties
            </button>

            <button
              type="button"
              @click="scrollTo('#werkwijze')"
              class="block text-slate-600 transition hover:text-[#c22229]"
            >
              Werkwijze
            </button>

            <button
              type="button"
              @click="scrollTo('#prijzen')"
              class="block text-slate-600 transition hover:text-[#c22229]"
            >
              Richtprijzen
            </button>

            <button
              type="button"
              @click="scrollTo('#faq')"
              class="block text-slate-600 transition hover:text-[#c22229]"
            >
              FAQ
            </button>

            <a :href="legalRoutes.privacy" class="block text-slate-600 transition hover:text-[#c22229]">
              Privacybeleid
            </a>

            <a :href="legalRoutes.cookies" class="block text-slate-600 transition hover:text-[#c22229]">
              Cookiebeleid
            </a>

            <a :href="legalRoutes.terms" class="block text-slate-600 transition hover:text-[#c22229]">
              Algemene voorwaarden
            </a>
          </div>
        </div>
      </div>

      <div class="mt-14 flex flex-col justify-between gap-3 border-t border-slate-200 pt-6 text-xs text-slate-500 sm:flex-row">
        <div>© {{ currentYear }} Print on the wall</div>
        <div class="opacity-70">Rechtstreeks op jouw muur geprint.</div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const company = computed(() => page.props.potw?.company ?? {});
const socials = computed(() => page.props.potw?.socials ?? {});
const legalRoutes = computed(() => page.props.potw?.legal_routes ?? {
  privacy: "/privacy",
  cookies: "/cookies",
  terms: "/voorwaarden",
});

const currentYear = new Date().getFullYear();

const phoneHref = computed(() => {
  const phone = company.value?.phone ?? "";
  return `tel:${String(phone).replace(/\s+/g, "")}`;
});

const whatsappUrl = computed(() => {
  const raw = String(company.value?.phone ?? "").trim();
  if (!raw) return "";

  const cleaned = raw.replace(/[^\d+]/g, "");
  const normalized = cleaned.startsWith("+")
    ? cleaned.slice(1)
    : cleaned.startsWith("00")
      ? cleaned.slice(2)
      : cleaned.startsWith("0")
        ? `32${cleaned.slice(1)}`
        : cleaned;

  const message = encodeURIComponent(
    "Hallo! Ik heb interesse in een muurprint voor Print on the wall. Kan ik een eerste inschatting krijgen?"
  );

  return `https://wa.me/${normalized}?text=${message}`;
});

function scrollTo(selector) {
  const el = document.querySelector(selector);
  if (!el) return;

  const headerOffset = 72;
  const rect = el.getBoundingClientRect();
  const y = rect.top + window.scrollY - headerOffset;

  window.scrollTo({
    top: Math.max(0, y),
    behavior: "smooth",
  });
}
</script>