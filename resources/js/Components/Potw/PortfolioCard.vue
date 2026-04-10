<template>
  <div class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
    <div class="relative">
      <img
        :src="img"
        :alt="title"
        class="h-44 w-full object-cover transition-transform duration-300 group-hover:scale-[1.04]"
      />

      <div v-if="tag" class="absolute left-3 top-3">
        <span class="inline-flex items-center rounded-md bg-slate-900/80 px-3 py-1 text-[11px] font-bold text-white">
          {{ tag }}
        </span>
      </div>
    </div>

    <div class="p-4">
      <div class="text-sm font-extrabold text-slate-800">{{ title }}</div>

      <div v-if="subtitle" class="mt-1 text-sm text-slate-500">
        {{ subtitle }}
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  img: String,
  title: String,
  subtitle: String,
  tag: {
    type: String,
    default: "",
  },
});
</script>