<template>
  <div class="rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden">
    <div class="relative">
      <img :src="img" :alt="title" class="h-52 w-full object-cover" />
      <div class="absolute left-3 top-3">
        <span class="inline-flex items-center rounded-md px-3 py-1 text-xs font-bold shadow-sm" :class="ribbonClasses">
          {{ ribbon }}
        </span>
      </div>
    </div>

    <div class="p-6">
      <div class="text-xl font-extrabold text-slate-800">{{ title }}</div>
      <p class="mt-2 text-slate-600">{{ text }}</p>
    </div>
  </div>
</template>

<script setup>
import { computed } from "vue";

const props = defineProps({
  ribbon: String,
  ribbonColor: String, // orange | blue
  title: String,
  text: String,
  img: String,
});

const ribbonClasses = computed(() =>
  props.ribbonColor === "blue" ? "bg-blue-700 text-white" : "bg-orange-600 text-white"
);
</script>