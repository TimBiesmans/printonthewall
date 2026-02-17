<template>
  <details class="rounded-xl border border-slate-200 p-5 bg-white">
    <summary class="cursor-pointer font-semibold">{{ q }}</summary>
    <p class="mt-2 text-sm text-slate-700">{{ a }}</p>
  </details>
</template>

<script setup>
defineProps({ q: String, a: String });
</script>