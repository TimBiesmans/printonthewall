<template>
  <div class="rounded-xl border border-slate-200 p-5 bg-white">
    <div class="text-sm font-semibold text-slate-500">{{ tag }}</div>
    <div class="mt-1 font-bold">{{ title }}</div>
    <p class="mt-2 text-sm text-slate-700">{{ text }}</p>
  </div>
</template>

<script setup>
defineProps({
  title: String,
  tag: String,
  text: { type: String, default: "Omschrijving komt hier." },
});
</script>