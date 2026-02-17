<template>
  <div class="rounded-xl overflow-hidden border border-slate-200 bg-white">
    <div class="h-44 bg-gradient-to-br from-blue-600/20 to-orange-500/20"></div>
    <div class="p-4">
      <div class="font-semibold">{{ title }}</div>
      <div class="text-sm text-slate-600">{{ subtitle }}</div>
    </div>
  </div>
</template>

<script setup>
defineProps({ title: String, subtitle: String });
</script>