<!-- resources/js/Pages/Admin/Quotes/Document.vue -->
<template>
  <AuthenticatedLayout :fullWidth="true">
    <div class="w-full px-4 sm:px-6 lg:px-8 py-6 space-y-6">
      <!-- Sticky top bar -->
      <div class="sticky top-0 z-30 -mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8 py-3 bg-gray-100/80 backdrop-blur border-b border-slate-200">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
          <div class="min-w-0">
            <div class="flex items-center gap-3">
              <h1 class="text-lg sm:text-xl font-extrabold text-slate-900 truncate">
                Offerte opmaken
                <span class="text-slate-400 font-black">/</span>
                <span class="text-slate-700">aanvraag #{{ quote.id }}</span>
              </h1>

              <span
                class="hidden sm:inline-flex items-center gap-2 rounded-full border px-3 py-1 text-xs font-semibold"
                :class="saveBadgeClass"
                title="Auto-save status"
              >
                <span class="h-2 w-2 rounded-full" :class="saveDotClass"></span>
                {{ saveLabel }}
              </span>
            </div>

            <div class="mt-1 text-sm text-slate-600 truncate">
              {{ form.customer_name || quote.name }} · {{ form.customer_email || quote.email }}
              <span class="text-slate-300 mx-2">|</span>
              <span class="text-slate-700 font-semibold">Totaal:</span>
              <span class="font-extrabold text-slate-900">€ {{ money(total) }}</span>
            </div>
          </div>

          <div class="flex flex-wrap items-center gap-2 justify-start lg:justify-end">
            <Link
              :href="route('admin.quotes.show', quote.id)"
              class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50"
            >
              Terug naar aanvraag
            </Link>

            <a
              :href="route('admin.quotes.pdf', quote.id)"
              target="_blank"
              rel="noopener"
              class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold hover:bg-slate-50"
            >
              PDF
            </a>

            <button
              type="button"
              class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-4 py-2 text-sm font-bold text-white shadow hover:opacity-90 disabled:opacity-50"
              :disabled="form.processing"
              @click="saveNow"
              title="Ctrl/Cmd + S"
            >
              {{ form.processing ? "Opslaan..." : "Opslaan" }}
            </button>
          </div>
        </div>
      </div>

      <!-- Flash -->
      <div
        v-if="$page.props.flash?.success"
        class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800"
      >
        {{ $page.props.flash.success }}
      </div>

      <!-- Main grid -->
      <div class="grid xl:grid-cols-[1fr_420px] gap-6">
        <!-- LEFT -->
        <div class="space-y-6">
          <!-- Customer + meta -->
          <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between">
              <div>
                <div class="text-sm font-extrabold text-slate-900">Klant & offerte</div>
                <div class="text-xs text-slate-500">Basisgegevens + geldigheid</div>
              </div>

              <div class="text-xs text-slate-500">
                BTW <span class="font-bold text-slate-700">{{ Number(form.vat_rate || 0).toFixed(2).replace(".", ",") }}%</span>
              </div>
            </div>

            <div class="p-6 grid sm:grid-cols-2 gap-4">
              <Field label="Klantnaam" v-model="form.customer_name" :error="form.errors.customer_name" />
              <Field label="E-mail" type="email" v-model="form.customer_email" :error="form.errors.customer_email" />

              <Field label="Telefoon" v-model="form.customer_phone" :error="form.errors.customer_phone" />
              <Field label="Locatie" v-model="form.customer_location" :error="form.errors.customer_location" />

              <Field label="Offertedatum" type="date" v-model="form.date" :error="form.errors.date" />
              <Field label="Geldig tot" type="date" v-model="form.valid_until" :error="form.errors.valid_until" />
            </div>
          </section>

          <!-- Text blocks -->
          <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200">
              <div class="text-sm font-extrabold text-slate-900">Tekstblokken</div>
              <div class="text-xs text-slate-500">Intro, notities, voorwaarden</div>
            </div>

            <div class="p-6 space-y-4">
              <div>
                <label class="block text-sm font-semibold text-slate-700">Intro</label>
                <textarea
                  v-model="form.intro"
                  rows="4"
                  class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2"
                  placeholder="Bedankt voor je aanvraag..."
                ></textarea>
              </div>

              <div>
                <label class="block text-sm font-semibold text-slate-700">Notities</label>
                <textarea
                  v-model="form.notes"
                  rows="3"
                  class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2"
                  placeholder="Extra info (bv. voorbereiding, ondergrond, bereikbaarheid)..."
                ></textarea>
              </div>

              <div>
                <label class="block text-sm font-semibold text-slate-700">Voorwaarden</label>
                <textarea
                  v-model="form.terms"
                  rows="4"
                  class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2"
                  placeholder="Betaling, planning, geldigheid..."
                ></textarea>
              </div>
            </div>
          </section>

          <!-- Lines -->
          <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
              <div>
                <div class="text-sm font-extrabold text-slate-900">Offerte-regels</div>
                <div class="text-xs text-slate-500">Sleep om te sorteren · Totals berekenen live</div>
              </div>

              <div class="flex flex-wrap gap-2">
                <div class="relative">
                  <select
                    v-model="preset"
                    class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm font-semibold"
                  >
                    <option value="">+ Preset regel...</option>
                    <option value="prep">Voorbereiding & opmeting</option>
                    <option value="travel">Verplaatsing</option>
                    <option value="print">Print & plaatsing</option>
                    <option value="coat">Beschermlaag (optioneel)</option>
                    <option value="design">Design / opmaak (optioneel)</option>
                  </select>
                </div>

                <button
                  type="button"
                  class="rounded-md border border-slate-300 bg-white px-3 py-2 text-sm font-semibold hover:bg-slate-50"
                  @click="addLine()"
                >
                  + Regel
                </button>
              </div>
            </div>

            <div class="p-6">
              <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                  <thead class="bg-slate-50 text-slate-700">
                    <tr>
                      <th class="text-left px-3 py-2 w-[44px]"></th>
                      <th class="text-left px-3 py-2">Omschrijving</th>
                      <th class="text-left px-3 py-2 w-[92px]">Qty</th>
                      <th class="text-left px-3 py-2 w-[92px]">Unit</th>
                      <th class="text-left px-3 py-2 w-[160px]">Prijs</th>
                      <th class="text-right px-3 py-2 w-[150px]">Totaal</th>
                      <th class="text-right px-3 py-2 w-[92px]"></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr
                      v-for="(l, idx) in form.lines"
                      :key="l._key"
                      class="border-t align-top"
                      draggable="true"
                      @dragstart="onDragStart(idx)"
                      @dragover.prevent="onDragOver(idx)"
                      @drop.prevent="onDrop(idx)"
                      :class="dragOverIndex === idx ? 'bg-slate-50' : ''"
                    >
                      <!-- drag handle -->
                      <td class="px-3 py-3">
                        <div
                          class="h-10 w-10 rounded-md border border-slate-200 bg-white grid place-items-center text-slate-400 cursor-grab active:cursor-grabbing"
                          title="Sleep om te sorteren"
                        >
                          <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 6h.01M9 12h.01M9 18h.01M15 6h.01M15 12h.01M15 18h.01"/>
                          </svg>
                        </div>
                      </td>

                      <td class="px-3 py-3">
                        <input
                          v-model="l.title"
                          class="w-full rounded-md border border-slate-300 px-3 py-2"
                          placeholder="bv. Print + plaatsing"
                        />
                        <textarea
                          v-model="l.description"
                          rows="2"
                          class="mt-2 w-full rounded-md border border-slate-300 px-3 py-2 text-sm"
                          placeholder="Optioneel detail"
                        ></textarea>

                        <div v-if="lineRowError(idx)" class="mt-2 text-xs text-red-600">
                          {{ lineRowError(idx) }}
                        </div>
                      </td>

                      <td class="px-3 py-3">
                        <input
                          v-model="l.qty"
                          type="number"
                          step="0.01"
                          class="w-full rounded-md border border-slate-300 px-3 py-2"
                          @input="normalizeLineNumbers(l)"
                        />
                      </td>

                      <td class="px-3 py-3">
                        <input
                          v-model="l.unit"
                          class="w-full rounded-md border border-slate-300 px-3 py-2"
                          placeholder="m²"
                        />
                      </td>

                      <td class="px-3 py-3">
                        <div class="flex items-center gap-2">
                          <span class="text-slate-500">€</span>
                          <input
                            v-model="l.unit_price"
                            type="number"
                            step="0.01"
                            class="w-full rounded-md border border-slate-300 px-3 py-2"
                            @input="normalizeLineNumbers(l)"
                          />
                        </div>
                      </td>

                      <td class="px-3 py-3 text-right font-extrabold text-slate-900">
                        € {{ money(lineTotal(l)) }}
                      </td>

                      <td class="px-3 py-3 text-right">
                        <button
                          type="button"
                          class="rounded-md border border-red-300 bg-white px-2 py-2 text-xs font-semibold text-red-700 hover:bg-red-50"
                          @click="removeLine(idx)"
                        >
                          Verwijder
                        </button>
                      </td>
                    </tr>

                    <tr v-if="!form.lines.length">
                      <td colspan="7" class="px-3 py-10 text-center text-slate-500">
                        Nog geen regels. Voeg een regel toe of kies een preset.
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p v-if="form.errors.lines" class="mt-3 text-xs text-red-600">{{ form.errors.lines }}</p>

              <div class="mt-4 text-xs text-slate-500">
                Tip: hou regels “menselijk”: voorbereiding, print, verplaatsing, beschermlaag.
              </div>
            </div>
          </section>
        </div>

        <!-- RIGHT -->
        <div class="space-y-6">
          <div class="sticky top-[92px] space-y-6">
            <!-- Totals card -->
            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
              <div class="px-6 py-4 border-b border-slate-200">
                <div class="text-sm font-extrabold text-slate-900">Samenvatting</div>
                <div class="text-xs text-slate-500">Live berekening</div>
              </div>

              <div class="p-6 space-y-4 text-sm">
                <div class="flex items-center justify-between">
                  <span class="text-slate-600">Subtotaal</span>
                  <span class="font-extrabold text-slate-900">€ {{ money(subtotal) }}</span>
                </div>

                <div class="flex items-center justify-between gap-3">
                  <span class="text-slate-600">Korting</span>
                  <div class="flex items-center gap-2">
                    <span class="text-slate-500">€</span>
                    <input
                      v-model="form.discount"
                      type="number"
                      step="0.01"
                      class="w-36 rounded-md border border-slate-300 px-3 py-2 text-sm text-right"
                    />
                  </div>
                </div>

                <div class="flex items-center justify-between gap-3">
                  <span class="text-slate-600">BTW</span>
                  <div class="flex items-center gap-2">
                    <input
                      v-model="form.vat_rate"
                      type="number"
                      step="0.01"
                      class="w-24 rounded-md border border-slate-300 px-3 py-2 text-sm text-right"
                    />
                    <span class="text-slate-500">%</span>
                  </div>
                </div>

                <div class="h-px bg-slate-200"></div>

                <div class="flex items-center justify-between">
                  <span class="text-slate-700 font-semibold">BTW-bedrag</span>
                  <span class="font-extrabold text-slate-900">€ {{ money(vatAmount) }}</span>
                </div>

                <div class="flex items-center justify-between">
                  <span class="text-slate-900 font-extrabold">Totaal</span>
                  <span class="text-xl font-black">€ {{ money(total) }}</span>
                </div>

                <button
                  type="button"
                  class="mt-2 w-full rounded-md bg-[#c22229] px-5 py-3 text-sm font-black text-white shadow hover:opacity-90 disabled:opacity-50"
                  :disabled="form.processing"
                  @click="saveNow"
                >
                  {{ form.processing ? "Opslaan..." : "Opslaan" }}
                </button>

                <div v-if="saveError" class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs text-red-700">
                  {{ saveError }}
                </div>

                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 text-xs text-slate-600">
                  Auto-save staat aan. Je kan altijd ook manueel opslaan (Ctrl/Cmd + S).
                </div>
              </div>
            </section>

            <!-- Quick check -->
            <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
              <div class="px-6 py-4 border-b border-slate-200">
                <div class="text-sm font-extrabold text-slate-900">Checklist</div>
                <div class="text-xs text-slate-500">Snelle kwaliteitscheck</div>
              </div>

              <div class="p-6 text-sm space-y-3">
                <div class="flex items-start gap-3">
                  <div class="mt-0.5 h-5 w-5 rounded-full border grid place-items-center"
                       :class="form.lines.length ? 'border-green-300 bg-green-50 text-green-700' : 'border-orange-300 bg-orange-50 text-orange-700'">
                    <span class="text-xs font-black">{{ form.lines.length ? "✓" : "!" }}</span>
                  </div>
                  <div class="text-slate-700">
                    <div class="font-bold">Regels</div>
                    <div class="text-xs text-slate-500">Minstens 1 regel toevoegen.</div>
                  </div>
                </div>

                <div class="flex items-start gap-3">
                  <div class="mt-0.5 h-5 w-5 rounded-full border grid place-items-center"
                       :class="String(form.customer_email || '').includes('@') ? 'border-green-300 bg-green-50 text-green-700' : 'border-orange-300 bg-orange-50 text-orange-700'">
                    <span class="text-xs font-black">{{ String(form.customer_email || '').includes('@') ? "✓" : "!" }}</span>
                  </div>
                  <div class="text-slate-700">
                    <div class="font-bold">Contact</div>
                    <div class="text-xs text-slate-500">E-mail ingevuld voor verzending.</div>
                  </div>
                </div>

                <div class="flex items-start gap-3">
                  <div class="mt-0.5 h-5 w-5 rounded-full border grid place-items-center"
                       :class="(form.valid_until || '').length ? 'border-green-300 bg-green-50 text-green-700' : 'border-orange-300 bg-orange-50 text-orange-700'">
                    <span class="text-xs font-black">{{ (form.valid_until || '').length ? "✓" : "!" }}</span>
                  </div>
                  <div class="text-slate-700">
                    <div class="font-bold">Geldigheid</div>
                    <div class="text-xs text-slate-500">“Geldig tot” invullen.</div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>

      <!-- bottom spacing -->
      <div class="h-8"></div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Field from "@/Components/Potw/Field.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { computed, onBeforeUnmount, onMounted, ref, watch } from "vue";

const props = defineProps({
  quote: Object,
  document: Object,
});

function uid() {
  return Math.random().toString(16).slice(2) + Date.now().toString(16);
}

const form = useForm({
  date: props.document.date || "",
  valid_until: props.document.valid_until || "",
  customer_name: props.document.customer_name || props.quote.name || "",
  customer_email: props.document.customer_email || props.quote.email || "",
  customer_phone: props.document.customer_phone || props.quote.phone || "",
  customer_location: props.document.customer_location || props.quote.location || "",
  vat_rate: props.document.vat_rate ?? 21,
  discount: props.document.discount ?? 0,
  intro: props.document.intro || "",
  notes: props.document.notes || "",
  terms: props.document.terms || "",
  lines: (props.document.lines || []).map((l, i) => ({
    id: l.id,
    _key: uid(),
    title: l.title || "",
    description: l.description || "",
    qty: Number(l.qty ?? 1),
    unit: l.unit || "",
    unit_price: Number(l.unit_price ?? 0),
    sort_order: Number(l.sort_order ?? (i + 1)),
  })),
});

/**
 * --- Totals (live) ---
 */
function normalizeLineNumbers(l) {
  l.qty = Number(l.qty || 0);
  l.unit_price = Number(l.unit_price || 0);
}

function lineTotal(l) {
  const qty = Number(l.qty || 0);
  const up = Number(l.unit_price || 0);
  return Math.round(qty * up * 100) / 100;
}

const subtotal = computed(() => form.lines.reduce((s, l) => s + lineTotal(l), 0));

const baseAfterDiscount = computed(() => {
  const discount = Number(form.discount || 0);
  return Math.max(0, subtotal.value - discount);
});

const vatAmount = computed(() => {
  const vatRate = Number(form.vat_rate || 0);
  return Math.round(baseAfterDiscount.value * (vatRate / 100) * 100) / 100;
});

const total = computed(() => Math.round((baseAfterDiscount.value + vatAmount.value) * 100) / 100);

function money(v) {
  const n = Number(v || 0);
  return n.toFixed(2).replace(".", ",");
}

/**
 * --- Lines CRUD ---
 */
function renumberSort() {
  form.lines.forEach((l, i) => (l.sort_order = i + 1));
}

function addLine(presetKey = null) {
  const presetLine = makePresetLine(presetKey);
  form.lines.push({
    id: null,
    _key: uid(),
    title: presetLine.title,
    description: presetLine.description,
    qty: presetLine.qty,
    unit: presetLine.unit,
    unit_price: presetLine.unit_price,
    sort_order: form.lines.length + 1,
  });
  markDirty();
}

function removeLine(idx) {
  if (!confirm("Regel verwijderen?")) return;
  form.lines.splice(idx, 1);
  renumberSort();
  markDirty();
}

const preset = ref("");
watch(preset, (v) => {
  if (!v) return;
  addLine(v);
  preset.value = "";
});

function makePresetLine(key) {
  if (key === "prep") return { title: "Voorbereiding & opmeting", description: "Op locatie + uitlijning print.", qty: 1, unit: "stuk", unit_price: 0 };
  if (key === "travel") return { title: "Verplaatsing", description: "Transport + opbouw ter plaatse.", qty: 1, unit: "stuk", unit_price: 0 };
  if (key === "print") return { title: "Print & plaatsing", description: "Printen op locatie (incl. opstelling).", qty: 1, unit: "stuk", unit_price: 0 };
  if (key === "coat") return { title: "Beschermlaag (optioneel)", description: "Extra bescherming / afwerking.", qty: 1, unit: "stuk", unit_price: 0 };
  if (key === "design") return { title: "Design / opmaak (optioneel)", description: "Klaarmaken bestand + proef.", qty: 1, unit: "uur", unit_price: 0 };
  return { title: "", description: "", qty: 1, unit: "", unit_price: 0 };
}

/**
 * --- Drag & drop sorting (no libs) ---
 */
const dragFromIndex = ref(null);
const dragOverIndex = ref(null);

function onDragStart(idx) {
  dragFromIndex.value = idx;
}

function onDragOver(idx) {
  dragOverIndex.value = idx;
}

function onDrop(idx) {
  const from = dragFromIndex.value;
  if (from === null || from === undefined) return;

  const to = idx;
  if (from === to) {
    dragFromIndex.value = null;
    dragOverIndex.value = null;
    return;
  }

  const item = form.lines.splice(from, 1)[0];
  form.lines.splice(to, 0, item);

  dragFromIndex.value = null;
  dragOverIndex.value = null;

  renumberSort();
  markDirty();
}

/**
 * --- Validation hints (light) ---
 */
function lineRowError(idx) {
  const l = form.lines[idx];
  if (!l) return null;
  if (!String(l.title || "").trim()) return "Titel is verplicht.";
  if (Number(l.qty || 0) < 0) return "Qty mag niet negatief zijn.";
  if (Number(l.unit_price || 0) < 0) return "Prijs mag niet negatief zijn.";
  return null;
}

/**
 * --- Enterprise auto-save UX ---
 */
const dirty = ref(false);
const saveState = ref("saved"); // saved | unsaved | saving | error
const saveError = ref("");

function markDirty() {
  dirty.value = true;
  if (saveState.value !== "saving") saveState.value = "unsaved";
  saveError.value = "";
}

let saveTimer = null;

function scheduleAutosave() {
  if (saveTimer) clearTimeout(saveTimer);
  saveTimer = setTimeout(() => {
    if (!dirty.value) return;
    saveNow(true);
  }, 900);
}

watch(
  () => ({
    date: form.date,
    valid_until: form.valid_until,
    customer_name: form.customer_name,
    customer_email: form.customer_email,
    customer_phone: form.customer_phone,
    customer_location: form.customer_location,
    vat_rate: form.vat_rate,
    discount: form.discount,
    intro: form.intro,
    notes: form.notes,
    terms: form.terms,
    lines: form.lines.map((l) => [l.id, l.title, l.description, l.qty, l.unit, l.unit_price, l.sort_order]),
  }),
  () => {
    markDirty();
    scheduleAutosave();
  },
  { deep: true }
);

function saveNow(fromAutosave = false) {
  saveState.value = "saving";
  saveError.value = "";

  // server verwacht sort_order + basisvelden per line
  form.put(route("admin.quotes.document.update", props.quote.id), {
    preserveScroll: true,
    onSuccess: () => {
      dirty.value = false;
      saveState.value = "saved";
      saveError.value = "";
    },
    onError: () => {
      // inertia zet errors in form.errors
      saveState.value = "error";
      saveError.value = "Opslaan mislukt. Controleer velden en probeer opnieuw.";
      if (!fromAutosave) window.scrollTo({ top: 0, behavior: "smooth" });
    },
    onFinish: () => {
      // wanneer validation faalt: form.processing false maar dirty true
      if (saveState.value === "saving" && dirty.value) {
        // Als er errors zijn, laten we state error zetten
        if (Object.keys(form.errors || {}).length) {
          saveState.value = "error";
          saveError.value = "Niet alles is correct ingevuld. Kijk de foutmeldingen na.";
        }
      }
    },
  });
}

const saveLabel = computed(() => {
  if (saveState.value === "saving") return "Saving…";
  if (saveState.value === "unsaved") return "Unsaved";
  if (saveState.value === "error") return "Error";
  return "Saved";
});

const saveBadgeClass = computed(() => {
  if (saveState.value === "saving") return "border-blue-200 bg-blue-50 text-blue-800";
  if (saveState.value === "unsaved") return "border-orange-200 bg-orange-50 text-orange-800";
  if (saveState.value === "error") return "border-red-200 bg-red-50 text-red-800";
  return "border-green-200 bg-green-50 text-green-800";
});

const saveDotClass = computed(() => {
  if (saveState.value === "saving") return "bg-blue-500";
  if (saveState.value === "unsaved") return "bg-orange-500";
  if (saveState.value === "error") return "bg-red-500";
  return "bg-green-500";
});

/**
 * Ctrl/Cmd + S
 */
function onKeydown(e) {
  const isMac = navigator.platform.toUpperCase().includes("MAC");
  const mod = isMac ? e.metaKey : e.ctrlKey;
  if (!mod) return;
  if (e.key.toLowerCase() !== "s") return;
  e.preventDefault();
  saveNow(false);
}

/**
 * Warn on close if unsaved
 */
function onBeforeUnload(e) {
  if (!dirty.value) return;
  e.preventDefault();
  e.returnValue = "";
}

onMounted(() => {
  window.addEventListener("keydown", onKeydown);
  window.addEventListener("beforeunload", onBeforeUnload);
});

onBeforeUnmount(() => {
  window.removeEventListener("keydown", onKeydown);
  window.removeEventListener("beforeunload", onBeforeUnload);
  if (saveTimer) clearTimeout(saveTimer);
});
</script>