<template>
  <div v-if="userOneGamingID != null"
       class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="../assets/images/yourweb.png"
             alt="Workflow"/>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          mini Monster Seite erstellen
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Oder
          {{ ' ' }}
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            erstelle dir deine Max Monster Seite
          </a>
        </p>
      </div>
      <form class="mt-8 space-y-6">
        <input type="hidden" name="remember" value="true"/>
        <div class="rounded-md shadow-sm -space-y-px">
          <h2 class="py-4 mt-6 text-center text-3xl font-medium text-gray-900">
            Vorbereitung:
          </h2>
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" autocomplete="email" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Email*" :value="this.userOneGamingID.email"/>
          </div>
          <div class="py-1">
            <h2 class=" mt-6 text-center text-3xl font-medium text-gray-900">
              mini Seite:
            </h2>
            <p class=" text-center text-sm text-gray-600">
              Diese Daten werden öffentlich auf deinem Profil stehen
            </p>
          </div>
          <div class="">
            <label for="name" class="sr-only">Name</label>
            <input @input="setPreview(true)" v-model="user.name" id="name" name="name" autocomplete="name" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Name*" />
          </div>
          <div class="pt-2">
            <label for="birthday" class="sr-only">Geburtstag</label>
            <input @input="setPreview(true)" v-model="user.birthday" id="birthday" name="birthday" autocomplete="birthday" required=""
                   type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Geburtstag"/>
          </div>
          <div class="pt-2">
            <label for="place" class="sr-only">Wohnort</label>
            <input @input="setPreview(true)" v-model="user.place" id="place" name="place" autocomplete="place" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Wohnort" />
          </div>
          <div class="pt-2">
            <label for="image" class="sr-only">Bild</label>
            <input @input="setPreview(true)" v-model="user.image" id="image" name="image" autocomplete="image" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Bild URL" />
          </div>
          <div class="pt-2">
            <label for="link" class="sr-only">Link</label>
            <input @input="setPreview(true)" v-model="user.link" id="link" name="link" autocomplete="link" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Website zum verlinken" />
          </div>
          <div class="pt-2">
            <label for="subHeader" class="sr-only">Zwischenüberschrift</label>
            <textarea @input="setPreview(true)" v-model="user.subHeadLine" id="subHeader" name="subHeader" autocomplete="subHeader" required=""
                      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                      placeholder="Zwischenüberschrift*"/>
          </div>
          <div class="pt-2">
            <label for="biography" class="sr-only">Biografie</label>
            <textarea @input="setPreview(true)" v-model="user.text" id="biography" name="biography" autocomplete="biography" required=""
                      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                      placeholder="Biographie*"/>
          </div>
          <div class="pt-2">
            <label for="color" class="">Lieblingsfarbe: </label>
            <input id="color" name="color" autocomplete="color" type="color" required=""
                   class="" placeholder="Farbe:"/>
          </div>
        </div>
        <div class="flex items-center justify-between">
          <div class="flex text-sm items-center justify-between">
            <a href="https://yourweb.monster" @click="setPreview()"
               class="font-medium text-indigo-600 hover:text-indigo-500">
              Zurück
            </a>
          </div>
          <div class="text-sm">
            <a href="#preview" @click="setPreview(!this.preview)"
               class="font-bold text-indigo-600 hover:text-indigo-500">
              Vorschau {{ this.preview ? "ausbleden" : "ansehen" }}
            </a>
          </div>
        </div>
        <div v-if="loading" class="justify-center flex">
          <ClockIcon class="animate-spin h-8 mr-3 ..." viewBox="0 0 24 24"/>
        </div>
        <div v-else-if="!alreadyExistValid">
          <button type="submit" @click="createWebsite()"
                  class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
            Erstellen
          </button>
        </div>
        <div v-else>
          <p class=" text-center text-sm text-gray-600">
            Du besitzt bereits eine mini Monster Seite!
          </p>
        </div>
        <div class="justify-center flex" v-if="preview && !alreadyExistValid && !loading">
          <ArrowDownIcon class="animate-bounce h-10 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
        </div>
      </form>
    </div>
  </div>
  <div id="preview" class="pb-3" v-if="preview">
    <Profile is-preview :name='user.name' :text='user.text' :sub-head-line='user.subHeadLine'
             :place='user.place' :birthday='user.birthday' :link="user.link" :img-url='user.image' show-advertise></Profile>
  </div>
</template>

<script>
import {LockClosedIcon, ArrowDownIcon, ClockIcon} from '@heroicons/vue/solid'
import Profile from "@/components/Profile";
import {store} from "@/store";

export default {
  data() {
    return {
      userIdentify: {
        id: null
      },
      user: {
        name: store.state.user ? store.state.user.name : null,
        subHeadLine: null,
        color: null,
        text: null,
        birthday: store.state.user ? store.state.user.birthday : null,
        place: store.state.user ? store.state.user.location : null,
        image: store.state.user ? store.state.user.avatar : null,
        email: store.state.user ? store.state.user.email : null,
        link: null
      },
      preview: false,
      loading: false,
      alreadyExist: false,
      success: false
    }
  },
  components: {
    Profile,
    LockClosedIcon,
    ArrowDownIcon,
    ClockIcon
  },
  computed: {
    alreadyExistValid() {
      return this.alreadyExist
    },
    userOneGamingID() {
      return store.state.user
    },
    tokenOneGamingID() {
      return store.state.token
    }
  },
  mounted() {
    if (this.userOneGamingID === null) {
      window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
    }
  },
  methods: {
    isInSession() {
      this.axios.get('https://id.onegaming.group/api/v1/user', {
        headers: {
          'Authorization': 'Bearer ' + this.tokenOneGamingID
        }
      }).then(response => {
        if (response.status === 200) {
          store.mutations.SET_USER(response.data)
        }
      }).catch(error => {
        if (error.response.status === 401) {
          store.mutations.REMOVE_TOKEN()
          store.mutations.REMOVE_USER()
          window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
        }
      })
    },
    setPreview(preview) {
      this.preview = preview;
    },
    createWebsite() {
      this.isInSession()

      this.loading = true;
      fetch('https://yourweb.monster/api/v1/createSite?name=' + this.user.name + "&userID=" + this.userOneGamingID.id + "&subHeadLine=" + this.user.subHeadLine + "&text=" + this.user.text + "&birthday=" + this.user.birthday
          + "&place=" + this.user.place + "&image=" + this.user.image + "&email=" + this.user.email + "&color=" + this.user.color + "&link=" + this.user.link, {
        headers: {
          'Authorization': 'Bearer ' + this.tokenOneGamingID
        }
      }).then(response => {
        if (response.status !== 404) {
          response.json().then(result => {
            this.userIdentify = result
          }).catch(error => {
            console.error(error)
          }).finally(() => {
            this.loading = false;

            if (typeof this.userIdentify.id === 'undefined') {
              this.alreadyExist = true;
            } else {
           //  window.location.href = "https://yourweb.monster/" + this.userIdentify.id;
            }

          })
        }
      }).catch(error => {
        console.error(error)
      })
    }
  }
}
</script>