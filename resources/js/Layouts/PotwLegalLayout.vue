<template>
  <div class="min-h-screen bg-[#f3f5f8] text-slate-900">
    <PotwHeader />

    <main>
      <section class="pt-10 pb-6">
        <div class="mx-auto max-w-6xl px-4">
          <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
              <h1 class="text-3xl sm:text-4xl font-black tracking-tight text-slate-900">
                {{ title }}
              </h1>
              <p v-if="subtitle" class="mt-2 text-slate-600">
                {{ subtitle }}
              </p>
            </div>

            <div class="text-xs text-slate-500">
              Laatst bijgewerkt: <span class="font-semibold text-slate-700">{{ updatedAt }}</span>
            </div>
          </div>

          <div class="mt-6 rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="flex flex-wrap gap-2 p-3 border-b border-slate-200 bg-slate-50">
              <a
                href="/privacy"
                class="px-3 py-2 rounded-lg text-sm font-semibold border transition"
                :class="isActive('privacy') ? activeTab : idleTab"
              >
                Privacy
              </a>
              <a
                href="/cookies"
                class="px-3 py-2 rounded-lg text-sm font-semibold border transition"
                :class="isActive('cookies') ? activeTab : idleTab"
              >
                Cookies
              </a>
              <a
                href="/voorwaarden"
                class="px-3 py-2 rounded-lg text-sm font-semibold border transition"
                :class="isActive('terms') ? activeTab : idleTab"
              >
                Voorwaarden
              </a>
            </div>

            <div class="p-6 sm:p-8">
              <slot />
            </div>
          </div>
        </div>
      </section>
    </main>

    <PotwFooter />
  </div>
</template>

<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import PotwHeader from "@/Components/Potw/PotwHeader.vue";
import PotwFooter from "@/Components/Potw/PotwFooter.vue";

const props = defineProps({
  title: { type: String, required: true },
  subtitle: { type: String, default: "" },
  updatedAt: { type: String, default: "[DATUM INVULLEN]" },
  active: { type: String, default: "privacy" }, // privacy | cookies | terms
});

const page = usePage();

const activeTab = "bg-white border-slate-300 text-slate-900 shadow-sm";
const idleTab = "bg-white/70 border-slate-200 text-slate-600 hover:text-slate-900 hover:border-slate-300";

function isActive(key) {
  return props.active === key;
}
</script>