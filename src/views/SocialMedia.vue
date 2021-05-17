<template>
  <div v-if="from !== '' && from != null" class="mt-1 mr-3">
    <router-link :to="'https://yourweb.monster/' + redirect.replace('redirect=', '')">
      <RewindIcon class="w-10 h-10" aria-hidden="false"/>
    </router-link>
  </div>
  <div class="mt-36 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h2 class="text-base text-black pt-1 text-4xl font-bold tracking-wide uppercase"> {{ name }}</h2>
      <p v-if="type === 'link'" class="mt-3 text-center text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
        Du verlässt die Seite YourWeb und wirst zu {{ redirect }} weitergeleitet.
      </p>
      <p v-else-if="type === 'display'" class="mt-3 text-center text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
        Der {{ name }} Name lautet: {{ redirect.replace('@', '#') }}.
      </p>
      <div class="flex justify-center">
        <button
            class="px-9 mt-3 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
            v-on:click="goToSite" v-if="type === 'link'">
          Bestätigen
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import {
  RewindIcon
} from '@heroicons/vue/outline'

export default {
  name: "YouWillLeave",
  data() {
    return {
      redirect: new URLSearchParams(window.location.search).get('redirect'),
      type: new URLSearchParams(window.location.search).get('type'),
      name: new URLSearchParams(window.location.search).get('name'),
      from: new URLSearchParams(window.location.search).get('from'),
    }
  },
  methods: {
    goToSite() {
      window.location.href = this.redirect
    }
  },
  components: {
    RewindIcon
  }
}
</script>

<style scoped>

</style>