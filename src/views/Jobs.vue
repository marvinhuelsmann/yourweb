<template>
  <div class="bg-indigo-600">
    <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between flex-wrap">
        <div class="w-0 flex-1 flex items-center">
          <span class="flex p-2 rounded-lg bg-indigo-800">
            <SpeakerphoneIcon class="h-6 w-6 text-white" aria-hidden="true"/>
          </span>
          <p class="ml-3 font-medium text-white truncate">
            <span class="md:hidden">
              Soziale Netzwerke verknüpfen!
            </span>
            <span class="hidden md:inline">
              Erstelle deine persönliche mini Seite und verknüpfe deine Sozialen Netzwerke!
            </span>
          </p>
        </div>
        <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
          <a href="https://discord.gg/vHdefPjSxQ" target="_blank"
             class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
            YourWeb auf Discord
          </a>
        </div>
        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
          <button type="button" formtarget="_top"
                  onclick="window.location.href='https://twitter.com/intent/tweet?text=yourweb.monster is now starting to develop! #YourWebsite'"
                  class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
            <span class="sr-only">Dismiss</span>
            <ShareIcon class="h-6 w-6 text-white" aria-hidden="true"/>
          </button>
        </div>
      </div>
    </div>
  </div>
  <Popover class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <div class="relative z-10 pb-8 bg-white md:pb-20 lg:max-w-2xl lg:w-full">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
             fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="50,0 100,0 50,100 0,100"/>
        </svg>
        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
          <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
              <div class="flex items-center justify-between w-full md:w-auto">
                <a href="/">
                  <span class="sr-only">Workflow</span>
                  <img class="h-8 w-auto sm:h-10" src="../assets/images/yourweb.png" alt=""/>
                </a>
                <div class="-mr-2 flex items-center md:hidden">
                  <PopoverButton
                      class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Menü öffnen</span>
                    <MenuIcon class="h-6 w-6" aria-hidden="true"/>
                  </PopoverButton>
                </div>
              </div>
            </div>
            <div class="hidden justify-center text-center w-full md:block md:ml-10 md:pr-4 md:space-x-8">
              <router-link v-for="item in navigation" :key="item.name" :to="item.href"
                           class="font-medium text-gray-500 hover:text-gray-900">{{ item.name }}
              </router-link>
              <a href="#" @click="authenticate" class="sign-in-google w-full font-medium text-white">
                {{
                  signIn
                }}
              </a>
            </div>
          </nav>
        </div>
        <transition enter-active-class="duration-150 ease-out" enter-from-class="opacity-0 scale-95"
                    enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in"
                    leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
          <PopoverPanel focus class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
            <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
              <div class="px-5 pt-4 flex items-center justify-between">
                <div>
                  <a href="https://yourweb.monster">
                    <img class="h-8 w-auto" src="../assets/images/yourweb.png" alt=""/>
                  </a>
                </div>
                <div class="-mr-2">
                  <PopoverButton
                      class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Schließen</span>
                    <XIcon class="h-6 w-6" aria-hidden="true"/>
                  </PopoverButton>
                </div>
              </div>
              <div class="px-2 pt-2 pb-3 space-y-1">
                <a v-for="item in navigation" :key="item.name" :href="item.href"
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">{{
                    item.name
                  }}</a>
              </div>
              <a href="#" @click="authenticate"
                 class="sign-in-google w-full block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                {{ signIn }}
              </a>
            </div>
          </PopoverPanel>
        </transition>
      </div>
    </div>
    <main class="mx-auto max-w-7xl px-4 px-8">
      <div class="pb-2 flex justify-center responsive-at-root ...">
        <div class="invisible sm:block sm:visible hidden">
          <img src="../assets/images/memoji-black.png" alt="memoji banner"/>
        </div>
        <div/>
          <img class="justify-center" src="../assets/images/memoji-happy.png" alt="memoji banner"/>
      </div>
      <div class="lg:mt-10 sm:mt-2 text-center text-center">
        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
          <span class="block inline">Monster Jobs</span>
          {{ ' ' }}
          <br/>
          <span class="block text-green-700 xl:inline">helfe und oder organisiere</span>
        </h1>
        <p class="mt-3 text-center text-gray-500 text-lg sm:max-w-xl mx-auto md:mt-5 md:text-xl">
          Helfe als Monster Moderator die Community Sektion oder spezifische mini Seiten von bösartigen Seiten
          fernzuhalten.
        </p>


        <div class="mt-5 sm:mt-8 flex justify-center justify-start">
          <div class="mt-3 sm:mt-0 sm:ml-3">
            <button disabled
                    aria-disabled="true"
                    class="w-full disabled:opacity-50 flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-green-100 hover:bg-red-200 hover:text-red-600 md:py-4 md:text-lg md:px-10">
              Keine Jobs verfügbar
            </button>
          </div>
        </div>
      </div>
    </main>
  </Popover>
  <div class="pt-10">
    <div class="bg-gray-50">
      <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          <span class="block">Bereit neues zu erleben?</span>
          <span class="block text-blue-600">Erstelle dir heute deine kostenlose mini Seite.</span>
        </h2>
        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
          <div class="inline-flex rounded-md shadow">
            <a href="/create"
               class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
              mini Seite
            </a>
          </div>
          <div class="ml-3 inline-flex rounded-md shadow">
            <a href="#"
               class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
              Max Seite
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="xl:pt-10">
    <div class="focus-within:bg-white">
      <div class="py-12 px-4 sm:px-6 lg:py-16 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl content-center font-extrabold  text-gray-900 sm:text-4xl">
          <span class="block">Monster Websites</span>
        </h2>
        <p class="text-center text-gray-500 sm:text-lg sm:max-w-xl  md:text-xl">
          © {{ new Date().getFullYear() }} - YourWeb von Marvin Hülsmann
          <br/>
          <a href="/jobs" class="bg-green-50">Jobs</a>
          -
          <a href="https://marvhuelsmann.de/data"
             class="shadow-xl bg-blue-100 transition-colors">Impressum</a>
        </p>
        <h2 class="text-3xl content-center font-extrabold text-gray-900 sm:text-4xl">
          <span class="block text-green-700">Deine eigene Website!</span>
        </h2>
      </div>
    </div>
  </div>
</template>

<script>
import {Popover, PopoverButton, PopoverPanel} from '@headlessui/vue'
import {MenuIcon, XIcon, SpeakerphoneIcon, ShareIcon} from '@heroicons/vue/outline'
import {store} from "@/store";

const navigation = [
  {name: 'Community', href: '/community'},
  {name: 'Suchen', href: '/search'},
]

export default {
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    SpeakerphoneIcon,
    MenuIcon,
    ShareIcon,
    XIcon,
  },
  setup() {
    return {
      navigation,
    }
  },
  data() {
    return {
      user: store.state.user != null ? store.state.user : '',
      userFullName: store.state.googleUser.name != null ? store.state.googleUser.name : ''
    }
  },
  methods: {
    authenticate() {
      if (this.user === 'undefined') this.handleClickSignIn()
      if (this.user !== '') {
        this.goToDashBoard()
      } else this.handleClickSignIn()
    },
    goToDashBoard() {
      if (this.user !== '') {
        window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/dashboard/home' : 'https://yourweb.monster/dashboard/home'
      }
    },
    async handleClickSignIn() {
      try {
        const googleUser = await this.$gAuth.signIn();
        if (!googleUser) {
          return null;
        }
        this.user = googleUser.getBasicProfile();
        this.userFullName = googleUser.getBasicProfile().getName();

        store.mutations.SET_GOOGLE_USER_NAME(googleUser.getBasicProfile().getName())
        store.mutations.SET_GOOGLE_USER_ID(googleUser.getBasicProfile().getId())
        store.mutations.SET_GOOGLE_USER_EMAIL(googleUser.getBasicProfile().getEmail())
        store.mutations.SET_GOOGLE_USER_IMAGE(googleUser.getBasicProfile().getImageUrl())

        store.mutations.SET_USER(googleUser.getBasicProfile())
        store.mutations.SET_TOKEN(this.$gAuth.instance.currentUser.get().getAuthResponse().id_token)
      } catch (error) {
        console.error(error);
        return null;
      }
    }
  },
  computed: {
    googleUser() {
      return store.state.user
    },
    signIn() {
      if (this.userFullName !== '') {
        return this.userFullName + "'s Profil";
      } else return "Mit Google anmelden"
    }
  },
  mounted() {
    if (this.googleUser === null) {
      if (localStorage.getItem('users')) {
        this.$forceUpdate();
        document.location.reload(true)
      }
    } else {
      store.mutations.isInSession()
      this.isInSession(store.state.token)
    }
  }
}
</script>

<style>
.sign-in-google {
  align-items: center;
  padding: 8px 16px;

  height: 50px;
  left: 16px;
  top: 82px;

  color: white;

  background: #2064d7;
  border-radius: 7px;
}
</style>