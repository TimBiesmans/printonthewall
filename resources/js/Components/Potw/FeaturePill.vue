<template>
  <div class="rounded-xl bg-white border border-slate-200 shadow-sm px-5 py-4 flex items-center gap-4">
    <div class="h-11 w-11 rounded-xl bg-slate-900/5 border border-slate-200 grid place-items-center">
      <svg v-if="icon === 'speed'" viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 3v2"/>
        <path d="M7.05 5.05l1.4 1.4"/>
        <path d="M3 12h2"/>
        <path d="M5.05 16.95l1.4-1.4"/>
        <path d="M12 19v2"/>
        <path d="M18.95 16.95l-1.4-1.4"/>
        <path d="M19 12h2"/>
        <path d="M16.95 5.05l-1.4 1.4"/>
        <path d="M12 12l4-2"/>
        <path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0Z"/>
      </svg>

      <svg v-else-if="icon === 'quality'" viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 4h16v12H4z"/>
        <path d="M7 16h10"/>
        <path d="M9 20h6"/>
        <path d="M8 11l2-2 3 3 2-2 2 2"/>
      </svg>

      <svg v-else viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 7h16"/>
        <path d="M6 7v13h12V7"/>
        <path d="M8 11h8"/>
        <path d="M8 15h8"/>
      </svg>
    </div>

    <div>
      <div class="font-extrabold text-slate-800">{{ title }}</div>
      <div class="text-sm text-slate-500">{{ subtitle }}</div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: String,
  subtitle: String,
  icon: String,
});
</script>