<template>
  <div>
    <router-link to="/">
      <XIcon class="mt-1 mr-3 w-10 h-10" aria-hidden="false"/>
    </router-link>
    <div v-if="isLoaded">
      <Profile :text='user.text' :sub-head-line='user.subHeadLine' :birthday='user.birthday' :place='user.place'
               :name='user.name' :img-url='user.image'></Profile>
      <div class="mt-3 mb-4 justify-center flex">
        <button
            class="px-9 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
            v-on:click="reload">
          nächste Seite
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Profile from "@/components/Profile";
import {XIcon} from "@heroicons/vue/outline/esm";

export default {
  name: "Community",
  components: {Profile, XIcon},
  data() {
    return {
      user: {
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
      fetch('https://yourweb.monster/api/v1/getCommunity').then(result => {
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
</script>

<style scoped>

</style>