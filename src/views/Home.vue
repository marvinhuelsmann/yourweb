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
              Entwicklungsstart am 1.5.2021
            </span>
            <span class="hidden md:inline">
              Große Neuigkeiten! Wir sind am entwickeln!
            </span>
          </p>
        </div>
        <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
          <a href="#"
             class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
            Erfahre mehr
          </a>
        </div>
        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
          <button type="button" formtarget="_top"
                  onclick="window.location.href='https://twitter.com/intent/tweet?text=yourweb.monster is now starting to developed! #YourWebsite'"
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
      <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
             fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
          <polygon points="50,0 100,0 50,100 0,100"/>
        </svg>

        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
          <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start" aria-label="Global">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
              <div class="flex items-center justify-between w-full md:w-auto">
                <a href="#">
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
            <div class="hidden md:block md:ml-10 md:pr-4 md:space-x-8">
              <router-link v-for="item in navigation" :key="item.name" :to="item.href"
                           class="font-medium text-gray-500 hover:text-gray-900">{{ item.name }}
              </router-link>
              <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Log in</a>
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
                  <img class="h-8 w-auto" src="../assets/images/yourweb.png" alt=""/>
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
              <a href="#"
                 class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100">
                Log In
              </a>
            </div>
          </PopoverPanel>
        </transition>

        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
          <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
              <span class="block xl:inline">Monster Website</span>
              {{ ' ' }}
              <span class="block text-green-600 xl:inline">für jeden Menschen kinderleicht</span>
            </h1>
            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
              Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet
              fugiat veniam occaecat fugiat aliqua.
            </p>


            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
              <div class="rounded-md shadow">
                <a href="/create"
                   class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10">
                  mini Seite erstellen
                </a>
              </div>
              <div class="mt-3 sm:mt-0 sm:ml-3">
                <a href="#"
                   class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 md:py-4 md:text-lg md:px-10">
                  Max Seite erstellen
                </a>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
      <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full"
           src="../assets/images/MBPStart.png"
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
          © {{ new Date().getFullYear() }} - Marvin Hülsmann /
          Um weiteres von mir zu erfahren besuche meine <a class="bg-green-100 shadow-xl transition-colors ease-in-out"
                                                           href="https://marvhuelsmann.de">Portofolio Seite</a>.
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

const navigation = [
  {name: 'Blog', href: '/blog'},
  {name: 'Community', href: '/community'}
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
  }
}
</script>