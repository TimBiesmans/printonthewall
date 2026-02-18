<!-- resources/js/Pages/Admin/Quotes/Show.vue -->
<template>
  <AuthenticatedLayout>
    <div class="mx-auto max-w-6xl px-4 py-8 space-y-6">
      <!-- Header -->
      <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
        <div class="min-w-0">
          <div class="flex items-center gap-3">
            <h1 class="text-2xl font-extrabold text-slate-900 truncate">
              Offerte-aanvraag #{{ quote.id }}
            </h1>

            <span class="inline-flex rounded-full border px-3 py-1 text-xs font-semibold" :class="statusClass(quote.status)">
              {{ statusLabel(quote.status) }}
            </span>

            <span v-if="document_exists" class="hidden sm:inline-flex rounded-full border px-3 py-1 text-xs font-semibold border-slate-200 bg-slate-50 text-slate-700">
              Document klaar
            </span>
          </div>

          <div class="mt-2 text-sm text-slate-600 truncate">
            {{ fmt(quote.created_at) }}
            <span class="text-slate-300 mx-2">|</span>
            <span class="font-semibold text-slate-700">{{ quote.name }}</span>
            <span class="text-slate-300 mx-2">·</span>
            <span class="text-slate-700">{{ quote.email }}</span>
            <span v-if="quote.location" class="text-slate-300 mx-2">·</span>
            <span v-if="quote.location" class="text-slate-700">{{ quote.location }}</span>
          </div>

          <!-- Timeline -->
          <div class="mt-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
              <div class="flex flex-wrap items-center gap-3">
                <StepPill :active="isAtLeast('new')" label="Nieuw" />
                <div class="h-px w-6 bg-slate-200"></div>
                <StepPill :active="isAtLeast('contacted')" label="Gecontacteerd" />
                <div class="h-px w-6 bg-slate-200"></div>
                <StepPill :active="isAtLeast('quoted')" label="Offerte gemaakt" />
                <div class="h-px w-6 bg-slate-200"></div>
                <StepPill :active="isAtLeast('handled')" label="Afgehandeld" />
                <div class="h-px w-6 bg-slate-200"></div>
                <StepPill :active="quote.status === 'archived'" label="Gearchiveerd" />
              </div>
            </div>
          </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-wrap gap-2 justify-start lg:justify-end">
          <Link
            :href="route('admin.quotes.index')"
            class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50"
          >
            Terug
          </Link>

          <Link
            :href="route('admin.quotes.edit', quote.id)"
            class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50"
          >
            Bewerken
          </Link>

          <Link
            :href="route('admin.quotes.document', quote.id)"
            class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-4 py-2 text-sm font-bold text-white shadow hover:opacity-90"
          >
            Offerte opmaken
          </Link>

          <a
            :href="route('admin.quotes.pdf', quote.id)"
            target="_blank"
            rel="noopener"
            class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50"
          >
            PDF
          </a>
        </div>
      </div>

      <!-- Flash -->
      <div
        v-if="$page.props.flash?.success"
        class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800"
      >
        {{ $page.props.flash.success }}
      </div>

      <!-- Grid -->
      <div class="grid lg:grid-cols-[1fr_360px] gap-6">
        <!-- LEFT -->
        <div class="space-y-6">
          <!-- Customer snapshot -->
          <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200">
              <div class="text-sm font-extrabold text-slate-900">Aanvraaggegevens</div>
              <div class="text-xs text-slate-500">Details uit de offerte-wizard</div>
            </div>

            <div class="p-6 grid sm:grid-cols-2 gap-4">
              <Info title="Naam" :value="quote.name" />
              <Info title="E-mail" :value="quote.email" />
              <Info title="Telefoon" :value="quote.phone || '-'" />
              <Info title="Locatie" :value="quote.location || '-'" />
              <Info title="Afmetingen" :value="quote.size || '-'" />
              <Info title="Ondergrond" :value="quote.surface || '-'" />
              <Info title="Indoor/Outdoor" :value="quote.indoor_outdoor || '-'" />
              <Info title="Timing" :value="quote.timeline || '-'" />
            </div>
          </section>

          <!-- Message -->
          <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200">
              <div class="text-sm font-extrabold text-slate-900">Bericht</div>
              <div class="text-xs text-slate-500">Wat de klant beschreef</div>
            </div>

            <div class="p-6">
              <p class="text-sm text-slate-700 whitespace-pre-wrap">{{ quote.message || "-" }}</p>
            </div>
          </section>

          <!-- Upload -->
          <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between gap-4">
              <div>
                <div class="text-sm font-extrabold text-slate-900">Upload</div>
                <div class="text-xs text-slate-500">Referentie afbeelding / PDF</div>
              </div>

              <div v-if="has_file" class="flex items-center gap-2">
                <a :href="preview_url" target="_blank" class="text-sm font-bold text-[#c22229] hover:underline">Preview</a>
                <span class="text-slate-300">|</span>
                <a :href="download_url" class="text-sm font-bold text-[#c22229] hover:underline">Download</a>
              </div>
            </div>

            <div class="p-6">
              <div v-if="has_file" class="text-sm text-slate-700">
                Bestand is beschikbaar.
              </div>
              <div v-else class="text-sm text-slate-500">
                Geen upload
              </div>
            </div>
          </section>

          <!-- Admin notes preview -->
          <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
              <div>
                <div class="text-sm font-extrabold text-slate-900">Admin notities</div>
                <div class="text-xs text-slate-500">Interne opmerkingen</div>
              </div>
              <Link
                :href="route('admin.quotes.edit', quote.id)"
                class="text-sm font-bold text-[#c22229] hover:underline"
              >
                Bewerken
              </Link>
            </div>

            <div class="p-6">
              <p v-if="quote.admin_notes" class="text-sm text-slate-700 whitespace-pre-wrap">{{ quote.admin_notes }}</p>
              <p v-else class="text-sm text-slate-500">Nog geen notities.</p>
            </div>
          </section>

          <!-- Danger zone -->
          <section class="rounded-2xl border border-red-200 bg-white shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-red-200">
              <div class="text-sm font-extrabold text-red-800">Danger zone</div>
              <div class="text-xs text-red-600">Verwijderen is permanent (en verwijdert ook upload).</div>
            </div>

            <div class="p-6 flex items-center justify-between gap-4">
              <div class="text-sm text-slate-600">
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
          </section>
        </div>

        <!-- RIGHT -->
        <div class="space-y-6">
          <div class="sticky top-6 space-y-6">
            <!-- Document card -->
            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
              <div class="px-6 py-4 border-b border-slate-200">
                <div class="text-sm font-extrabold text-slate-900">Offerte-document</div>
                <div class="text-xs text-slate-500">Opmaken, PDF, publieke link, verzending</div>
              </div>

              <div class="p-6 space-y-4">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm">
                  <div class="flex items-center justify-between">
                    <span class="text-slate-600">Status</span>
                    <span class="font-extrabold text-slate-900">
                      {{ document_exists ? "Klaar om te bewerken" : "Nog niet aangemaakt" }}
                    </span>
                  </div>

                  <div class="mt-2 text-xs text-slate-500">
                    Bij “Offerte opmaken” wordt het document automatisch aangemaakt als het nog niet bestaat.
                  </div>
                </div>

                <div class="grid grid-cols-2 gap-2">
                  <Link
                    :href="route('admin.quotes.document', quote.id)"
                    class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-4 py-2 text-sm font-bold text-white shadow hover:opacity-90 col-span-2"
                  >
                    Offerte opmaken
                  </Link>

                  <Link
                    :href="route('admin.quotes.pdf', quote.id)"
                    class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50"
                  >
                    PDF
                  </Link>

                  <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50"
                    @click="copyPublicLink"
                    :disabled="!public_url"
                    :class="!public_url ? 'opacity-50 cursor-not-allowed' : ''"
                    title="Copy public link"
                  >
                    Copy link
                  </button>
                </div>

                <div v-if="public_url" class="rounded-xl border border-slate-200 bg-white p-4">
                  <div class="text-xs font-semibold text-slate-500">Publieke link</div>
                  <div class="mt-1 text-sm font-bold text-slate-900 break-all">{{ public_url }}</div>
                  <div class="mt-2 text-xs text-slate-500">
                    Link is beschikbaar als je public link enable’t (via Document pagina).
                  </div>
                </div>
              </div>
            </section>

            <!-- Send card (linkt naar document page waar send zit) -->
            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
              <div class="px-6 py-4 border-b border-slate-200">
                <div class="text-sm font-extrabold text-slate-900">Verzenden</div>
                <div class="text-xs text-slate-500">Offerte versturen naar klant</div>
              </div>

              <div class="p-6 space-y-3">
                <div class="text-sm text-slate-700">
                  Verzenden gebeurt via de document-pagina (met publieke link + optionele boodschap).
                </div>

                <Link
                  :href="route('admin.quotes.document', quote.id)"
                  class="w-full inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50"
                >
                  Ga naar verzenden
                </Link>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
  quote: Object,
  has_file: Boolean,
  download_url: String,
  preview_url: String,

  // Optioneel: geef dit mee vanuit controller (of null laten)
  document_exists: { type: Boolean, default: false },
  public_url: { type: String, default: null },
});

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

/**
 * Status progress order for timeline
 */
const order = ["new", "contacted", "quoted", "handled", "archived"];
const currentIndex = computed(() => order.indexOf(props.quote?.status || "new"));

function isAtLeast(s) {
  const idx = order.indexOf(s);
  return idx !== -1 && currentIndex.value >= idx && props.quote.status !== "archived";
}

function copyPublicLink() {
  if (!props.public_url) return;
  navigator.clipboard?.writeText(props.public_url);
}

/**
 * Inline components
 */
const Info = {
  props: ["title", "value"],
  template: `
    <div class="rounded-xl border border-slate-200 bg-white p-4">
      <div class="text-xs font-semibold text-slate-500">{{ title }}</div>
      <div class="mt-1 text-sm font-medium text-slate-900">{{ value }}</div>
    </div>
  `,
};

const StepPill = {
  props: ["label", "active"],
  template: `
    <span
      class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-bold"
      :class="active ? 'border-slate-900 bg-slate-900 text-white' : 'border-slate-200 bg-white text-slate-600'"
    >
      {{ label }}
    </span>
  `,
};
</script>