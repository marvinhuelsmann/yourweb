<template>
  <div v-if="googleUser != null">
    <div class="h-screen flex overflow-hidden bg-white">
      <TransitionRoot as="template" :show="sidebarOpen">
        <Dialog as="div" static class="fixed inset-0 flex z-40 lg:hidden" @close="sidebarOpen = false"
                :open="sidebarOpen">
          <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0"
                           enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                           leave-from="opacity-100" leave-to="opacity-0">
            <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75"/>
          </TransitionChild>
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                           enter-from="-translate-x-full" enter-to="translate-x-0"
                           leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                           leave-to="-translate-x-full">
            <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white focus:outline-none">
              <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0"
                               enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100"
                               leave-to="opacity-0">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                  <button type="button"
                          class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                          @click="sidebarOpen = false">
                    <span class="sr-only">Close sidebar</span>
                    <XIcon class="h-6 w-6 text-white" aria-hidden="true"/>
                  </button>
                </div>
              </TransitionChild>
              <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                <div class="flex-shrink-0 flex items-center px-4">
                  <a href="/">
                    <img class="h-8 w-auto" src="../../../assets/images/yourweb.png" alt="Workflow"/>
                  </a>
                </div>
                <nav aria-label="Sidebar" class="mt-5">
                  <div class="px-2 space-y-1">
                    <a v-for="item in navigation" :key="item.name" :href="item.href"
                       :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
                      <component :is="item.icon"
                                 :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-4 h-6 w-6']"
                                 aria-hidden="true"/>
                      {{ item.name }}
                    </a>
                    <div v-if="user.moderator">
                      <a href="/dashboard/moderator/home"
                         class="text-gray-500 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                        <ExclamationIcon class="text-gray-500 mr-4 h-6 w-6"
                                         aria-hidden="true"/>
                        Moderation
                      </a>
                    </div>
                  </div>
                </nav>
              </div>
              <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                <a href="#" @click="logout" class="flex-shrink-0 group block">
                  <div class="flex items-center">
                    <div>
                      <a target="_blank" :href="'https://yourweb-liart.vercel.app/' + user.id">
                        <img class="inline-block h-10 w-10 rounded-full" :src="googleUserImage" alt=""/>
                      </a>
                    </div>
                    <div class="ml-3">
                      <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">
                        {{ googleUserName }}
                      </p>
                      <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">
                        Ausloggen
                      </p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </TransitionChild>
          <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Force sidebar to shrink to fit close icon -->
          </div>
        </Dialog>
      </TransitionRoot>

      <!-- Static sidebar for desktop -->
      <div class="hidden lg:flex lg:flex-shrink-0">
        <div class="flex flex-col w-64">
          <!-- Sidebar component, swap this element with another sidebar if you like -->
          <div class="flex flex-col h-0 flex-1 border-r border-gray-200 bg-gray-100">
            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
              <div class="flex items-center flex-shrink-0 px-4">
                <a href="/">
                  <img class="h-8 w-auto" src="../../../assets/images/yourweb.png" alt="Workflow"/>
                </a>
              </div>
              <nav class="mt-5 flex-1" aria-label="Sidebar">
                <div class="px-2 space-y-1">
                  <a v-for="item in navigation" :key="item.name" :href="item.href"
                     :class="[item.current ? 'bg-gray-200 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
                    <component :is="item.icon"
                               :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 h-6 w-6']"
                               aria-hidden="true"/>
                    {{ item.name }}
                  </a>
                  <a v-if="user.moderator"
                     href="/dashboard/moderator/home"
                     class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    <ExclamationIcon class="text-gray-500 mr-3 h-6 w-6"/>
                    Moderation
                  </a>
                </div>
              </nav>
            </div>
            <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
              <a href="#" @click="logout" class="flex-shrink-0 w-full group block">
                <div class="flex items-center">
                  <div>
                    <a :href="'https://yourweb-liart.vercel.app/' + user.id">
                      <img class="inline-block h-9 w-9 rounded-full" :src="googleUserImage" alt=""/>
                    </a>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                      {{ googleUserName }}
                    </p>
                    <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">
                      Ausloggen
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
        <div class="lg:hidden">
          <div class="flex items-center justify-between bg-gray-50 border-b border-gray-200 px-4 py-1.5">
            <div>
              <a href="/">
                <img class="h-8 w-auto" src="../../../assets/images/yourweb.png" alt="Workflow"/>
              </a>
            </div>
            <div>
              <button type="button"
                      class="-mr-3 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900"
                      @click="sidebarOpen = true">
                <span class="sr-only">Open sidebar</span>
                <MenuIcon class="h-6 w-6" aria-hidden="true"/>
              </button>
            </div>
          </div>
        </div>
        <div class="flex-1 relative z-0 flex overflow-hidden">
          <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
            <div class="h-full  border-dashed rounded-lg">
              <h1 class="font-bold text-4xl">{{ helloDayTime() }}, {{ googleUserName }}</h1>
              <div v-if="isLoaded">
                  <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                  Momentan gibt es keine offenen Reports!
                  </p>
              </div>
              <div v-else>
                <link rel="stylesheet" href="https://pagecdn.io/lib/font-awesome/5.10.0-11/css/all.min.css"
                      integrity="sha256-p9TTWD+813MlLaxMXMbTA7wN/ArzGyW/L7c5+KkjOkM=" crossorigin="anonymous">
                <div class="w-full h-full fixed block top-20 lg:top-10 lg:left-10 right-10 opacity-75 z-50">
          <span class="text-purple-500 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0" style="top: 30%">
            <i class="fas fa-circle-notch fa-spin fa-5x"></i>
          </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

const navigation = [
  {name: 'Dashboard', href: '#', icon: HomeIcon, current: false},
  {name: 'Deine Seiten', href: '/dashboard/site', icon: MapIcon, current: false},
  {name: 'Statistiken', href: '/dashboard/statistic', icon: CalculatorIcon, current: false},
  {name: 'Einstellungen', href: '/dashboard/settings', icon: SearchCircleIcon, current: false},
]

import {Dialog, DialogOverlay, TransitionChild, TransitionRoot} from '@headlessui/vue'
import {store} from "@/store";
import {
  CalculatorIcon,
  HomeIcon,
  MapIcon,
  MenuIcon,
  SearchCircleIcon,
  XIcon,
  ExclamationIcon,
} from '@heroicons/vue/outline'

export default {
  name: "Reports",
  data() {
    return {
      user: {
        id: null,
        moderator: null,
        name: null,
        subHeadLine: null,
        color: null,
        text: null,
        birthday: null,
        place: null,
        image: null,
        link: null,
        likes: null,
        verify: null
      },
      sidebarOpen: false,
      isLoaded: false
    }
  },
  components: {
    Dialog,
    DialogOverlay,
    TransitionChild,
    TransitionRoot,
    MenuIcon,
    XIcon,
    ExclamationIcon
  },
  setup() {
    return {
      navigation,
    }
  },
  computed: {
    googleUser() {
      return store.state.user
    },
    googleUserImage() {
      return store.state.googleUser.image
    },
    googleUserName() {
      return store.state.googleUser.name
    },
    googleToken() {
      return store.state.token
    }
  },
  mounted() {
    store.mutations.isInSession("dashboard/home")
    this.isLoaded = false

    if (this.googleUser != null) {
      fetch('https://yourweb-liart.vercel.app/api/v1/getSiteViaUserID?i=' + store.state.googleUser.id).then(result => {
        result.json().then(result => {
          this.user = result
        }).catch(error => {
          console.error(error)
        }).finally(() => {
          this.isLoaded = true

          if (this.user.moderator !== '1') {
            window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/dashboard/home?' : 'https://yourweb-liart.vercel.app/dashboard/home'
          }
        })
      })
    }
  },
  methods: {
    helloDayTime() {
      let today = new Date();

      if (today.getDay() <= 5) {
        if (today.getHours() >= 13 && today.getHours() < 18) {
          if (today.getHours() >= 15) {
            return "Nachmittags ist das Leben immer besser"
          } else {
            return "Guten Mittag"
          }
        } else if (today.getHours() >= 4 && today.getHours() <= 12) {
          return "Der Frühe Vogel fängt den Cheater"
        } else if (today.getHours() >= 18 && today.getHours() < 22) {
          return "Guten Abend"
        } else if (today.getHours() >= 22 && today.getHours() > 4) {
          return "Nacht lieber Moderator"
        } else {
          return "Tageslicht fehlt mir immer"
        }
      } else {
        return "Schönes Wochenende"
      }
    },
    logout() {
      store.mutations.REMOVE_USER()
      store.mutations.REMOVE_TOKEN()
      window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/' : 'https://yourweb-liart.vercel.app/'
    }
  }
}
</script>

<style scoped>

</style>
