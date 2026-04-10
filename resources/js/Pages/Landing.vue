<!-- resources/js/Pages/Landing.vue -->
<template>
  <div class="min-h-screen bg-[#f3f5f8] text-slate-900">
    <ProNavbar />

    <main id="top">
      <!-- HERO -->
      <section class="pt-8 pb-6">
        <div class="mx-auto max-w-6xl px-4">
          <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_12px_40px_rgba(0,0,0,0.08)]">
            <div class="relative">
              <div class="absolute inset-0">
                <img
                  src="/images/potw/hero-bg.png"
                  alt="Print on the wall"
                  class="h-full w-full object-cover object-center"
                  draggable="false"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-white/75 via-white/60 to-white/85"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 via-transparent to-orange-500/10"></div>
              </div>

              <div class="relative px-6 py-10 sm:px-10 sm:py-12">
                <div class="grid items-start gap-8 lg:grid-cols-[1.25fr_0.75fr]">
                  <div class="space-y-6">
                    <div class="max-w-2xl">
                      <div class="animate-fadeUp text-sm font-bold uppercase tracking-[0.2em] text-[#c22229]">
                        Direct wall printing
                      </div>

                      <h1 class="mt-3 animate-fadeUp delay-100 text-4xl font-black leading-[1.05] tracking-tight text-slate-900 sm:text-5xl">
                        Jouw ontwerp,
                        <br />
                        rechtstreeks op de muur geprint
                      </h1>

                      <div class="mt-4 animate-fadeUp delay-200 text-xl font-extrabold text-slate-800">
                        You think it, we print it.
                      </div>

                      <p class="mt-4 max-w-xl animate-fadeUp delay-300 text-slate-700">
                        Geen stickers. Geen behang. Wel een unieke muurprint die meteen opvalt.
                        Voor thuis, zaak of kantoor - volledig gepersonaliseerd en professioneel geplaatst.
                      </p>
                    </div>

                    <div class="animate-fadeUp delay-300 flex flex-col gap-3 sm:flex-row">
                      <button
                        type="button"
                        @click="scrollTo('#offerte')"
                        class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-6 py-3 text-sm font-semibold text-white shadow hover:opacity-90"
                      >
                        Vraag gratis visualisatie aan
                      </button>

                      <button
                        type="button"
                        @click="scrollTo('#portfolio')"
                        class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white/90 px-6 py-3 text-sm font-semibold text-slate-900 hover:bg-white"
                      >
                        Bekijk realisaties
                      </button>
                    </div>

                    <div class="animate-fadeUp delay-300 grid gap-3 pt-2 text-sm text-slate-700 sm:grid-cols-3">
                      <div class="rounded-xl border border-slate-200 bg-white/80 px-4 py-3 shadow-sm">
                        <div class="font-extrabold text-slate-900">Voor thuis</div>
                        <div class="mt-1 text-slate-600">Kinderkamer, bureau, leefruimte</div>
                      </div>

                      <div class="rounded-xl border border-slate-200 bg-white/80 px-4 py-3 shadow-sm">
                        <div class="font-extrabold text-slate-900">Voor bedrijven</div>
                        <div class="mt-1 text-slate-600">Logo walls, branding, ontvangstruimtes</div>
                      </div>

                      <div class="rounded-xl border border-slate-200 bg-white/80 px-4 py-3 shadow-sm">
                        <div class="font-extrabold text-slate-900">Op maat</div>
                        <div class="mt-1 text-slate-600">Foto, illustratie, tekst of ontwerp</div>
                      </div>
                    </div>
                  </div>

                  <div class="animate-fadeUp delay-200 space-y-4">
                    <div class="flex items-center gap-4 rounded-xl border border-slate-200 bg-white/90 px-5 py-4 shadow-sm">
                      <div class="grid h-11 w-11 place-items-center rounded-xl border border-slate-200 bg-slate-900/5">
                        <svg viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M4 7h16"></path>
                          <path d="M6 7v13h12V7"></path>
                          <path d="M8 11h8"></path>
                          <path d="M8 15h8"></path>
                        </svg>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-800">Rechtstreeks op de muur</div>
                        <div class="text-sm text-slate-500">Geen stickers of behang</div>
                      </div>
                    </div>

                    <div class="flex items-center gap-4 rounded-xl border border-slate-200 bg-white/90 px-5 py-4 shadow-sm">
                      <div class="grid h-11 w-11 place-items-center rounded-xl border border-slate-200 bg-slate-900/5">
                        <svg viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M4 4h16v12H4z"></path>
                          <path d="M7 16h10"></path>
                          <path d="M9 20h6"></path>
                          <path d="M8 11l2-2 3 3 2-2 2 2"></path>
                        </svg>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-800">Volledig gepersonaliseerd</div>
                        <div class="text-sm text-slate-500">Logo, kunst, foto of tekst</div>
                      </div>
                    </div>

                    <div class="flex items-center gap-4 rounded-xl border border-slate-200 bg-white/90 px-5 py-4 shadow-sm">
                      <div class="grid h-11 w-11 place-items-center rounded-xl border border-slate-200 bg-slate-900/5">
                        <svg viewBox="0 0 24 24" class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M12 3v2"></path>
                          <path d="M7.05 5.05l1.4 1.4"></path>
                          <path d="M3 12h2"></path>
                          <path d="M5.05 16.95l1.4-1.4"></path>
                          <path d="M12 19v2"></path>
                          <path d="M18.95 16.95l-1.4-1.4"></path>
                          <path d="M19 12h2"></path>
                          <path d="M16.95 5.05l-1.4 1.4"></path>
                          <path d="M12 12l4-2"></path>
                          <path d="M21 12a9 9 0 1 1-18 0Z"></path>
                        </svg>
                      </div>
                      <div>
                        <div class="font-extrabold text-slate-800">Professioneel geplaatst</div>
                        <div class="text-sm text-slate-500">Voor thuis, zaak of kantoor</div>
                      </div>
                    </div>

                    <div class="rounded-xl border border-[#c22229]/20 bg-[#c22229]/5 px-5 py-4 shadow-sm">
                      <div class="text-sm font-bold uppercase tracking-wide text-[#c22229]">
                        Extra laagdrempelig starten
                      </div>
                      <div class="mt-2 text-lg font-extrabold text-slate-900">
                        Stuur je muurfoto door
                      </div>
                      <p class="mt-2 text-sm text-slate-600">
                        Met een foto van je muur, je afmetingen en een korte omschrijving kunnen we je snel verder helpen.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- SNELLE CTA -->
      <section class="pb-4 sm:pb-6">
        <div class="mx-auto max-w-6xl px-4">
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <div class="grid items-center gap-6 lg:grid-cols-[1fr_auto]">
              <div>
                <h2 class="text-2xl font-black text-slate-800">
                  Benieuwd hoe jouw muur eruit kan zien?
                </h2>
                <p class="mt-2 text-slate-600">
                  Stuur ons een foto van je muur en een korte omschrijving van je idee.
                  Wij bekijken snel wat mogelijk is en bezorgen je een voorstel of visualisatie.
                </p>
              </div>

              <div>
                <button
                  type="button"
                  @click="scrollTo('#offerte')"
                  class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-6 py-3 text-sm font-semibold text-white shadow hover:opacity-90"
                >
                  Start je aanvraag
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- DIENSTEN -->
      <section id="diensten" class="scroll-mt-[88px] py-8 sm:py-10">
        <div class="mx-auto max-w-6xl px-4">
          <h2 class="text-4xl font-black text-slate-800">Toepassingen</h2>
          <div class="mt-2 h-1 w-20 rounded bg-orange-500"></div>

          <p class="mt-6 text-lg text-slate-600">
            Of je nu een kinderkamer, ontvangstruimte, winkel of kantoor wil opwaarderen:
            wij maken van elke muur een blikvanger.
          </p>

          <div class="mt-8 grid gap-6 lg:grid-cols-3">
            <ServiceCard
              ribbon="Bedrijven"
              ribbonColor="orange"
              title="Logo & branding"
              text="Receptie, kantoor, showroom, vergaderzaal of ontvangstruimte."
              img="/images/potw/service-bedrijven.png"
            />

            <ServiceCard
              ribbon="Particulieren"
              ribbonColor="blue"
              title="Interieur & decoratie"
              text="Foto’s, illustraties, quotes, kinderkamer, bureau of accentmuur."
              img="/images/potw/service-particulieren.png"
            />

            <ServiceCard
              ribbon="Retail"
              ribbonColor="orange"
              title="Winkel & praktijk"
              text="Winkelruimte, salon, praktijk, horeca of opvallende commerciële muur."
              img="/images/potw/service-outdoor.png"
            />
          </div>
        </div>
      </section>

      <!-- PORTFOLIO -->
      <section id="portfolio" class="scroll-mt-[88px] py-8 sm:py-10">
        <div class="mx-auto max-w-6xl px-4">
          <div class="flex items-end justify-between gap-4">
            <div>
              <h2 class="text-4xl font-black text-slate-800">Realisaties & inspiratie</h2>
              <div class="mt-2 h-1 w-20 rounded bg-orange-500"></div>
              <p class="mt-5 text-lg text-slate-600">
                Enkele voorbeelden van wat mogelijk is op jouw muur.
              </p>
            </div>

            <button
              type="button"
              class="hidden rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-800 hover:bg-slate-50 sm:inline-flex"
              @click="scrollTo('#offerte')"
            >
              Ook zoiets? Vraag je visualisatie aan
            </button>
          </div>

          <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <PortfolioCard
              title="Logo in receptie"
              subtitle="Strak en professioneel"
              tag="Bedrijven"
              img="/images/potw/portfolio-1.png"
            />
            <PortfolioCard
              title="Accentmuur / kunst"
              subtitle="Warme sfeer in huis"
              tag="Interieur"
              img="/images/potw/portfolio-2.png"
            />
            <PortfolioCard
              title="Winkel / etalage"
              subtitle="Opvallende commerciële toepassing"
              tag="Retail"
              img="/images/potw/portfolio-3.png"
            />
            <PortfolioCard
              title="Kindermuur"
              subtitle="Illustraties, patronen of naam"
              tag="Particulier"
              img="/images/potw/portfolio-4.png"
            />
            <PortfolioCard
              title="Signalisatie"
              subtitle="Duidelijke info en routing"
              tag="Signalisatie"
              img="/images/potw/portfolio-5.png"
            />
            <PortfolioCard
              title="Foto / branding"
              subtitle="Scherp, modern en op maat"
              tag="Branding"
              img="/images/potw/portfolio-6.png"
            />
          </div>
        </div>
      </section>

      <!-- WERKWIJZE -->
      <section id="werkwijze" class="scroll-mt-[88px] py-8 sm:py-10">
        <div class="mx-auto max-w-6xl px-4">
          <h2 class="text-4xl font-black text-slate-800">Hoe werkt het?</h2>
          <div class="mt-2 h-1 w-20 rounded bg-orange-500"></div>

          <div class="mt-8 grid gap-6 md:grid-cols-3">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
              <div class="text-sm font-bold text-[#c22229]">Stap 1</div>
              <h3 class="mt-2 text-xl font-extrabold text-slate-800">Stuur je idee door</h3>
              <p class="mt-3 text-slate-600">
                Bezorg ons je afmetingen, een foto van de muur en een korte omschrijving van wat je wil laten printen.
              </p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
              <div class="text-sm font-bold text-[#c22229]">Stap 2</div>
              <h3 class="mt-2 text-xl font-extrabold text-slate-800">Wij bekijken wat mogelijk is</h3>
              <p class="mt-3 text-slate-600">
                Op basis van je muur, ontwerp en ondergrond bezorgen we je snel een voorstel of prijsinschatting.
              </p>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
              <div class="text-sm font-bold text-[#c22229]">Stap 3</div>
              <h3 class="mt-2 text-xl font-extrabold text-slate-800">We printen op locatie</h3>
              <p class="mt-3 text-slate-600">
                Na goedkeuring komen we ter plaatse en printen we het ontwerp rechtstreeks op jouw muur.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- PRIJZEN -->
      <section id="prijzen" class="scroll-mt-[88px] py-8 sm:py-10">
        <div class="mx-auto max-w-6xl px-4">
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
              <div>
                <h2 class="text-3xl font-black text-slate-800">Richtprijzen</h2>
                <div class="mt-2 h-1 w-20 rounded bg-orange-500"></div>
              </div>

              <button
                type="button"
                @click="scrollTo('#offerte')"
                class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-800 hover:bg-slate-50"
              >
                Vraag je voorstel aan
              </button>
            </div>

            <p class="mt-5 text-slate-600">
              Elke muur en elk ontwerp is anders. Daarom bezorgen we altijd een correcte prijs op basis van afmetingen,
              ondergrond en ontwerp. Hieronder vind je een eerste indicatie.
            </p>

            <div class="mt-6 grid gap-4 md:grid-cols-3">
              <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                <div class="text-sm font-semibold text-slate-500">Kleine prints</div>
                <div class="mt-2 text-2xl font-black text-slate-900">vanaf €199</div>
                <p class="mt-2 text-sm text-slate-600">
                  Ideaal voor quotes, logo’s en compacte toepassingen.
                </p>
              </div>

              <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                <div class="text-sm font-semibold text-slate-500">Middelgrote muren</div>
                <div class="mt-2 text-2xl font-black text-slate-900">vanaf €59/m²</div>
                <p class="mt-2 text-sm text-slate-600">
                  Voor slaapkamers, bureaus, accentmuren en branding.
                </p>
              </div>

              <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                <div class="text-sm font-semibold text-slate-500">Grotere projecten</div>
                <div class="mt-2 text-2xl font-black text-slate-900">op maat</div>
                <p class="mt-2 text-sm text-slate-600">
                  Voor winkels, horeca, kantoren en grotere oppervlaktes.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- FAQ -->
      <section id="faq" class="scroll-mt-[88px] py-8 sm:py-10">
        <div class="mx-auto max-w-6xl px-4">
          <h2 class="text-4xl font-black text-slate-800">FAQ</h2>
          <div class="mt-2 h-1 w-20 rounded bg-orange-500"></div>

          <div class="mt-8 grid gap-6 lg:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
              <FaqItem
                :open="faqOpen === 1"
                title="Op welke ondergronden kan je printen?"
                text="Veel ondergronden zijn mogelijk, zoals baksteen, beton, hout, gips en panelen. In je aanvraag kan je de ondergrond meegeven zodat we dit correct kunnen beoordelen."
                @toggle="toggleFaq(1)"
              />
              <div class="my-4 h-px bg-slate-200"></div>

              <FaqItem
                :open="faqOpen === 2"
                title="Moet de muur perfect vlak zijn?"
                text="Niet altijd. Kleine textuur is meestal geen probleem. Voor heel ruwe, brokkelige of sterk oneffen muren bekijken we dit best vooraf aan de hand van een foto."
                @toggle="toggleFaq(2)"
              />
              <div class="my-4 h-px bg-slate-200"></div>

              <FaqItem
                :open="faqOpen === 3"
                title="Kan ik eerst een visualisatie of prijsinschatting krijgen?"
                text="Ja. Met een foto van de muur, de afmetingen en een korte omschrijving kunnen we snel bekijken wat mogelijk is en een eerste voorstel bezorgen."
                @toggle="toggleFaq(3)"
              />
              <div class="my-4 h-px bg-slate-200"></div>

              <FaqItem
                :open="faqOpen === 4"
                title="Welke kwaliteit of resolutie moet mijn bestand hebben?"
                text="Hoe scherper het bestand, hoe beter het resultaat. Stuur gerust door wat je hebt - we laten je weten of de kwaliteit voldoende is voor een mooie print."
                @toggle="toggleFaq(4)"
              />
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
              <FaqItem
                :open="faqOpen === 5"
                title="Werken jullie ook voor bedrijven en commerciële ruimtes?"
                text="Ja. We maken muurprints voor woningen, kantoren, winkels, horeca, salons, praktijken en andere commerciële ruimtes."
                @toggle="toggleFaq(5)"
              />
              <div class="my-4 h-px bg-slate-200"></div>

              <FaqItem
                :open="faqOpen === 6"
                title="Hoe snel kan dit?"
                text="Dat hangt af van het project, de planning en de ondergrond. Geef je gewenste timing mee in je aanvraag, dan bekijken we samen wat haalbaar is."
                @toggle="toggleFaq(6)"
              />
              <div class="my-4 h-px bg-slate-200"></div>

              <FaqItem
                :open="faqOpen === 7"
                title="Doen jullie ook plaatsing op locatie?"
                text="Ja. We komen ter plaatse, bekijken de situatie en printen het ontwerp rechtstreeks op de muur."
                @toggle="toggleFaq(7)"
              />
              <div class="my-4 h-px bg-slate-200"></div>

              <FaqItem
                :open="faqOpen === 8"
                title="Kan ik eerst een richtprijs krijgen?"
                text="Zeker. Met afmetingen, ondergrond, locatie en een referentiefoto kunnen we snel een correcte inschatting geven."
                @toggle="toggleFaq(8)"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- OFFERTES -->
      <section id="offerte" class="scroll-mt-[88px] py-10 sm:py-12">
        <div class="mx-auto max-w-6xl px-4">
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
              <div>
                <h2 class="text-2xl font-extrabold text-slate-800">Vraag je gratis voorstel aan</h2>
                <p class="mt-2 text-slate-600">
                  In 4 korte stappen ontvangen we alles wat nodig is om jouw muurprint correct in te schatten.
                </p>
                <p v-if="whatsappUrl" class="mt-3 text-sm text-slate-500">
                  Liever sneller contact?
                  <a
                    :href="whatsappUrl"
                    target="_blank"
                    rel="noopener"
                    class="font-semibold text-green-700 hover:underline"
                  >
                    Stuur je muurfoto via WhatsApp
                  </a>
                </p>
              </div>

              <div class="text-sm text-slate-500">
                Stap <span class="font-bold text-slate-700">{{ step }}</span> / 4
              </div>
            </div>

            <div class="mt-6">
              <div class="h-2 w-full overflow-hidden rounded-full border border-slate-200 bg-slate-100">
                <div class="h-full bg-[#c22229]" :style="{ width: progressWidth }"></div>
              </div>

              <div class="mt-3 grid grid-cols-4 text-xs text-slate-600">
                <div :class="step >= 1 ? 'font-semibold text-slate-900' : ''">Idee</div>
                <div :class="step >= 2 ? 'font-semibold text-slate-900' : ''" class="text-center">Details</div>
                <div :class="step >= 3 ? 'font-semibold text-slate-900' : ''" class="text-center">Contact</div>
                <div :class="step >= 4 ? 'font-semibold text-slate-900' : ''" class="text-right">Versturen</div>
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
                    placeholder="Beschrijf kort wat je wil laten printen, op welke muur dit moet komen en eventueel in welke ruimte - bv. logo in receptie, illustratie in kinderkamer of quote in bureau."
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
                <div class="grid gap-4 sm:grid-cols-2">
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
                <div class="grid gap-4 sm:grid-cols-2">
                  <Field label="Naam" v-model="form.name" :error="form.errors.name" required />
                  <Field label="E-mail" type="email" v-model="form.email" :error="form.errors.email" required />
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                  <Field label="Telefoon" v-model="form.phone" :error="form.errors.phone" />
                  <Field label="Locatie (gemeente)" v-model="form.location" :error="form.errors.location" />
                </div>
              </div>

              <!-- STEP 4 -->
              <div v-show="step === 4" class="space-y-6">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                  <div class="text-sm font-extrabold text-slate-800">Controle</div>

                  <div class="mt-4 grid gap-4 text-sm sm:grid-cols-2">
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
                    <div class="mt-1 whitespace-pre-wrap text-sm text-slate-800">{{ form.message || '-' }}</div>
                  </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white p-5">
                  <div class="flex items-start gap-3">
                    <input id="gdpr" v-model="confirmOk" type="checkbox" class="mt-1 h-4 w-4 rounded border-slate-300" />
                    <label for="gdpr" class="text-sm text-slate-700">
                      Ik bevestig dat deze gegevens gebruikt mogen worden om mij te contacteren over deze aanvraag.
                    </label>
                  </div>
                </div>
              </div>

              <div class="flex flex-col-reverse gap-3 pt-2 sm:flex-row sm:items-center sm:justify-between">
                <button
                  type="button"
                  class="inline-flex items-center justify-center rounded-md border border-slate-300 bg-white px-5 py-3 text-sm font-bold text-slate-800 hover:bg-slate-50 disabled:opacity-50"
                  @click="prevStep"
                  :disabled="step === 1 || form.processing"
                >
                  Vorige
                </button>

                <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                  <button
                    v-if="step < 4"
                    type="button"
                    class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-6 py-3 text-sm font-bold text-white shadow hover:opacity-90 disabled:opacity-50"
                    @click="nextStep"
                    :disabled="form.processing"
                  >
                    Volgende
                  </button>

                  <button
                    v-else
                    id="offerte-aanvragen"
                    type="submit"
                    class="inline-flex items-center justify-center rounded-md bg-[#c22229] px-6 py-3 text-sm font-bold text-white shadow hover:opacity-90 disabled:opacity-50"
                    :disabled="form.processing || !confirmOk"
                  >
                    {{ form.processing ? "Verzenden..." : "Aanvraag versturen" }}
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

    <!-- FLOATING WHATSAPP -->
    <a
      v-if="whatsappUrl"
      :href="whatsappUrl"
      target="_blank"
      rel="noopener"
      aria-label="Stuur je muurfoto via WhatsApp"
      title="Stuur je muurfoto via WhatsApp"
      class="fixed bottom-5 right-5 z-50 flex items-center gap-3 rounded-full border border-green-200 bg-green-50 px-4 py-3 text-green-700 shadow-lg transition hover:-translate-y-[2px] hover:bg-green-100"
    >
      <span class="grid h-10 w-10 place-items-center rounded-full bg-green-500 text-white shadow">
        <svg viewBox="0 0 24 24" class="h-5 w-5 fill-current">
          <path d="M20.52 3.48A11.86 11.86 0 0 0 12.06 0C5.5 0 .17 5.33.17 11.89c0 2.09.55 4.13 1.59 5.93L0 24l6.37-1.67a11.8 11.8 0 0 0 5.69 1.45h.01c6.56 0 11.89-5.33 11.89-11.89c0-3.18-1.24-6.17-3.44-8.41ZM12.07 21.74h-.01a9.8 9.8 0 0 1-4.99-1.37l-.36-.21-3.78.99l1.01-3.68l-.23-.38a9.8 9.8 0 0 1-1.5-5.2c0-5.42 4.41-9.83 9.84-9.83c2.63 0 5.1 1.02 6.96 2.89a9.77 9.77 0 0 1 2.87 6.95c0 5.42-4.41 9.84-9.82 9.84Zm5.39-7.35c-.3-.15-1.77-.87-2.05-.97c-.27-.1-.47-.15-.67.15c-.2.3-.77.97-.94 1.17c-.17.2-.35.22-.65.08c-.3-.15-1.26-.46-2.4-1.47c-.88-.78-1.48-1.74-1.65-2.04c-.17-.3-.02-.46.13-.61c.13-.13.3-.35.45-.52c.15-.17.2-.3.3-.5c.1-.2.05-.37-.02-.52c-.08-.15-.67-1.62-.92-2.22c-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.08-.8.37c-.27.3-1.04 1.02-1.04 2.48c0 1.47 1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.09 4.49c.71.31 1.27.49 1.7.63c.71.23 1.36.2 1.87.12c.57-.08 1.77-.72 2.02-1.42c.25-.7.25-1.29.17-1.42c-.07-.12-.27-.2-.57-.35Z" />
        </svg>
      </span>

      <span class="hidden pr-1 text-sm font-semibold sm:inline">
        Stuur je muurfoto via WhatsApp
      </span>
    </a>
  </div>
</template>

<script setup>
import { computed, ref } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";

import ProNavbar from "@/Components/Potw/ProNavbar.vue";
import ServiceCard from "@/Components/Potw/ServiceCard.vue";
import PortfolioCard from "@/Components/Potw/PortfolioCard.vue";
import FaqItem from "@/Components/Potw/FaqItem.vue";
import Field from "@/Components/Potw/Field.vue";
import ReviewItem from "@/Components/Potw/ReviewItem.vue";
import CookieNotice from "@/Components/Potw/CookieNotice.vue";
import PotwFooter from "@/Components/Potw/PotwFooter.vue";

const page = usePage();

function scrollTo(selector) {
  const el = document.querySelector(selector);
  if (!el) return;

  const headerOffset = 72;
  const rect = el.getBoundingClientRect();
  const y = rect.top + window.scrollY - headerOffset;

  window.scrollTo({
    top: Math.max(0, y),
    behavior: "smooth",
  });
}

const faqOpen = ref(1);

function toggleFaq(i) {
  faqOpen.value = faqOpen.value === i ? 0 : i;
}

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

const company = computed(() => page.props.potw?.company ?? {});

const whatsappUrl = computed(() => {
  const raw = String(company.value?.phone ?? "").trim();
  if (!raw) return "";

  const cleaned = raw.replace(/[^\d+]/g, "");
  const normalized = cleaned.startsWith("+")
    ? cleaned.slice(1)
    : cleaned.startsWith("00")
      ? cleaned.slice(2)
      : cleaned.startsWith("0")
        ? `32${cleaned.slice(1)}`
        : cleaned;

  const message = encodeURIComponent(
    "Hallo! Ik heb interesse in een muurprint voor Print on the wall. Kan ik een eerste inschatting krijgen?"
  );

  return `https://wa.me/${normalized}?text=${message}`;
});

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
  from {
    opacity: 0;
    transform: translateY(10px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fadeUp {
  animation: fadeUp 500ms ease both;
}

.delay-100 {
  animation-delay: 100ms;
}

.delay-200 {
  animation-delay: 200ms;
}

.delay-300 {
  animation-delay: 300ms;
}
</style>