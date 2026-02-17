<template>
  <footer class="relative mt-20 border-t border-slate-200 bg-gradient-to-b from-white to-[#f6f7f9]">
    <div class="pointer-events-none absolute inset-x-0 -top-px h-px bg-gradient-to-r from-transparent via-slate-300 to-transparent"></div>

    <div class="mx-auto max-w-6xl px-4 py-14">
      <div class="grid lg:grid-cols-5 gap-12">
        <!-- BRAND -->
        <div class="lg:col-span-2">
          <div class="text-xl font-black tracking-tight">
            <span class="text-orange-600">Print</span>
            <span class="text-slate-900">onthe</span>
            <span class="text-blue-700">wall</span>
          </div>

          <p class="mt-4 text-slate-600 leading-relaxed max-w-md">
            Professionele muurprints voor bedrijven en particulieren.
            Branding, kunst, signalisatie en interieurprints rechtstreeks op jouw muur.
          </p>

          <!-- SOCIALS -->
          <div class="mt-6 flex items-center gap-4">
            <a
              v-if="socials.facebook"
              :href="socials.facebook"
              target="_blank"
              rel="noopener"
              class="group h-10 w-10 rounded-xl border border-slate-200 bg-white shadow-sm grid place-items-center
                     transition hover:-translate-y-[2px] hover:border-[#c22229]"
              aria-label="Facebook"
              title="Facebook"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-slate-500 group-hover:text-[#c22229]">
                <path d="M22 12a10 10 0 1 0-11.6 9.9v-7H8v-3h2.4V9.5c0-2.4 1.4-3.7 3.6-3.7c1 0 2.1 .2 2.1 .2v2.3h-1.2c-1.2 0-1.6 .7-1.6 1.5V12H16l-.4 3h-2.3v7A10 10 0 0 0 22 12Z"/>
              </svg>
            </a>

            <a
              v-if="socials.instagram"
              :href="socials.instagram"
              target="_blank"
              rel="noopener"
              class="group h-10 w-10 rounded-xl border border-slate-200 bg-white shadow-sm grid place-items-center
                     transition hover:-translate-y-[2px] hover:border-[#c22229]"
              aria-label="Instagram"
              title="Instagram"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-slate-500 group-hover:text-[#c22229]">
                <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7Zm5 5a5 5 0 1 1 0 10a5 5 0 0 1 0-10Zm6.5-.8a1.2 1.2 0 1 1 0 2.4a1.2 1.2 0 0 1 0-2.4Z"/>
              </svg>
            </a>

            <a
              v-if="socials.linkedin"
              :href="socials.linkedin"
              target="_blank"
              rel="noopener"
              class="group h-10 w-10 rounded-xl border border-slate-200 bg-white shadow-sm grid place-items-center
                     transition hover:-translate-y-[2px] hover:border-[#c22229]"
              aria-label="LinkedIn"
              title="LinkedIn"
            >
              <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current text-slate-500 group-hover:text-[#c22229]">
                <path d="M4.98 3.5a2.5 2.5 0 1 1-.01 5a2.5 2.5 0 0 1 .01-5ZM3 9h4v12H3V9Zm7 0h3.6v1.6h.05c.5-.9 1.7-1.8 3.5-1.8c3.7 0 4.4 2.4 4.4 5.5V21h-4v-5.6c0-1.3 0-3-1.8-3s-2 1.4-2 2.9V21h-4V9Z"/>
              </svg>
            </a>
          </div>
        </div>

        <!-- BEDRIJF -->
        <div>
          <div class="font-extrabold text-slate-800 mb-4">Bedrijfsgegevens</div>
          <div class="space-y-1 text-slate-600 text-sm">
            <div>{{ company.name }}</div>
            <div>{{ company.street }}</div>
            <div>{{ company.city }}</div>
            <div>BTW: {{ company.vat }}</div>
          </div>
        </div>

        <!-- CONTACT -->
        <div>
          <div class="font-extrabold text-slate-800 mb-4">Contact</div>
          <div class="space-y-1 text-slate-600 text-sm">
            <div>{{ company.email }}</div>
            <div>{{ company.phone }}</div>
          </div>
        </div>

        <!-- LEGAL -->
        <div>
          <div class="font-extrabold text-slate-800 mb-4">Info</div>
          <div class="space-y-2 text-sm">
            <a :href="legalRoutes.privacy" class="block text-slate-600 transition hover:text-[#c22229]">Privacybeleid</a>
            <a :href="legalRoutes.cookies" class="block text-slate-600 transition hover:text-[#c22229]">Cookiebeleid</a>
            <a :href="legalRoutes.terms" class="block text-slate-600 transition hover:text-[#c22229]">Algemene voorwaarden</a>
          </div>
        </div>
      </div>

      <div class="mt-14 pt-6 border-t border-slate-200 text-xs text-slate-500 flex flex-col sm:flex-row justify-between gap-3">
        <div>© {{ new Date().getFullYear() }} Print on the wall</div>
        <div class="opacity-70">Made with wallpower.</div>
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
const legalRoutes = computed(() => page.props.potw?.legal_routes ?? { privacy: "/privacy", cookies: "/cookies", terms: "/voorwaarden" });
</script>