<template>
  <header
    class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200"
  >
    <div class="mx-auto max-w-6xl px-4">
      <div class="h-16 flex items-center justify-between gap-4">

        <!-- LEFT BRAND -->
        <button
          type="button"
          @click="goTop"
          class="flex items-center gap-3 min-w-0"
        >
          <!-- Logo -->
          <img
            src="/images/potw/logo.png"
            alt="Print on the wall"
            class="h-9 w-auto shrink-0"
            draggable="false"
            @error="hideLogo"
            v-show="logoVisible"
          />

          <!-- Brand text -->
          <div class="leading-tight min-w-max">
            <div class="text-base font-extrabold tracking-tight">
              <span class="text-orange-600">Print</span>
              <span class="text-slate-900">onthe</span>
              <span class="text-blue-700">wall</span>
            </div>
            <div class="text-[11px] text-slate-500 -mt-0.5">
              {{ slogan }}
            </div>
          </div>
        </button>

        <!-- DESKTOP NAV -->
        <nav
          class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-700"
        >
          <button @click="scrollTo('#diensten')" class="hover:text-slate-900">
            Diensten
          </button>

          <button @click="scrollTo('#portfolio')" class="hover:text-slate-900">
            Portfolio
          </button>

          <button @click="scrollTo('#faq')" class="hover:text-slate-900">
            FAQ
          </button>

          <button @click="scrollTo('#offerte')" class="hover:text-slate-900">
            Offerte
          </button>
        </nav>

        <!-- CTA -->
        <button
          type="button"
          @click="scrollTo('#offerte')"
          class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90"
        >
          Offerte aanvragen
        </button>

      </div>
    </div>
  </header>
</template>

<script setup>
import { computed, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

/**
 * Brand slogan uit inertia props
 */
const slogan = computed(() =>
  page.props.brand?.slogan ??
  page.props.potw?.brand?.slogan ??
  "You think it, we print it"
);

/**
 * Logo fallback (voorkomt flex issues)
 */
const logoVisible = ref(true);
function hideLogo() {
  logoVisible.value = false;
}

/**
 * Smooth scroll met sticky header offset
 */
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