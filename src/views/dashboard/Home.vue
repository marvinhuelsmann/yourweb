<template>
  <div v-if="userOneGaming != null">
    <div class="bg-green-600">
      <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
          <div class="w-0 flex-1 flex items-center">
          <span class="flex p-2 rounded-lg bg-green-800">
            <AnnotationIcon class="h-6 w-6 text-white" aria-hidden="true"/>
          </span>
            <p class="ml-3 font-medium text-white truncate">
            <span class="md:hidden">
              Keine Neuigkeiten!
            </span>
              <span class="hidden md:inline">
               Momentan gibt es keine Neuigkeiten!
            </span>
            </p>
          </div>
          <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
            <a href="#" @click="logout"
               class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-green-600 bg-white hover:bg-green-50">
              Abmelden
            </a>
          </div>
          <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button type="button" formtarget="_top"
                    onclick="window.location.href='https://twitter.com/intent/tweet?text=yourweb.monster is now starting to develop! #YourWebsite'"
                    class="-mr-1 flex p-2 rounded-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
              <span class="sr-only">Dismiss</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <Popover class="relative bg-white overflow-hidden">
      <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
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
                    <img class="h-8 w-auto sm:h-10" src="../../assets/images/yourweb.png" alt=""/>
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
              <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
                <router-link v-for="item in navigation" :key="item.name" :to="item.href"
                             class="font-medium text-gray-500 hover:text-gray-900">{{ item.name }}
                </router-link>
                <a :href='"https://yourweb.monster/" + user.id'
                   class="font-medium text-green-600 hover:text-green-500"> {{ userOneGaming.name }}</a>
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
                    <img class="h-8 w-auto" src="../../assets/images/yourweb.png" alt=""/>
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
                <a :href='"https://yourweb.monster/" + user.id'
                   class="block w-full px-5 py-3 text-center font-medium text-green-600 bg-gray-50 hover:bg-gray-100">
                  {{ userOneGaming.name }}
                </a>
              </div>
            </PopoverPanel>
          </transition>
          <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
            <div class="sm:text-center lg:text-left">
              <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block xl:inline">Dein Monster</span>
                {{ ' ' }}
                <span class="block text-green-600 xl:inline">Website Profil</span>
              </h1>


              <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                <div class="rounded-md shadow">
                  <a href="/dashboard/manage"
                     class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10">
                    Seite verwalten
                  </a>
                </div>
              </div>
            </div>
          </main>
        </div>
      </div>
      <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
             src="../../assets/images/dashboard-banner.png"
             alt=""/>
      </div>
    </Popover>
    <div class="pt-10">
      <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
          <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            <span class="block">Bereit neues zu erleben?</span>
            <span class="block text-indigo-600">Erstelle dir heute deine kostenlose mini Seite.</span>
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
        <div class=" py-12 px-4 sm:px-6 lg:py-16 lg:flex lg:items-center lg:justify-between">
          <h2 class="text-3xl content-center font-extrabold  text-gray-900 sm:text-4xl">
            <span class="block">Monster Websites</span>
          </h2>
          <p class="text-base text-gray-500 sm:text-lg sm:max-w-xl  md:text-xl">
            © {{ new Date().getFullYear() }} - Marvin Hülsmann / <a href="https://marvhuelsmann.de/data"
                                                                    class="shadow-xl bg-blue-100 transition-colors">Impressum</a>
            Um weiteres von mir zu erfahren besuche meine <a
              class="bg-green-100 shadow-xl transition-colors ease-in-out"
              href="https://marvhuelsmann.de">Portofolio Seite</a>.
          </p>
          <h2 class="text-3xl content-center font-extrabold text-gray-900 sm:text-4xl">
            <span class="block text-green-700">Deine eigene Website!</span>
          </h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {Popover, PopoverButton, PopoverPanel} from "@headlessui/vue";

const navigation = [
  {name: 'Einstellungen', href: '/dashboard/settings'},
]

import {store} from "@/store";
import {MenuIcon, AnnotationIcon, XIcon} from "@heroicons/vue/outline/esm";

export default {
  name: "Home",
  data() {
    return {
      user: {
        id: null,
        name: null,
        subHeadLine: null,
        color: null,
        text: null,
        birthday: null,
        place: null,
        image: null,
        likes: null
      },
    }
  },
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    AnnotationIcon,
    MenuIcon,
    XIcon,
  },
  setup() {
    return {
      navigation,
    }
  },
  computed: {
    userOneGaming() {
      return store.state.user
    },
    tokenOneGaming() {
      return store.state.token
    }
  },
  mounted() {
  this.isInSession()

    if (this.userOneGaming != null) {
      fetch('https://yourweb.monster/api/v1/getSiteOneGaming?i=' + this.userOneGaming.id).then(result => {
        result.json().then(result => {
          this.user = result
        }).catch(error => {
          console.error(error)
        })
      })
    }

    if (this.userOneGaming === null) {
      window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
    }
  },
  methods: {
    authenticate() {
      if (this.userOneGaming === null) {
        window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
      } else {
        window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/dashboard/home' : 'https://yourweb.monster/dashboard/home'
      }
    },
    logout() {
      store.mutations.REMOVE_USER()
      store.mutations.REMOVE_TOKEN()
      window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/' : 'https://yourweb.monster/'
    },
    isInSession() {
      this.axios.get('https://id.onegaming.group/api/v1/user', {
        headers: {
          'Authorization': 'Bearer ' + this.tokenOneGaming
        }
      }).then(response => {
        if (response.status === 200) {
          store.mutations.SET_USER(response.data)
          store.mutations.SET_TOKEN(this.tokenOneGaming)
        }
      }).catch(error => {
        if (error.response.status === 401) {
          store.mutations.REMOVE_TOKEN()
          store.mutations.REMOVE_USER()
          window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
        }
      });
    }
  }
}
</script>

<style scoped>

</style>