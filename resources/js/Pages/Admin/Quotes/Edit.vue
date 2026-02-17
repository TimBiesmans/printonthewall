<template>
  <AuthenticatedLayout>
    <div class="mx-auto max-w-3xl px-4 py-8 space-y-6">
      <div class="flex items-start justify-between gap-4">
        <div>
          <h1 class="text-2xl font-bold">Offerte bewerken #{{ quote.id }}</h1>
          <p class="text-sm text-slate-600">{{ quote.name }} - {{ quote.email }}</p>
        </div>

        <Link :href="route('admin.quotes.show', quote.id)"
              class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50">
          Annuleren
        </Link>
      </div>

      <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
        <form class="space-y-4" @submit.prevent="submit">
          <div>
            <label class="block text-sm font-medium text-slate-700">Status</label>
            <select v-model="form.status" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
              <option value="new">Nieuw</option>
              <option value="contacted">Gecontacteerd</option>
              <option value="quoted">Offerte gemaakt</option>
              <option value="handled">Afgehandeld</option>
              <option value="archived">Gearchiveerd</option>
            </select>
            <p v-if="form.errors.status" class="mt-1 text-xs text-red-600">{{ form.errors.status }}</p>
          </div>

          <div>
            <label class="block text-sm font-medium text-slate-700">Admin notities</label>
            <textarea v-model="form.admin_notes" rows="8"
                      class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2"></textarea>
            <p v-if="form.errors.admin_notes" class="mt-1 text-xs text-red-600">{{ form.errors.admin_notes }}</p>
          </div>

          <button
            type="submit"
            class="w-full inline-flex justify-center items-center rounded-md bg-[#c22229] px-4 py-3 text-sm font-semibold text-white hover:opacity-90 disabled:opacity-50"
            :disabled="form.processing"
          >
            {{ form.processing ? 'Opslaan...' : 'Opslaan' }}
          </button>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  quote: Object,
});

const form = useForm({
  status: props.quote.status || "new",
  admin_notes: props.quote.admin_notes || "",
});

function submit() {
  form.put(route("admin.quotes.update", props.quote.id), {
    preserveScroll: true,
  });
}
</script>