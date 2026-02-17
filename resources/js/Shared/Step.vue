<template>
  <div class="rounded-xl border border-slate-200 bg-white p-5">
    <div class="text-xs font-semibold text-slate-500">Stap {{ n }}</div>
    <div class="mt-1 font-bold">{{ title }}</div>
    <p class="mt-2 text-sm text-slate-700">{{ text }}</p>
  </div>
</template>

<script setup>
defineProps({ n: String, title: String, text: String });
</script>