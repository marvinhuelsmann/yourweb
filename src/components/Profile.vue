<template>
  <div v-if="redirect !== '' && redirect != null" class="mt-1 mr-3">
    <router-link :to="'https://yourweb.monster/' + redirect.replace('redirect=', '')">
      <RewindIcon class="w-10 h-10" aria-hidden="false"/>
    </router-link>
  </div>
  <div v-if="name != null" class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <img class="object-center md:object-top xl:w-1/6 sm:w-1/4 ..." :src='imgUrl' style="display: inline-block"
             alt="">
        <h2 class="text-base text-indigo-600 pt-1 font-bold tracking-wide uppercase">{{ name }}</h2>
        <div class="justify-center text-center flex pt-2 sm:-mr-2" v-if="birthday != null">
          <h2 class="text-indigo-500 font-semibold">
            {{ birthday }}
          </h2>
          <CakeIcon v-if="birthday !== ''" class="pl-0.5 h-6 w-6 text-indigo-500" aria-hidden="true"/>
        </div>
        <div class="justify-center text-center flex sm:-mr-2" v-if="place !== null">
          <h2 class="text-indigo-500 font-semibold">
            {{ place }}
          </h2>
          <LocationMarkerIcon v-if="place !== ''" class="pl-0.5 h-6 w-6 text-indigo-500" aria-hidden="true"/>
        </div>
        <p class="mt-2 pt-1 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          {{ subHeadLine }}
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
          {{ text }}
        </p>
      </div>
      <!--  <div class="mt-10">
          <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
            <div v-for="social in social" :key="social.name" class="relative">
              <div v-if="social.name !== ''">
                <dt>
                  <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                    <component :is="social.icon" class="h-6 w-6" aria-hidden="true"/>
                  </div>
                  <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{ social.name }}</p>
                </dt>
                <dd class="mt-2 ml-16 text-base text-gray-500">
                  {{ social.description }}
                </dd>
              </div>
            </div>
          </dl>
        </div>-->
    </div>
  </div>
  <div v-else>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="mt-6 lg:text-center">
        <h2 class="text-base text-green-900 pt-1 font-bold tracking-wide uppercase">Diese Seite wurde leider nicht
          gefunden!</h2>
        <p class="mt-2 pt-1 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          Dieser Nutzer besitzt keine YourWeb Seite
        </p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
          Erstelle dir noch heute deine eigene Seite! Mit der mini oder Max Seite sind deine Kreativität keine Grenzen
          gesetzt! Ob mit viel Text oder weniger... Sie wird dir gefallen.
        </p>
        <div class="mt-3 mb-4 justify-center flex">
          <button
              class="px-9 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700" v-on:click="goHome">
            Zurück zum Start
          </button>
        </div>
      </div>
    </div>
  </div>
  <div v-if="showAdvertise" class="text-center">
    <h2 class="text-base text-green-600 font-bold tracking-wide uppercase"><a href="https://yourweb.monster">YourWeb</a>
      - {{ new Date().getFullYear() }}</h2>
  </div>
</template>

<script>
import {
  LocationMarkerIcon,
  CakeIcon,
  AnnotationIcon,
  GlobeAltIcon,
  LightningBoltIcon,
  ScaleIcon,
  RewindIcon
} from '@heroicons/vue/outline'

export default {
  name: "Profile",
  props: {
    name: String,
    subHeadLine: String,
    place: String,
    birthday: String,
    text: String,
    social: Map,
    imgUrl: String,
    showAdvertise: Boolean,
    redirect: String
  },
  components: {
    LocationMarkerIcon,
    CakeIcon,
    // eslint-disable-next-line vue/no-unused-components
    AnnotationIcon,
    // eslint-disable-next-line vue/no-unused-components
    GlobeAltIcon,
    // eslint-disable-next-line vue/no-unused-components
    LightningBoltIcon,
    // eslint-disable-next-line vue/no-unused-components
    ScaleIcon,
    RewindIcon
  },
  methods: {
    goHome() {
      window.location.href = "https://yourweb.monster";
    }
  }
}
</script>