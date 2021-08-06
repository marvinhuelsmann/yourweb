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
        <h2 class="text-base text-indigo-600 pt-1 font-bold tracking-wide uppercase">{{ name }} </h2>
        <div class="justify-center text-center flex pt-2 sm:-mr-2" v-if="birthday != null  && birthday !== 'null'">
          <h2 class="text-indigo-500 font-semibold">
            {{ birthday }}
          </h2>
          <CakeIcon v-if="birthday !== '' || birthday !== 'null'" class="pl-0.5 h-6 w-6 text-indigo-500" aria-hidden="true"/>
        </div>
        <div class="justify-center text-center flex sm:-mr-2" v-if="place !== null && place !== 'null'">
          <h2 class="text-indigo-500 font-semibold">
            {{ place }}
          </h2>
          <LocationMarkerIcon v-if="place !== ''" class="pl-0.5 h-6 w-6 text-indigo-500" aria-hidden="true"/>
        </div>
        <div v-if="verify === 'TRUE'" class="mt-1 text-center flex justify-center">
          <h2 class="text-blue-500 font-semibold">
            Verifizierter Account
          </h2>
          <BadgeCheckIcon class="h-6 text-blue-500" aria-hidden="true"/>
        </div>
        <p v-if="subHeadLine !== '' || subHeadLine !== 'null'"  class="mt-2 pt-1 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          {{ subHeadLine }}
        </p>
        <p v-if="text !== ''" class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
          {{ text }}
        </p>
        <div class="mt-4">
          <a v-if="youtube != null && youtube !== '' && youtube !== 'null'" class="text-red-500 pr-1 pl-1" :href="'/social?redirect=https://www.youtube.com/results?search_query=' + youtube + '&type=link&name=Youtube&from=https://yourweb.monster/' + id">
            YouTube
          </a>
          <a v-if="twitch != null && twitch !== '' && twitch !== 'null'" class="text-purple-500 pr-1 pl-1" :href="'/social?redirect=https://twitch.tv/' + twitch + '&type=link&name=Twitter&from=https://yourweb.monster/' + id">
            Twitch
          </a>
          <a v-if="minecraft != null && minecraft !== '' && minecraft !== 'null'" class="text-green-500 pr-1 pl-1" :href="'/social?redirect=' + minecraft + '&type=display&name=Minecraft&from=https://yourweb.monster/' + id">
            Minecraft
          </a>
          <a v-if="twitter != null && twitter !== '' && twitter !== 'null'" class="text-blue-500 pr-1 pl-1" :href="'/social?redirect=https://twitter.com/' + twitter + '&type=link&name=Twitter&from=https://yourweb.monster/' + id">
            Twitter
          </a>
          <a v-if="discord != null && discord !== '' && discord !== 'null'" class="text-blue-700 pr-1 pl-1" :href="'/social?redirect=' + discord.replace('#', '@') + '&type=display&name=Discord&from=https://yourweb.monster/' + id">
            Discord
          </a>
          <a v-if="instagram != null && instagram !== '' && instagram !== 'null'" class="text-purple-600 pr-1 pl-1" :href="'/social?redirect=https://instagram.com/' + instagram + '&type=link&name=Instagram&from=https://yourweb.monster/' + id">
            Instagram
          </a>
          <a v-if="snapchat != null && snapchat !== '' && snapchat !== 'null'" class="text-yellow-400 pr-1 pl-1" :href="'/social?redirect=https://snapchat.com/add/' + snapchat + '&type=link&name=SnapChat&from=https://yourweb.monster/' + id">
            SnapChat
          </a>
        </div>
        <div class="mt-3" v-if="link !== '' && link !== null && link !== 'null'">
          <a class="text-blue-500" :href="'/leave?redirect=' + link">
            Zu meiner Privaten Seite
          </a>
        </div>
      </div>
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
              class="px-9 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
              v-on:click="goHome">
            Zurück zum Start
          </button>
        </div>
      </div>
    </div>
  </div>
  <div v-if="showAdvertise" class="text-center">
    <div class="justify-center text-center flex">
      <h2 class="text-base text-green-600 font-bold tracking-wide uppercase"><a
          href="https://yourweb.monster">YourWeb</a>
        - {{ new Date().getFullYear() }} -</h2>
      <a :href='"https://twitter.com/intent/tweet?text=https://yourweb.monster/" + id + " " + name +  " have create a site with &hashtags=YourWebsite"'>
        <ShareIcon class="h-7 text-green-700"></ShareIcon>
      </a>
    </div>
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
  RewindIcon,
  ShareIcon, BadgeCheckIcon
} from '@heroicons/vue/outline'

export default {
  name: "Profile",
  props: {
    id: String,
    name: String,
    link: String,
    subHeadLine: String,
    place: String,
    birthday: String,
    text: String,
    social: Map,
    imgUrl: String,
    showAdvertise: Boolean,
    redirect: String,
    verify: String,

    twitter: String,
    youtube: String,
    twitch: String,
    discord: String,
    minecraft: String,
    instagram: String,
    snapchat: String

  },
  components: {
    LocationMarkerIcon,
    CakeIcon,
    BadgeCheckIcon,
    // eslint-disable-next-line vue/no-unused-components
    AnnotationIcon,
    // eslint-disable-next-line vue/no-unused-components
    GlobeAltIcon,
    // eslint-disable-next-line vue/no-unused-components
    LightningBoltIcon,
    // eslint-disable-next-line vue/no-unused-components
    ScaleIcon,
    ShareIcon,
    RewindIcon
  },
  methods: {
    goHome() {
      window.location.href = "https://yourweb.monster";
    }
  }
}
</script>