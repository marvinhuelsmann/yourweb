<template>
  <div class="mt-36 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h2 class="text-base text-black pt-1 text-4xl font-bold tracking-wide uppercase">Du musst dafür eingeloggt sein!</h2>
      <p class="mt-3 text-center text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
        Für diese Aktion musst du mit deinem Google Account verbunden sein!
      </p>
      <div class="flex justify-center">
      <button
            class="px-9 mt-3 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
            v-on:click="handleClickSignIn">
          Mit Google anmelden
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import {store} from "@/store";

export default {
  name: "YouWillLeave",
  data() {
    return {
      redirect: window.location.search.substr(1)
    }
  },
  mounted() {
    this.handleClickSignIn()
  },
  methods: {
    goHome() {
      window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/' : 'https://yourweb.monster/'
    },
    async handleClickSignIn() {
      try {
        const googleUser = await this.$gAuth.signIn();
        if (!googleUser) {
          return null;
        }
        store.mutations.SET_USER(googleUser.getBasicProfile())
        store.mutations.SET_TOKEN(this.$gAuth.instance.currentUser.get().getAuthResponse().id_token)
        window.location.href = 'http://localhost:8080/' + this.redirect.replace('redirect=', '')
      } catch (error) {
        console.error(error);
        return null;
      }
    },
  }
}
</script>
