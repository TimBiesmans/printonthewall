<template>
  <div v-if="visible" class="fixed bottom-4 left-4 right-4 z-[60]">
    <div class="mx-auto max-w-6xl px-4">
      <div class="rounded-2xl border border-slate-200 bg-white shadow-lg p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="text-sm text-slate-700">
          Wij gebruiken enkel noodzakelijke cookies om deze website correct te laten functioneren -
          geen tracking of marketingcookies zonder toestemming.
          <a href="/cookies" class="font-semibold text-[#c22229] hover:underline">Cookiebeleid</a>
        </div>

        <button
          type="button"
          class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-4 py-2 text-sm font-bold text-white shadow hover:opacity-90"
          @click="dismiss"
        >
          Ok
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";

const KEY = "potw_cookie_notice_dismissed";
const visible = ref(false);

onMounted(() => {
  visible.value = localStorage.getItem(KEY) !== "1";
});

function dismiss() {
  localStorage.setItem(KEY, "1");
  visible.value = false;
}
</script>