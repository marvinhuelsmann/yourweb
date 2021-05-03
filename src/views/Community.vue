<template>
  <div>
    <div class="mt-1 mr-3">
      <router-link to="/">
        <XIcon class="w-10 h-10" aria-hidden="false"/>
      </router-link>
      <router-link :to='"/"  + user.id + "?redirect=community"'>
        <ClipboardCopyIcon class="w-10 h-10" aria-hidden="false"/>
      </router-link>
    </div>
    <div v-if="isLoaded">
      <Profile :text='user.text' :sub-head-line='user.subHeadLine' :birthday='user.birthday' :place='user.place'
               :name='user.name' :img-url='user.image'></Profile>
      <div class="mt-3 mb-4 justify-center flex">
        <button
            class="px-9 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
            v-on:click="reload">
          nächste Seite
        </button>
        <button
            class="px-9 py-4  rounded-sm block sm:w-auto border-red-100 bg-white hover:bg-red-300 text-black"
            v-on:click="reload">
          <HeartIcon class="h-8"/>
        </button>
      </div>
    </div>
    <div v-else>
      <link rel="stylesheet" href="https://pagecdn.io/lib/font-awesome/5.10.0-11/css/all.min.css"
            integrity="sha256-p9TTWD+813MlLaxMXMbTA7wN/ArzGyW/L7c5+KkjOkM=" crossorigin="anonymous">
      <div class="w-full h-full fixed block top-0 right-10 bg-white opacity-75 z-50">
          <span class="text-purple-500 opacity-75 top-1/2 my-0 mx-auto block relative w-0 h-0" style="top: 30%">
            <i class="fas fa-circle-notch fa-spin fa-5x"></i>
          </span>
      </div>
    </div>
    <div v-if="isLoaded" class="inset-x-0 bottom-0 h-16 ...">
      <p class="text-sm text-center justify-center flex text-gray-500">
        Hier siehst du Zufällige Mini Seite die vor kurzem erstellt worden sind!
      </p>
    </div>
  </div>
</template>

<script>
import Profile from "@/components/Profile";
import {HeartIcon, XIcon, ShieldExclamationIcon, ClipboardCopyIcon} from "@heroicons/vue/outline/esm";

export default {
  name: "Community",
  // eslint-disable-next-line vue/no-unused-components
  components: {Profile, ShieldExclamationIcon, HeartIcon, XIcon, ClipboardCopyIcon},
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
      isLoaded: false
    }
  },
  mounted() {
    this.reload()
  },
  methods: {
    reload() {
      this.isLoaded = false
      if (this.user.id === null || this.user.id === "null") {
        fetch('https://yourweb.monster/api/v1/getCommunity').then(result => {
          result.json().then(result => {
            this.user = result
          }).finally(() => {
            this.isLoaded = true
          })
        }).catch(error => {
          console.error(error)
        })
      } else {
        fetch('https://yourweb.monster/api/v1/getCommunity?oldUser=' + this.user.id).then(result => {
          result.json().then(result => {
            this.user = result
          }).finally(() => {
            this.isLoaded = true
          })
        }).catch(error => {
          console.error(error)
        })
      }
    }
  }
}
</script>

<style scoped>

</style>