<template>
  <div class="mt-36 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <div v-if="!sessionExpired">
      <h2 class="text-base text-black pt-1 text-4xl font-bold tracking-wide uppercase">Du musst dafür eingeloggt sein!</h2>
        <p class="mt-3 text-center text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
          Für diese Aktion musst du mit deinem Google Account verbunden sein!
        </p>
      </div>
      <div v-else>
        <h2 class="text-base text-black pt-1 text-4xl font-bold tracking-wide uppercase">Deine Sitzung ist abgelaufen</h2>
        <p class="mt-3 text-center text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
          Du musst dich erneut anmelden, damit du fortfahren kannst!
        </p>
      </div>
      <div class="flex justify-center">
      <button
            class="mt-2 sign-in-google"
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
      redirect: window.location.search.substr(1),
      sessionExpired: false
    }
  },
  mounted() {
      if (localStorage.getItem('token')) {
        store.mutations.isInSession()
      }
    },
  methods: {
    async handleClickSignIn() {
      try {
        const googleUser = await this.$gAuth.signIn();
        if (!googleUser) {
          return null;
        }
        store.mutations.SET_USER(googleUser.getBasicProfile())
        store.mutations.SET_TOKEN(this.$gAuth.instance.currentUser.get().getAuthResponse().id_token)
        window.location.href = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/'  + this.redirect.replace('redirect=', '') : 'https://yourweb.monster/' + this.redirect.replace('redirect=', '')
      } catch (error) {
        console.error(error);
        return null;
      }
    },
  }
}
</script>

<style>
.sign-in-google {
  align-items: center;
  padding: 8px 16px;

  width: 343px;
  height: 50px;
  left: 16px;
  top: 82px;

  color: white;

  background: #2064d7;
  border-radius: 7px;
}
</style>
