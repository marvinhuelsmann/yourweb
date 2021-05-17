<template>
  <div v-if="userOneGaming != null">
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
                    <img class="h-8 w-auto" src="../../assets/images/yourweb.png" alt="Workflow"/>
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
                  </div>
                </nav>
              </div>
              <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                <a href="#" @click="logout" class="flex-shrink-0 group block">
                  <div class="flex items-center">
                    <div>
                      <a target="_blank" :href="'https://yourweb.monster/' + user.id">
                        <img class="inline-block h-10 w-10 rounded-full" :src="userOneGaming.avatar" alt=""/>
                      </a>
                    </div>
                    <div class="ml-3">
                      <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">
                        {{ userOneGaming.name }}
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
                  <img class="h-8 w-auto" src="../../assets/images/yourweb.png" alt="Workflow"/>
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
                </div>
              </nav>
            </div>
            <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
              <a href="#" @click="logout" class="flex-shrink-0 w-full group block">
                <div class="flex items-center">
                  <div>
                    <a :href="'https://yourweb.monster/' + user.id">
                      <img class="inline-block h-9 w-9 rounded-full" :src="userOneGaming.avatar" alt=""/>
                    </a>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                      {{ userOneGaming.name }}
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
                <img class="h-8 w-auto" src="../../assets/images/yourweb.png" alt="Workflow"/>
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
          <main v-if="userLoaded"
                class="invisible md:visible xl:visible flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last">
            <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
              <div class="h-full border-2 border-gray-200 rounded-lg">
                <Profile :verify="user.verify === '0' ? 'FALSE' : 'TRUE'" :name="user.name" :id="user.id"
                         :birthday="user.birthday" :img-url="user.image" :link="user.link"
                         :sub-head-line="user.subHeadLine" :text="user.text" :place="user.place"
                         :twitter="user.twitter" :minecraft="user.minecraft" :twitch="user.twitch"
                         :discord="user.discord" :youtube="user.youtube"/>
              </div>
            </div>
          </main>
          <aside class="relative xl:order-first xl:flex xl:flex-col flex-shrink-0 w-96">
            <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
              <div class="h-full rounded-lg">
                <h1 class="font-bold text-4xl">Deine Seite</h1>
                <div v-if="userLoaded">
                  <form v-if="user.name != null" class="space-y-6">
                    <input type="hidden" name="remember" value="true"/>
                    <div class="rounded-md shadow-sm -space-y-px">
                      <div class="py-1">
                        <h2 class=" mt-3 text-center text-3xl font-medium text-gray-900">
                          mini Seite
                        </h2>
                        <p class=" text-center text-sm text-gray-600">
                          Diese Daten werden öffentlich auf deinem Profil stehen
                        </p>
                      </div>
                      <div v-if="!isSocialMediaView">
                      <div class="">
                        <label for="name" class="sr-only">Name</label>
                        <input @input="setNoSaveChanges(true)" v-model="user.name" id="name" name="name"
                               autocomplete="name" required="" type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Name*"/>
                      </div>
                      <div class="pt-2">
                        <label for="birthday" class="sr-only">Geburtstag</label>
                        <input @input="setNoSaveChanges(true)" v-model="user.birthday" id="birthday" name="birthday"
                               autocomplete="birthday" required=""
                               type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Geburtstag"/>
                      </div>
                      <div class="pt-2">
                        <label for="place" class="sr-only">Wohnort</label>
                        <input @input="setNoSaveChanges(true)" v-model="user.place" id="place" name="place"
                               autocomplete="place" required="" type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Wohnort"/>
                      </div>
                      <div class="pt-2">
                        <label for="image" class="sr-only">Bild</label>
                        <input @input="setNoSaveChanges(true)" v-model="user.image" id="image" name="image"
                               autocomplete="image" required="" type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Bild URL"/>
                      </div>
                      <div class="pt-2">
                        <label for="link" class="sr-only">Link</label>
                        <input @input="setPreview(true)" v-model="user.link" id="link" name="link" autocomplete="link"
                               required="" type="text"
                               class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="Website zum verlinken"/>
                      </div>
                      <div class="pt-2">
                        <label for="subHeader" class="sr-only">Zwischenüberschrift</label>
                        <textarea @input="setNoSaveChanges(true)" v-model="user.subHeadLine" id="subHeader"
                                  name="subHeader" autocomplete="subHeader"
                                  required=""
                                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                  placeholder="Zwischenüberschrift*"/>
                      </div>
                      <div class="pt-2">
                        <label for="biography" class="sr-only">Biografie</label>
                        <textarea @input="setNoSaveChanges(true)" v-model="user.text" id="biography" name="biography"
                                  autocomplete="biography" required=""
                                  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                  placeholder="Biographie*"/>
                      </div>
                      </div>
                      <div v-if="isSocialMediaView">
                        <div class="pt-4 pb-1">
                          <p class=" text-sm text-gray-600">
                            Twitter Name
                          </p>
                          <label for="link" class="sr-only">Twitter</label>
                          <input @input="setPreview(true)" v-model="user.twitter" id="Twitter" name="twitter"
                                 autocomplete="twitter" required="" type="text"
                                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                 placeholder="Twitter Name"/>
                        </div>
                        <div class="pt-2 pb-1">
                          <p class=" text-sm text-gray-600">
                            Minecraft Name
                          </p>
                          <label for="link" class="sr-only">Minecraft</label>
                          <input @input="setPreview(true)" v-model="user.minecraft" id="Minecraft" name="minecraft"
                                 autocomplete="minecraft" required="" type="text"
                                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                 placeholder="Minecraft Name"/>
                        </div>
                        <div class="pt-2 pb-1">
                          <p class=" text-sm text-gray-600">
                            Youtube Name
                          </p>
                          <label for="link" class="sr-only">Youtube</label>
                          <input @input="setPreview(true)" v-model="user.youtube" id="Youtube" name="youtube"
                                 autocomplete="youtube" required="" type="text"
                                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                 placeholder="Youtube Name"/>
                        </div>
                        <div class="pt-2 pb-1">
                          <p class=" text-sm text-gray-600">
                            Twitch Name
                          </p>
                          <label for="link" class="sr-only">Twitch</label>
                          <input @input="setPreview(true)" v-model="user.twitch" id="Twitch" name="twitch"
                                 autocomplete="twitch" required="" type="text"
                                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                 placeholder="Twitch Name"/>
                        </div>
                        <div class="pt-2 pb-1">
                          <p class=" text-sm text-gray-600">
                            Discord Name
                          </p>
                          <label for="link" class="sr-only">Discord</label>
                          <input @input="setPreview(true)" v-model="user.discord" id="Discord" name="discord"
                                 autocomplete="discord" required="" type="text"
                                 class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                 placeholder="Discord Name"/>
                        </div>
                        <div class="mt-1 flex items-center justify-between">
                          <div class="flex text-sm items-center justify-between">
                            <a href="#" @click="nextView()"
                               class="font-medium text-indigo-600 hover:text-indigo-500">
                              Zurück
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button v-if="!loading && isSocialMediaView" type="submit" @click="saveChanges()"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
                      Speichern
                    </button>
                    <button v-if="!isSocialMediaView" type="submit" @click="nextView()"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
                      Nächste Seite
                    </button>
                    <div v-if="loading" class="justify-center flex">
                      <ClockIcon class="animate-spin h-8 mr-3 ..." viewBox="0 0 24 24"/>
                    </div>
                    <div v-if="finish && !unSaveChanges" class="justify-center flex">
                      <CheckIcon class="text-green-900 h-8 mr-3 ..." viewBox="0 0 24 24"/>
                      <a target="_blank" :href="'https://yourweb.monster/' + user.id"
                         class="text-center underline pt-1.5 text-sm text-gray-600">
                        Zu deinen Profil
                      </a>
                    </div>
                  </form>
                  <div v-else>
                    <h1><a class="text-blue-500" href="https://yourweb.monster/create">Du besitzt keine YourWeb Seite du
                      kannst dir hier eine erstellen</a></h1>
                  </div>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Profile from "@/components/Profile";

const navigation = [
  {name: 'Dashboard', href: '/dashboard/home', icon: HomeIcon, current: false},
  {name: 'Deine Seiten', href: '#', icon: MapIcon, current: true},
  {name: 'Statistiken', href: '/dashboard/statistic', icon: CalculatorIcon, current: false},
  {name: 'Einstellungen', href: '/dashboard/settings', icon: SearchCircleIcon, current: false},
]

import {Dialog, DialogOverlay, TransitionChild, TransitionRoot} from '@headlessui/vue'
import {store} from "@/store";
import {
  HomeIcon,
  MapIcon,
  MenuIcon,
  SearchCircleIcon,
  XIcon,
  LockClosedIcon,
  ArrowDownIcon,
  ClockIcon, CalculatorIcon, CheckIcon
} from '@heroicons/vue/outline'

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
        link: null,
        likes: null,
        verify: null,

        twitter: null,
        minecraft: null,
        youtube: null,
        discord: null,
        twitch: null
      },
      isSocialMediaView: false,
      userLoaded: false,
      sidebarOpen: false,
      unSaveChanges: false,
      loading: false,
      finish: false
    }
  },
  components: {
    Profile,
    Dialog,
    DialogOverlay,
    TransitionChild,
    TransitionRoot,
    MenuIcon,
    XIcon,
    LockClosedIcon,
    ArrowDownIcon,
    ClockIcon,
    CheckIcon
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
    this.finish = false
    this.userLoaded = false;

    if (this.userOneGaming != null) {
      fetch('https://yourweb.monster/api/v1/getSiteOneGaming?i=' + this.userOneGaming.id).then(result => {
        result.json().then(result => {
          this.user = result
          this.userLoaded = true
        }).catch(error => {
          this.userLoaded = true
          console.error(error)
        })
      })
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
    },
    setNoSaveChanges(save) {
      this.unSaveChanges = save
    },
    nextView() {
      this.isSocialMediaView = !this.isSocialMediaView;
    },
    saveChanges() {
      this.isInSession()

      this.finish = false
      this.unSaveChanges = false
      this.loading = true
      fetch('https://yourweb.monster/api/v1/saveChanges?name=' + this.user.name + "&userID=" + this.userOneGaming.id + "&subHeadLine=" + this.user.subHeadLine + "&text=" + this.user.text + "&birthday=" + this.user.birthday
          + "&place=" + this.user.place + "&image=" + this.user.image + "&link=" + this.user.link, {
        headers: {
          'Authorization': 'Bearer ' + this.tokenOneGaming
        }
      }).catch(error => {
        console.error(error)
      }).finally(() => {
        this.loading = false;
        this.finish = true;
      })
    }
  }
}
</script>

<style scoped>

</style>