<template>
  <header
    class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur"
  >
    <div class="mx-auto max-w-6xl px-4">
      <div class="flex h-16 items-center justify-between gap-4">
        <!-- LEFT BRAND -->
        <button
          type="button"
          @click="goTop"
          class="flex min-w-0 items-center gap-3"
        >
          <img
            v-show="logoVisible"
            src="/images/potw/logo.png"
            alt="Print on the wall"
            class="h-9 w-auto shrink-0"
            draggable="false"
            @error="hideLogo"
          />

          <div class="min-w-max leading-tight">
            <div class="text-base font-extrabold tracking-tight">
              <span class="text-orange-600">Print</span>
              <span class="text-slate-900">onthe</span>
              <span class="text-blue-700">wall</span>
            </div>
            <div class="-mt-0.5 text-[11px] text-slate-500">
              {{ slogan }}
            </div>
          </div>
        </button>

        <!-- DESKTOP NAV -->
        <nav
          class="hidden items-center gap-8 text-sm font-semibold text-slate-700 md:flex"
        >
          <button @click="scrollTo('#diensten')" class="hover:text-slate-900">
            Toepassingen
          </button>

          <button @click="scrollTo('#portfolio')" class="hover:text-slate-900">
            Realisaties
          </button>

          <button @click="scrollTo('#werkwijze')" class="hover:text-slate-900">
            Werkwijze
          </button>

          <button @click="scrollTo('#faq')" class="hover:text-slate-900">
            FAQ
          </button>
        </nav>

        <!-- CTA -->
        <button
          type="button"
          @click="scrollTo('#offerte')"
          class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90"
        >
          Gratis visualisatie
        </button>
      </div>
    </div>
  </header>
</template>

<script setup>
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const slogan = computed(
  () =>
    page.props.brand?.slogan ??
    page.props.potw?.brand?.slogan ??
    "You think it, we print it."
);

const logoVisible = ref(true);

function hideLogo() {
  logoVisible.value = false;
}

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

function goTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
</script>