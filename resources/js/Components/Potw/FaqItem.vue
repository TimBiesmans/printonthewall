<template>
  <div>
    <button
      type="button"
      class="flex w-full items-center justify-between gap-3 text-left"
      @click="$emit('toggle')"
    >
      <div class="font-extrabold text-slate-800">
        {{ title }}
      </div>

      <div
        class="text-slate-400 transition-transform duration-200"
        :class="open ? 'rotate-180' : ''"
      >
        ▼
      </div>
    </button>

    <div
      v-show="open"
      class="mt-3 text-sm leading-relaxed text-slate-600"
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