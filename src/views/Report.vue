<template>
  <div class="mt-36 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h2 class="text-base text-black pt-1 text-4xl font-bold tracking-wide uppercase">Die Funktion wurde Temporär deaktiviert</h2>
      <p class="mt-3 text-center text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
        Versuche es an einen anderen oder späteren Moment erneut!
      </p>
      <div class="flex justify-center">
        <button
            v-on:click="goHome"
            class="px-9 mt-3 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700">
          Bestätigen
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import {store} from "../store";

export default {
  name: "Report",
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
        verify: null,

        twitter: null,
        minecraft: null,
        youtube: null,
        discord: null,
        twitch: null,
        instagram: null,
        snapchat: null
      },
      id: window.location.search.substr(1).replace("id=", ""),
      isLoading: false
    }
  },
  mounted() {
    store.mutations.isInSession("report?id=" + this.id)
    fetch('https://yourweb-liart.vercel.app/api/v1/getSiteViaUserID?i=' + this.id).then(result => {
      if (result.ok) {
        result.json().then(result => {
          this.user = result
        })
      } else {
        this.isLoading = true;
      }
    }).catch(error => {
      if (error)
        console.error(error)
    }).finally(() => {
      this.isLoaded = true;
    })
  },
  methods: {
    sendReport(reason) {
      console.log(reason)
    },
    goHome() {
      window.location.href = "https://yourweb-liart.vercel.app/"
    }
  }
}
</script>

<style scoped>

</style>
