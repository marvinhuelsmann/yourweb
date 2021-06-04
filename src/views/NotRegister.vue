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
import {OAuth2Client} from "google-auth-library";

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
        this.isInSession()
      }
    },
  methods: {
    isInSession(token) {
      const client = new OAuth2Client("1095032961626-se382fodqvi2op0kbhmkp4i9nlutneoo.apps.googleusercontent.com");

      async function verify() {
        const ticket = await client.verifyIdToken({
          idToken: token,
          audience: "1095032961626-se382fodqvi2op0kbhmkp4i9nlutneoo.apps.googleusercontent.com",  // Specify the CLIENT_ID of the app that accesses the backend
          // Or, if multiple clients access the backend:
          //[CLIENT_ID_1, CLIENT_ID_2, CLIENT_ID_3]
        });
        const payload = ticket.getPayload();
        // eslint-disable-next-line no-unused-vars
        const userid = payload['sub'];
        // If request specified a G Suite domain:
        // const domain = payload['hd'];
      }

      verify().catch(() => {
        this.sessionExpired = true
      });
    },
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
