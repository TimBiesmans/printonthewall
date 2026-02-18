<template>
  <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">
    <div class="mx-auto max-w-6xl px-4">
      <div class="h-16 flex items-center justify-between gap-4">
        <a :href="homeHref" class="flex items-center gap-3">
          <img
            src="/images/potw/logo.png"
            alt="Print on the wall"
            class="h-9 w-auto"
            onerror="this.style.display='none'"
          />
          <div class="leading-tight">
            <div class="text-base font-extrabold tracking-tight">
              <span class="text-orange-600">Print</span><span class="text-slate-900">onthe</span><span class="text-blue-700">wall</span>
            </div>
            <div class="text-[11px] text-slate-500 -mt-0.5">{{ slogan }}</div>
          </div>
        </a>

        <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-700">
          <a :href="homeHref + '#diensten'" class="hover:text-slate-900">Diensten</a>
          <a :href="homeHref + '#portfolio'" class="hover:text-slate-900">Mogelijkheden</a>
          <a :href="homeHref + '#faq'" class="hover:text-slate-900">FAQ</a>
          <a :href="homeHref + '#offerte'" class="hover:text-slate-900">Offerte</a>
        </nav>

        <a
          :href="homeHref + '#offerte'"
          class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:opacity-90"
        >
          Offerte aanvragen
        </a>
      </div>
    </div>
  </header>
</template>

<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

defineProps({
  homeHref: { type: String, default: "/" },
});

const page = usePage();
const slogan = computed(() => page.props.potw?.brand?.slogan ?? "You think it, we print it");
</script>