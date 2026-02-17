<template>
  <div>
    <!-- Question -->
    <button
      type="button"
      class="w-full flex items-center justify-between gap-3 text-left"
      @click="$emit('toggle')"
    >
      <div class="font-extrabold text-slate-800">
        {{ title }}
      </div>

      <div
        class="transition-transform duration-200 text-slate-400"
        :class="open ? 'rotate-180' : ''"
      >
        ▼
      </div>
    </button>

    <!-- Answer -->
    <div
      v-show="open"
      class="mt-3 text-sm text-slate-600 leading-relaxed"
    >
      {{ text }}
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: String,
  text: String,
  open: Boolean,
});

defineEmits(["toggle"]);
</script>