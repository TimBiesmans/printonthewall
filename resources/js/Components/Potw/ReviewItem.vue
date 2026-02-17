<template>
  <div class="rounded-lg border border-slate-200 bg-white px-3 py-2">
    <div class="text-[11px] font-semibold text-slate-500">{{ label }}</div>
    <div class="text-sm font-medium text-slate-900">{{ value }}</div>
  </div>
</template>

<script setup>
defineProps({
  label: String,
  value: String,
});
</script>