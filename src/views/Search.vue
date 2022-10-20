<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="../assets/images/yourweb.png"
             alt="Workflow"/>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Seite suchen...
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Oder
          {{ ' ' }}
          <a href="/create" class="font-medium text-indigo-600 hover:text-indigo-500">
            erstelle dir deine eigene mini Monster Seite
          </a>
        </p>
      </div>
      <form class="mt-8 space-y-6">
        <input type="hidden" name="remember" value="true"/>
        <div class="rounded-md shadow-sm -space-y-px">
          <h2 class="py-4 mt-6 text-center text-3xl font-medium text-gray-900">
            Nutzernamen oder ID:
          </h2>
          <div>
            <label for="name" class="sr-only">Name</label>
            <input id="name" name="name" type="text" autocomplete="text" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="marvhuel"/>
          </div>
        </div>
        <div class="flex items-center justify-between">
          <div class="flex text-sm items-center justify-between">
            <a href="https://yourweb-liart.vercel.app/" @click="setPreview()"
               class="font-medium text-indigo-600 hover:text-indigo-500">
              Zurück
            </a>
          </div>
        </div>
        <div v-if="loading" class="justify-center flex">
          <ClockIcon class="animate-spin h-8 mr-3 ..." viewBox="0 0 24 24"/>
        </div>
        <div v-if="!loading">
          <button type="submit" @click="openSite"
                  class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <CheckIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
            Suchen
          </button>
          <p v-if="siteValid" class="mt-4 text-center text-sm text-gray-600">
            Dieser Nutzer wurde nicht gefunden!
          </p>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import {CheckIcon, ClockIcon} from '@heroicons/vue/solid'

export default {
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
        image: null
      },
      loading: false,
      siteInvalid: false
    }
  },
  components: {
    CheckIcon,
    ClockIcon
  },
  computed: {
    siteValid() {
      return this.siteInvalid
    }
  },
  methods: {
    openSite() {
      this.user.name = document.getElementById('name').value;
      this.siteInvalid = false
      this.loading = true

      fetch('https://yourweb-liart.vercel.app/api/v1/getSite?i=' + this.user.name).then(result => {
        result.json().then(result => {
          this.user = result
        }).finally(() => {
          this.loading = false;
          if (result.status === 200) {
            window.location.href = "https://yourweb-liart.vercel.app/" + this.user.name  + "?redirect=search";
          } else {
            this.siteInvalid = true
          }
        })
      })

    }
  }
}
</script>
