<template>
  <AuthenticatedLayout>
    <div class="mx-auto max-w-4xl px-4 py-8 space-y-6">
      <div class="flex items-start justify-between gap-4">
        <div>
          <h1 class="text-2xl font-bold">Offerte #{{ quote.id }}</h1>
          <p class="text-sm text-slate-600">{{ fmt(quote.created_at) }}</p>
        </div>

        <div class="flex gap-2">
          <Link :href="route('admin.quotes.edit', quote.id)"
                class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50">
            Bewerken
          </Link>

          <button
            type="button"
            class="rounded-md bg-[#c22229] px-4 py-2 text-sm font-semibold text-white hover:opacity-90"
            @click="goIndex"
          >
            Terug
          </button>
        </div>
      </div>

      <div v-if="$page.props.flash?.success" class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
        {{ $page.props.flash.success }}
      </div>

      <div class="grid sm:grid-cols-2 gap-4">
        <Info title="Naam" :value="quote.name" />
        <Info title="E-mail" :value="quote.email" />
        <Info title="Telefoon" :value="quote.phone || '-'" />
        <Info title="Locatie" :value="quote.location || '-'" />
        <Info title="Afmetingen" :value="quote.size || '-'" />
        <Info title="Ondergrond" :value="quote.surface || '-'" />
        <Info title="Indoor/Outdoor" :value="quote.indoor_outdoor || '-'" />
        <Info title="Timing" :value="quote.timeline || '-'" />
      </div>

      <div class="rounded-xl border border-slate-200 bg-white p-5">
        <div class="text-sm font-semibold text-slate-700">Bericht</div>
        <p class="mt-2 text-sm text-slate-700 whitespace-pre-wrap">{{ quote.message || '-' }}</p>
      </div>

      <div class="rounded-xl border border-slate-200 bg-white p-5">
        <div class="flex items-center justify-between gap-4">
          <div class="text-sm font-semibold text-slate-700">Status</div>
          <span class="inline-flex rounded-full border px-2 py-1 text-xs" :class="statusClass(quote.status)">
            {{ statusLabel(quote.status) }}
          </span>
        </div>

        <div v-if="quote.admin_notes" class="mt-4">
          <div class="text-sm font-semibold text-slate-700">Notities</div>
          <p class="mt-2 text-sm text-slate-700 whitespace-pre-wrap">{{ quote.admin_notes }}</p>
        </div>
      </div>

      <div class="rounded-xl border border-slate-200 bg-white p-5">
        <div class="flex items-center justify-between">
          <div class="text-sm font-semibold text-slate-700">Upload</div>
        </div>

        <div class="mt-3 text-sm">
          <div v-if="has_file">
            <a :href="file_url" target="_blank" class="text-[#c22229] font-semibold hover:underline">Open bestand</a>
            <div class="mt-2 text-xs text-slate-500">Opent via public storage URL.</div>
          </div>
          <div v-else class="text-slate-500">Geen upload</div>
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="text-xs text-slate-500">
          Verwijderen verwijdert ook de upload (als die bestaat).
        </div>

        <button
          type="button"
          class="rounded-md border border-red-300 bg-white px-4 py-2 text-sm font-semibold text-red-700 hover:bg-red-50"
          @click="destroy"
        >
          Verwijder
        </button>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
  quote: Object,
  has_file: Boolean,
  file_url: String,
});

function goIndex() {
  router.get(route("admin.quotes.index"));
}

function destroy() {
  if (!confirm("Ben je zeker dat je deze offerte wil verwijderen?")) return;
  router.delete(route("admin.quotes.destroy", props.quote.id));
}

function fmt(iso) {
  const d = new Date(iso);
  return d.toLocaleString("nl-BE", { day: "2-digit", month: "2-digit", year: "numeric", hour: "2-digit", minute: "2-digit" });
}

function statusLabel(s) {
  if (s === "new") return "Nieuw";
  if (s === "contacted") return "Gecontacteerd";
  if (s === "quoted") return "Offerte gemaakt";
  if (s === "handled") return "Afgehandeld";
  if (s === "archived") return "Gearchiveerd";
  return s || "-";
}

function statusClass(s) {
  if (s === "new") return "border-orange-200 bg-orange-50 text-orange-800";
  if (s === "handled") return "border-green-200 bg-green-50 text-green-800";
  if (s === "archived") return "border-slate-200 bg-slate-50 text-slate-700";
  return "border-blue-200 bg-blue-50 text-blue-800";
}

const Info = {
  props: ["title", "value"],
  template: `
    <div class="rounded-xl border border-slate-200 bg-white p-4">
      <div class="text-xs font-semibold text-slate-500">{{ title }}</div>
      <div class="mt-1 text-sm font-medium text-slate-900">{{ value }}</div>
    </div>
  `,
};
</script>