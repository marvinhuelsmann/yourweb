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
      <Profile :verify="user.verify === '0' ? 'FALSE' : 'TRUE'" :id="user.id" :text='user.text'
               :sub-head-line='user.subHeadLine' :birthday='user.birthday'
               :place='user.place' :link="user.link"
               :name='user.name' :img-url='user.image' :twitter="user.twitter" :minecraft="user.minecraft"
               :twitch="user.twitch" :discord="user.discord" :youtube="user.youtube" :instagram="user.instagram"
               :snapchat="user.snapchat"></Profile>
      <div class="mt-3 mb-4 justify-center flex">
        <button
            class="px-9 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
            v-on:click="reload">
          nächste Seite
        </button>
        <div v-if="isLoveButtonRed">
          <button
              v-on:click="sendLike"
              class="px-9 py-4 rounded-sm block sm:w-auto border-red-100 bg-red-400 text-black">
            <HeartIcon class="h-8"/>
            {{ getLikes }}
          </button>
        </div>
        <div v-else>
          <button
              class="px-9 py-4  rounded-sm block sm:w-auto border-red-100 bg-white hover:bg-red-300 text-black"
              v-on:click="sendLike">
            <HeartIcon class="h-8"/>
            {{ getLikes }}
          </button>
        </div>
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
    <div v-if="hasLiked">
      <p class="text-sm text-center justify-center flex text-blue-700">
        Du hast dieser Website bereits dein Herz gegeben!
      </p>
    </div>
    <div v-if="error">
      <p class="text-sm text-center justify-center flex text-blue-700">
        Es ist ein Fehler aufgetaucht!
      </p>
    </div>
    <div v-if="isLoaded" class="inset-x-0 bottom-0 h-16 ...">
      <p class="text-sm text-center justify-center flex text-gray-500">
        Diese Website hat {{ user.views }} Community {{ user.views === 1 ? "Aufruf" : "Aufrufe" }}.
      </p>
    </div>
  </div>
</template>

<script>
import Profile from "@/components/Profile";
import {HeartIcon, XIcon, ShieldExclamationIcon, ClipboardCopyIcon} from "@heroicons/vue/outline/esm";
import {store} from "@/store";
import {OAuth2Client} from "google-auth-library";

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
        image: null,
        link: null,
        likes: null,
        hasUserLiked: null,
        views: null,
        verify: null,

        twitter: null,
        minecraft: null,
        youtube: null,
        discord: null,
        twitch: null
      },
      isLoaded: false,
      alreadyLike: false,
      loveButtonRed: false,
      error: false
    }
  },
  computed: {
    getLikes() {
      if (this.user.likes != null) {
        return this.user.likes;
      } else {
        return "0";
      }
    },
    googleUser() {
      return store.state.user
    },
    tokenGoogleID() {
      return store.state.token
    },
    hasLiked() {
      return this.alreadyLike
    },
    isLoveButtonRed() {
      return this.loveButtonRed
    },
    googleUserID() {
      if (this.googleUser != null) {
        return this.googleUser["MT"]
      } else {
        return "123456789"
      }
    }
  },
  mounted() {
    if (this.googleUser === null) {
      if (localStorage.getItem('users')) {
        this.$forceUpdate();
        document.location.reload(true)
      }
    }

    this.reload()
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
        window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/not-login?redirect=community' : 'https://yourweb.monster/not-login?redirect=community'
      });
    },
    reload() {
      this.error = false
      this.alreadyLike = false
      this.loveButtonRed = false
      this.isLoaded = false

      if (this.user.id === null || this.user.id === "null") {
        fetch('https://yourweb.monster/api/v1/getCommunity?fromID=' + this.googleUserID).then(result => {
          result.json().then(result => {
            this.user = result
          }).finally(() => {
            if (this.user.hasUserLiked) {
              this.loveButtonRed = true
            }
            this.isLoaded = true
          })
        }).catch(error => {
          console.error(error)
        })
      } else {
        fetch('https://yourweb.monster/api/v1/getCommunity?oldUser=' + this.user.id + "&fromID=" + this.googleUserID).then(result => {
          result.json().then(result => {
            this.user = result
          }).finally(() => {
            if (this.user.hasUserLiked) {
              this.loveButtonRed = true
            }
            this.isLoaded = true
          })
        }).catch(error => {
          console.error(error)
        })
      }
    },
    sendLike() {
      if (this.loveButtonRed) {
        this.alreadyLike = true
        return
      }
      this.isInSession(this.tokenGoogleID)
      this.user.likes++;
      this.loveButtonRed = true

      if (this.googleUser != null) {
        fetch('https://yourweb.monster/api/v1/sendLike?id=' + this.user.id + '&user=' + this.googleUserID, {
          headers: {
            'Authorization': 'Bearer ' + this.tokenGoogleID
          }
        }).catch(error => {
          console.error(error)
        }).then(response => {
          if (response.status === 400) {
            this.alreadyLike = true
            this.loveButtonRed = false
            this.user.likes--;
          } else if (response.status !== 200) {
            this.error = true
            this.loveButtonRed = false
            this.user.likes--;
          }
        })
      } else {
        window.location = `https://yourweb.monster/not-login?redirect=community`
      }
    }
  }
}
</script>

<style scoped>

</style>