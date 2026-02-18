<template>
  <AuthenticatedLayout :fullWidth="true">
    <div class="mx-auto max-w-6xl px-4 py-8 space-y-6">
      <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
        <div>
          <h1 class="text-2xl font-bold">Offertes</h1>
          <p class="text-sm text-slate-600">Beheer inkomende offerte-aanvragen.</p>
        </div>

        <div class="flex gap-2">
          <input
            v-model="local.q"
            class="w-56 rounded-md border border-slate-300 px-3 py-2 text-sm"
            placeholder="Zoeken..."
            @keyup.enter="apply"
          />
          <select v-model="local.status" class="rounded-md border border-slate-300 px-3 py-2 text-sm" @change="apply">
            <option value="">Alle statussen</option>
            <option value="new">Nieuw</option>
            <option value="contacted">Gecontacteerd</option>
            <option value="quoted">Offerte gemaakt</option>
            <option value="handled">Afgehandeld</option>
            <option value="archived">Gearchiveerd</option>
          </select>

          <button
            type="button"
            class="rounded-md bg-[#c22229] px-4 py-2 text-sm font-semibold text-white hover:opacity-90"
            @click="apply"
          >
            Filter
          </button>
        </div>
      </div>

      <div v-if="$page.props.flash?.success" class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
        {{ $page.props.flash.success }}
      </div>

      <div class="overflow-hidden rounded-xl border border-slate-200 bg-white">
        <table class="w-full text-sm">
          <thead class="bg-slate-50 text-slate-700">
            <tr>
              <th class="text-left px-4 py-3">Datum</th>
              <th class="text-left px-4 py-3">Naam</th>
              <th class="text-left px-4 py-3">E-mail</th>
              <th class="text-left px-4 py-3">Locatie</th>
              <th class="text-left px-4 py-3">Status</th>
              <th class="text-right px-4 py-3">Acties</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="q in quotes.data" :key="q.id" class="border-t">
              <td class="px-4 py-3 text-slate-600">{{ fmt(q.created_at) }}</td>
              <td class="px-4 py-3 font-medium">{{ q.name }}</td>
              <td class="px-4 py-3 text-slate-700">{{ q.email }}</td>
              <td class="px-4 py-3 text-slate-700">{{ q.location || '-' }}</td>
              <td class="px-4 py-3">
                <span class="inline-flex rounded-full border px-2 py-1 text-xs" :class="statusClass(q.status)">
                  {{ statusLabel(q.status) }}
                </span>
              </td>
              <td class="px-4 py-3 text-right">
                <Link :href="route('admin.quotes.show', q.id)"
                      class="text-[#c22229] font-semibold hover:underline">
                  Open
                </Link>
              </td>
            </tr>

            <tr v-if="!quotes.data.length">
              <td colspan="6" class="px-4 py-10 text-center text-slate-500">Geen resultaten</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="flex flex-wrap gap-2">
        <Link
          v-for="l in quotes.links"
          :key="l.label"
          :href="l.url || ''"
          class="px-3 py-2 rounded-md border text-sm"
          :class="[
            l.active ? 'bg-slate-900 text-white border-slate-900' : 'bg-white text-slate-700 border-slate-200',
            !l.url ? 'opacity-50 pointer-events-none' : ''
          ]"
          v-html="l.label"
        />
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { reactive } from "vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
  quotes: Object,
  filters: Object,
});

const local = reactive({
  q: props.filters?.q || "",
  status: props.filters?.status || "",
});

function apply() {
  router.get(route("admin.quotes.index"), { q: local.q || null, status: local.status || null }, { preserveState: true, replace: true });
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
</script>