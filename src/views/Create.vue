<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
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
                   placeholder="Email Adresse*"/>
          </div>
          <div>
            <label for="password" class="sr-only">Code</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Beta Code*"/>
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
            <input v-on:input="setPreview(true)" id="name" name="name" autocomplete="name" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Name*"/>
          </div>
          <div class="pt-2">
            <label for="birthday" class="sr-only">Geburtstag</label>
            <input v-on:input="setPreview(true)" id="birthday" name="birthday" autocomplete="birthday" required=""
                   type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Geburtstag"/>
          </div>
          <div class="pt-2">
            <label for="place" class="sr-only">Wohnort</label>
            <input v-on:input="setPreview(true)" id="place" name="place" autocomplete="place" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Wohnort"/>
          </div>
          <div class="pt-2">
            <label for="image" class="sr-only">Bild</label>
            <input v-on:input="setPreview(true)" id="image" name="image" autocomplete="image" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Bild URL"/>
          </div>
          <div class="pt-2">
            <label for="subHeader" class="sr-only">Zwischenüberschrift</label>
            <textarea v-on:input="setPreview(true)" id="subHeader" name="subHeader" autocomplete="subHeader" required=""
                      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                      placeholder="Zwischenüberschrift*"/>
          </div>
          <div class="pt-2">
            <label for="biography" class="sr-only">Biografie</label>
            <textarea v-on:input="setPreview(true)" id="biography" name="biography" autocomplete="biography" required=""
                      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                      placeholder="Biographie*"/>
          </div>
          <div class="pt-2">
            <label for="color" class="">Lieblingsfarbe: </label>
            <input  v-on:input="setPreview(true)" id="color" name="color" autocomplete="color" type="color" required="" class="" placeholder="Farbe:"/>
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
            <a href="#preview" @click="setPreview(!this.preview)" class="font-bold text-indigo-600 hover:text-indigo-500">
              Vorschau {{ this.preview ? "ausbleden" : "ansehen" }}
            </a>
          </div>
        </div>
        <div v-if="!codeValid">
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
            Dein Beta Code war ungültig, probiere es später erneut!
          </p>
        </div>
        <div class="justify-center flex" v-if="preview && !codeValid">
          <ArrowDownIcon class="animate-bounce h-10 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
        </div>
      </form>
    </div>
  </div>
  <div id="preview" class="pb-3" v-if="preview">
    <Profile is-preview :name='user.name' :text='user.text' :sub-head-line='user.subHeadLine'
             :place='user.place' :birthday='user.birthday' :img-url='user.image'></Profile>
  </div>
</template>

<script>
import {LockClosedIcon, ArrowDownIcon} from '@heroicons/vue/solid'
import Profile from "@/components/Profile";

export default {
  data() {
    return {
      user: {
        code: null,
        name: null,
        subHeadLine: null,
        color: null,
        text: null,
        birthday: null,
        place: null,
        image: null,
        email: null
      },
      preview: false,
      loading: false,
      codeInvalid: false,
      success: false
    }
  },
  components: {
    Profile,
    LockClosedIcon,
    ArrowDownIcon
  },
  computed: {
    codeValid() {
      return this.codeInvalid
    }
  },
  methods: {
    setPreview(preview) {
      this.preview = preview;
      this.getPreviewData()
    },
    getPreviewData() {
      this.user.code = document.getElementById('password').value;
      this.user.email = document.getElementById('email-address').value;
      this.user.name = document.getElementById('name').value;
      this.user.subHeadLine = document.getElementById('subHeader').value;
      this.user.color = document.getElementById('color').value;
      this.user.text = document.getElementById('biography').value;
      this.user.birthday = document.getElementById('birthday').value;
      this.user.place = document.getElementById('place').value;
      this.user.image = document.getElementById('image').value;
    },
    createWebsite() {
      if (this.user.code == null || this.user.code === '') {
        this.codeInvalid = true;
        return;
      }

      this.loading = true;
      fetch('https://yourweb.monster/api/v1/createSite?code=' + this.user.code + "&name=" + this.user.name + "&subHeadLine=" + this.user.subHeadLine + "&text=" + this.user.text + "&birthday=" + this.user.birthday
          + "&place=" + this.user.place + "&image=" + this.user.image + "&email=" + this.user.email + "&color=" + this.user.color).catch(error => {
        if (error.status === 203) {
          this.codeInvalid = true;
          console.log("code is invalid!");
        } else if (error)
          console.error(error)
      }).finally(() => {
        this.loading = false;
        window.location.href = "https://yourweb.monster/u?i=" + this.user.name;
      })
    }
  }
}
</script>