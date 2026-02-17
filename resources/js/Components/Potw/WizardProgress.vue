<template>
  <div>
    <div class="h-2 w-full rounded-full bg-slate-100 overflow-hidden border border-slate-200">
      <div class="h-full bg-[#c22229]" :style="{ width }"></div>
    </div>

    <div class="mt-3 grid grid-cols-4 text-xs text-slate-600">
      <div :class="step >= 1 ? 'font-semibold text-slate-900' : ''">Idee</div>
      <div :class="step >= 2 ? 'font-semibold text-slate-900' : ''" class="text-center">Details</div>
      <div :class="step >= 3 ? 'font-semibold text-slate-900' : ''" class="text-center">Contact</div>
      <div :class="step >= 4 ? 'font-semibold text-slate-900' : ''" class="text-right">Bevestig</div>
    </div>
  </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
  step: { type: Number, default: 1 },
});

const width = computed(() => `${(Math.min(4, Math.max(1, props.step)) / 4) * 100}%`);
</script>