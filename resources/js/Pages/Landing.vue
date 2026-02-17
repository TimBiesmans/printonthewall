<!-- resources/js/Pages/Landing.vue -->
<template>
  <div class="min-h-screen bg-[#f3f5f8] text-slate-900">
    <!-- Topbar -->
    <ProNavbar />


    <main id="top">
      <!-- HERO -->
      <section class="pt-8 pb-10">
        <div class="mx-auto max-w-6xl px-4">
          <div class="rounded-2xl bg-white shadow-[0_12px_40px_rgba(0,0,0,0.08)] overflow-hidden border border-slate-200">
            <div class="relative">
              <!-- HERO BG -->
              <div class="absolute inset-0">
                <img
                  src="/images/potw/hero-bg.png"
                  alt="Print on the wall"
                  class="h-full w-full object-cover object-center"
                  draggable="false"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-white/70 via-white/55 to-white/80"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 via-transparent to-orange-500/10"></div>
              </div>

              <div class="relative px-6 sm:px-10 py-10 sm:py-12">
                <div class="grid lg:grid-cols-[1.25fr_0.75fr] gap-8 items-start">
                  <!-- LEFT CONTENT -->
                  <div class="space-y-6">
                    <div class="max-w-xl">
                      <h1 class="text-4xl sm:text-5xl font-black tracking-tight leading-[1.05] animate-fadeUp">
                        <span class="text-slate-900">Print on the wall</span>
                      </h1>

                      <div class="mt-3 text-xl font-extrabold text-slate-800 animate-fadeUp delay-100">
                        You think it, we print it
                      </div>

                      <p class="mt-4 text-slate-700 animate-fadeUp delay-200">
                        Logo’s, branding, foto’s, kunst en signalisatie.<br />
                        Snel, proper en professioneel.
                      </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 animate-fadeUp delay-300">
                      <button
                        type="button"
                        @click="scrollTo('#offerte')"
                        class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-6 py-3 text-sm font-semibold text-white shadow hover:opacity-90"
                      >
                        Vraag een offerte
                      </button>

                      <button
                        type="button"
                        @click="scrollTo('#portfolio')"
                        class="inline-flex items-center justify-center rounded-md bg-white/90 px-6 py-3 text-sm font-semibold text-slate-900 border border-slate-300 hover:bg-white"
                      >
                        Bekijk voorbeelden
                      </button>
                    </div>
                  </div>

                  <!-- RIGHT SIDE - USP STACK -->
                  <div class="space-y-4 animate-fadeUp delay-200">
                    <div class="rounded-xl bg-white/90 border border-slate-200 shadow-sm px-5 py-4 flex items-center gap-4">
                      <div class="h-11 w-11 rounded-xl bg-slate-900/5 border border-slate-200 grid place-items-center">
                        <svg viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M12 3v2"/><path d="M7.05 5.05l1.4 1.4"/><path d="M3 12h2"/>
                          <path d="M5.05 16.95l1.4-1.4"/><path d="M12 19v2"/><path d="M18.95 16.95l-1.4-1.4"/>
                          <path d="M19 12h2"/><path d="M16.95 5.05l-1.4 1.4"/><path d="M12 12l4-2"/>
                          <path d="M21 12a9 9 0 1 1-18 0Z"/>
                        </svg>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-800">Snel</div>
                        <div class="text-sm text-slate-500">Op locatie</div>
                      </div>
                    </div>

                    <div class="rounded-xl bg-white/90 border border-slate-200 shadow-sm px-5 py-4 flex items-center gap-4">
                      <div class="h-11 w-11 rounded-xl bg-slate-900/5 border border-slate-200 grid place-items-center">
                        <svg viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M4 4h16v12H4z"/><path d="M7 16h10"/><path d="M9 20h6"/><path d="M8 11l2-2 3 3 2-2 2 2"/>
                        </svg>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-800">Kwaliteit</div>
                        <div class="text-sm text-slate-500">Hoge resolutie</div>
                      </div>
                    </div>

                    <div class="rounded-xl bg-white/90 border border-slate-200 shadow-sm px-5 py-4 flex items-center gap-4">
                      <div class="h-11 w-11 rounded-xl bg-slate-900/5 border border-slate-200 grid place-items-center">
                        <svg viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M4 7h16"/><path d="M6 7v13h12V7"/><path d="M8 11h8"/><path d="M8 15h8"/>
                        </svg>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-800">Veel materialen</div>
                        <div class="text-sm text-slate-500">Baksteen, beton, hout...</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

      <!-- Diensten -->
      <section id="diensten" class="py-8 sm:py-10 scroll-mt-[88px]">
        <div class="mx-auto max-w-6xl px-4">
          <h2 class="text-4xl font-black text-slate-800">Diensten</h2>
          <div class="mt-2 h-1 w-20 bg-orange-500 rounded"></div>

          <p class="mt-6 text-slate-600 text-lg">
            Alles wat je op een muur wil, kunnen we printen.
          </p>

          <div class="mt-8 grid lg:grid-cols-3 gap-6">
            <ServiceCard
              ribbon="Bedrijven"
              ribbonColor="orange"
              title="Logo & branding"
              text="Receptie, kantoor, showroom, magazijn."
              img="/images/potw/service-bedrijven.png"
            />

            <ServiceCard
              ribbon="Particulieren"
              ribbonColor="blue"
              title="Interieur & decoratie"
              text="Foto’s, patronen, kunst, kinderkamer, mancave."
              img="/images/potw/service-particulieren.png"
            />

            <ServiceCard
              ribbon="Retail"
              ribbonColor="orange"
              title="Winkel / geveldetail"
              text="Etalage, kleine gevel, accentmuur."
              img="/images/potw/service-outdoor.png"
            />
          </div>
        </div>
      </section>

      <!-- Portfolio -->
      <section id="portfolio" class="py-8 sm:py-10 scroll-mt-[88px]">
        <div class="mx-auto max-w-6xl px-4">
          <div class="flex items-end justify-between gap-4">
            <div>
              <h2 class="text-4xl font-black text-slate-800">Portfolio</h2>
              <div class="mt-2 h-1 w-20 bg-orange-500 rounded"></div>
              <p class="mt-5 text-slate-600 text-lg">
                Enkele voorbeelden van wat mogelijk is. (Later vervang je dit door echte realisaties.)
              </p>
            </div>

            <button
              type="button"
              class="hidden sm:inline-flex rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-800 hover:bg-slate-50"
              @click="scrollTo('#offerte')"
            >
              Ook zoiets? Vraag offerte
            </button>
          </div>

          <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <PortfolioCard title="Logo in receptie" subtitle="Strak & professioneel" img="/images/potw/portfolio-1.png" />
            <PortfolioCard title="Accentmuur / kunst" subtitle="Warme sfeer in huis" img="/images/potw/portfolio-2.png" />
            <PortfolioCard title="Winkel / etalage" subtitle="Kleine outdoor toepassing" img="/images/potw/portfolio-3.png" />
            <PortfolioCard title="Kindermuur" subtitle="Patronen & illustraties" img="/images/potw/portfolio-4.png" />
            <PortfolioCard title="Signalisatie" subtitle="Duidelijke route & info" img="/images/potw/portfolio-5.png" />
            <PortfolioCard title="Foto / branding" subtitle="Kleurvast & scherp" img="/images/potw/portfolio-6.png" />
          </div>
        </div>
      </section>

      <!-- FAQ -->
      <section id="faq" class="py-8 sm:py-10 scroll-mt-[88px]">
        <div class="mx-auto max-w-6xl px-4">
          <h2 class="text-4xl font-black text-slate-800">FAQ</h2>
          <div class="mt-2 h-1 w-20 bg-orange-500 rounded"></div>

          <div class="mt-8 grid lg:grid-cols-2 gap-6">
            <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6">
              <FaqItem
                :open="faqOpen === 1"
                title="Op welke ondergronden kan je printen?"
                text="Veel ondergronden: baksteen, beton, hout, gips, panelen… In je aanvraag kan je de ondergrond selecteren."
                @toggle="toggleFaq(1)"
              />
              <div class="h-px bg-slate-200 my-4"></div>
              <FaqItem
                :open="faqOpen === 2"
                title="Moet de muur perfect vlak zijn?"
                text="Niet altijd. Kleine textuur is meestal oké. Voor heel ruwe of brokkelige muren bekijken we dit best vooraf (foto helpt!)."
                @toggle="toggleFaq(2)"
              />
              <div class="h-px bg-slate-200 my-4"></div>
              <FaqItem
                :open="faqOpen === 3"
                title="Welke kwaliteit/ resolutie moet mijn bestand hebben?"
                text="Hoe scherper hoe beter. Stuur gerust wat je hebt - we geven feedback of het volstaat."
                @toggle="toggleFaq(3)"
              />
            </div>

            <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-6">
              <FaqItem
                :open="faqOpen === 4"
                title="Hoe snel kan dit?"
                text="Vaak binnen enkele dagen, afhankelijk van planning en voorbereiding. Geef je timing mee in de offerte wizard."
                @toggle="toggleFaq(4)"
              />
              <div class="h-px bg-slate-200 my-4"></div>
              <FaqItem
                :open="faqOpen === 5"
                title="Doen jullie ook installatie op locatie?"
                text="Ja. We komen op locatie, meten na en printen ter plaatse."
                @toggle="toggleFaq(5)"
              />
              <div class="h-px bg-slate-200 my-4"></div>
              <FaqItem
                :open="faqOpen === 6"
                title="Kan ik eerst een prijsinschatting krijgen?"
                text="Zeker. Met afmetingen + ondergrond + een referentiefoto kunnen we snel een correcte inschatting geven."
                @toggle="toggleFaq(6)"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- Offerte Wizard -->
      <section id="offerte" class="py-10 sm:py-12 scroll-mt-[88px]">
        <div class="mx-auto max-w-6xl px-4">
          <div class="rounded-2xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3">
              <div>
                <h2 class="text-2xl font-extrabold text-slate-800">Offerte aanvragen</h2>
                <p class="mt-2 text-slate-600">In 4 korte stappen. Je krijgt snel een voorstel.</p>
              </div>
              <div class="text-sm text-slate-500">
                Stap <span class="font-bold text-slate-700">{{ step }}</span> / 4
              </div>
            </div>

            <div class="mt-6">
              <div class="h-2 w-full rounded-full bg-slate-100 overflow-hidden border border-slate-200">
                <div class="h-full bg-[#c22229]" :style="{ width: progressWidth }"></div>
              </div>

              <div class="mt-3 grid grid-cols-4 text-xs text-slate-600">
                <div :class="step >= 1 ? 'font-semibold text-slate-900' : ''">Idee</div>
                <div :class="step >= 2 ? 'font-semibold text-slate-900' : ''" class="text-center">Details</div>
                <div :class="step >= 3 ? 'font-semibold text-slate-900' : ''" class="text-center">Contact</div>
                <div :class="step >= 4 ? 'font-semibold text-slate-900' : ''" class="text-right">Bevestig</div>
              </div>
            </div>

            <div
              v-if="$page.props.flash?.success"
              class="mt-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800"
            >
              {{ $page.props.flash.success }}
            </div>

            <form class="mt-8 space-y-6" @submit.prevent="onSubmitWizard">
              <!-- STEP 1 -->
              <div v-show="step === 1" class="space-y-6">
                <div class="sm:col-span-2">
                  <label class="block text-sm font-semibold text-slate-700">Wat wil je laten printen?</label>
                  <textarea
                    v-model="form.message"
                    rows="6"
                    class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2"
                    placeholder="Beschrijf kort je idee (logo, foto, patroon, tekst, ...) en waar het moet komen."
                  ></textarea>
                  <p v-if="form.errors.message" class="mt-1 text-xs text-red-600">{{ form.errors.message }}</p>
                </div>

                <div>
                  <label class="block text-sm font-semibold text-slate-700">Referentie afbeelding / bestand (optioneel)</label>
                  <input type="file" class="mt-1 block w-full text-sm" @change="onFile" />
                  <p class="mt-1 text-xs text-slate-500">PNG, JPG of PDF - max 8MB</p>
                  <p v-if="form.errors.reference_file" class="mt-1 text-xs text-red-600">{{ form.errors.reference_file }}</p>

                  <div v-if="selectedFileName" class="mt-2 text-sm text-slate-700">
                    Geselecteerd: <span class="font-semibold">{{ selectedFileName }}</span>
                  </div>
                </div>
              </div>

              <!-- STEP 2 -->
              <div v-show="step === 2" class="space-y-6">
                <div class="grid sm:grid-cols-2 gap-4">
                  <Field label="Afmetingen" placeholder="bv. 300 x 200 cm" v-model="form.size" :error="form.errors.size" />

                  <div>
                    <label class="block text-sm font-semibold text-slate-700">Ondergrond</label>
                    <select v-model="form.surface" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                      <option value="">Kies...</option>
                      <option>Baksteen</option>
                      <option>Beton</option>
                      <option>Gips</option>
                      <option>Hout</option>
                      <option>Andere</option>
                    </select>
                    <p v-if="form.errors.surface" class="mt-1 text-xs text-red-600">{{ form.errors.surface }}</p>
                  </div>

                  <div>
                    <label class="block text-sm font-semibold text-slate-700">Indoor / Outdoor</label>
                    <select v-model="form.indoor_outdoor" class="mt-1 w-full rounded-md border border-slate-300 px-3 py-2">
                      <option value="">Kies...</option>
                      <option value="indoor">Indoor</option>
                      <option value="outdoor">Outdoor</option>
                    </select>
                    <p v-if="form.errors.indoor_outdoor" class="mt-1 text-xs text-red-600">{{ form.errors.indoor_outdoor }}</p>
                  </div>

                  <Field label="Timing" placeholder="bv. binnen 2 weken" v-model="form.timeline" :error="form.errors.timeline" />
                </div>
              </div>

              <!-- STEP 3 -->
              <div v-show="step === 3" class="space-y-6">
                <div class="grid sm:grid-cols-2 gap-4">
                  <Field label="Naam" v-model="form.name" :error="form.errors.name" required />
                  <Field label="E-mail" type="email" v-model="form.email" :error="form.errors.email" required />
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                  <Field label="Telefoon" v-model="form.phone" :error="form.errors.phone" />
                  <Field label="Locatie (gemeente)" v-model="form.location" :error="form.errors.location" />
                </div>
              </div>

              <!-- STEP 4 -->
              <div v-show="step === 4" class="space-y-6">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                  <div class="text-sm font-extrabold text-slate-800">Controle</div>

                  <div class="mt-4 grid sm:grid-cols-2 gap-4 text-sm">
                    <ReviewItem label="Naam" :value="form.name || '-'" />
                    <ReviewItem label="E-mail" :value="form.email || '-'" />
                    <ReviewItem label="Telefoon" :value="form.phone || '-'" />
                    <ReviewItem label="Locatie" :value="form.location || '-'" />
                    <ReviewItem label="Afmetingen" :value="form.size || '-'" />
                    <ReviewItem label="Ondergrond" :value="form.surface || '-'" />
                    <ReviewItem label="Indoor/Outdoor" :value="form.indoor_outdoor || '-'" />
                    <ReviewItem label="Timing" :value="form.timeline || '-'" />
                    <ReviewItem label="Bestand" :value="selectedFileName || (form.reference_file ? 'Geselecteerd' : '-')" />
                  </div>

                  <div class="mt-4">
                    <div class="text-xs font-semibold text-slate-600">Bericht</div>
                    <div class="mt-1 text-sm text-slate-800 whitespace-pre-wrap">{{ form.message || '-' }}</div>
                  </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white p-5">
                  <div class="flex items-start gap-3">
                    <input id="gdpr" type="checkbox" v-model="confirmOk" class="mt-1 h-4 w-4 rounded border-slate-300" />
                    <label for="gdpr" class="text-sm text-slate-700">
                      Ik bevestig dat deze gegevens gebruikt mogen worden om mij te contacteren over deze offerte.
                    </label>
                  </div>
                </div>
              </div>

              <div class="pt-2 flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-3">
                <button
                  type="button"
                  class="inline-flex justify-center items-center rounded-md border border-slate-300 bg-white px-5 py-3 text-sm font-bold text-slate-800 hover:bg-slate-50 disabled:opacity-50"
                  @click="prevStep"
                  :disabled="step === 1 || form.processing"
                >
                  Vorige
                </button>

                <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                  <button
                    v-if="step < 4"
                    type="button"
                    class="inline-flex justify-center items-center rounded-md bg-[#c22229] px-6 py-3 text-sm font-bold text-white shadow hover:opacity-90 disabled:opacity-50"
                    @click="nextStep"
                    :disabled="form.processing"
                  >
                    Volgende
                  </button>

                  <button
                    v-else
                    type="submit"
                    class="inline-flex justify-center items-center rounded-md bg-[#c22229] px-6 py-3 text-sm font-bold text-white shadow hover:opacity-90 disabled:opacity-50"
                    :disabled="form.processing || !confirmOk"
                  >
                    {{ form.processing ? "Verzenden..." : "Offerte aanvragen" }}
                  </button>
                </div>
              </div>

              <p v-if="step === 4 && !confirmOk" class="text-xs text-slate-500">
                Vink de bevestiging aan om te kunnen verzenden.
              </p>
            </form>
          </div>
        </div>
      </section>

      <PotwFooter />
      <CookieNotice />
    </main>
  </div>
</template>

<script setup>
import { computed, ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import ProNavbar from "@/Components/Potw/ProNavbar.vue";
import ServiceCard from "@/Components/Potw/ServiceCard.vue";
import PortfolioCard from "@/Components/Potw/PortfolioCard.vue";
import FaqItem from "@/Components/Potw/FaqItem.vue";
import Field from "@/Components/Potw/Field.vue";
import ReviewItem from "@/Components/Potw/ReviewItem.vue";
import CookieNotice from "@/Components/Potw/CookieNotice.vue";
import PotwFooter from "@/Components/Potw/PotwFooter.vue";

/**
 * Smooth scroll (met sticky header offset)
 */
function scrollTo(selector) {
  const el = document.querySelector(selector);
  if (!el) return;

  // header is h-16 (64px) + klein extra ademruimte
  const headerOffset = 72;

  const rect = el.getBoundingClientRect();
  const y = rect.top + window.scrollY - headerOffset;

  window.scrollTo({ top: Math.max(0, y), behavior: "smooth" });
}

/**
 * FAQ state
 */
const faqOpen = ref(1);
function toggleFaq(i) {
  faqOpen.value = faqOpen.value === i ? 0 : i;
}

/**
 * Wizard state
 */
const step = ref(1);
const confirmOk = ref(false);
const selectedFileName = ref("");

const form = useForm({
  name: "",
  email: "",
  phone: "",
  location: "",
  size: "",
  surface: "",
  indoor_outdoor: "",
  timeline: "",
  message: "",
  reference_file: null,
});

const progressWidth = computed(() => `${(step.value / 4) * 100}%`);

function onFile(e) {
  const f = e.target.files?.[0] ?? null;
  form.reference_file = f;
  selectedFileName.value = f?.name ?? "";
}

function nextStep() {
  if (step.value === 1) {
    if (!String(form.message || "").trim() && !form.reference_file) {
      alert("Geef kort je idee in of voeg een bestand toe.");
      return;
    }
  }
  if (step.value === 3) {
    if (!String(form.name || "").trim()) {
      alert("Vul je naam in.");
      return;
    }
    if (!String(form.email || "").trim()) {
      alert("Vul je e-mail in.");
      return;
    }
  }
  step.value = Math.min(4, step.value + 1);
}

function prevStep() {
  step.value = Math.max(1, step.value - 1);
}

function onSubmitWizard() {
  if (step.value < 4) {
    nextStep();
    return;
  }

  if (!confirmOk.value) return;

  form.post(route("quote.store"), {
    forceFormData: true,
    preserveScroll: true,
    onSuccess: () => {
      confirmOk.value = false;
      selectedFileName.value = "";
      step.value = 1;

      form.reset(
        "name",
        "email",
        "phone",
        "location",
        "size",
        "surface",
        "indoor_outdoor",
        "timeline",
        "message",
        "reference_file"
      );
    },
  });
}
</script>

<style scoped>
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fadeUp { animation: fadeUp 500ms ease both; }
.delay-100 { animation-delay: 100ms; }
.delay-200 { animation-delay: 200ms; }
.delay-300 { animation-delay: 300ms; }
</style>