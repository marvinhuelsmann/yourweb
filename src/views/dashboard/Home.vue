<template>
  <div v-if="user != null">
    {{ user.name }}
    {{ user.email }}
    <button class="bg-blue-200" @click="logout">
      Ausloggen
    </button>
  </div>
</template>

<script>

import {store} from "@/store";

export default {
  name: "Home",
  computed: {
    user() {
      return store.state.user
    },
    token() {
      return store.state.token
    }
  },
  mounted() {
    this.isInSession()
    console.log(this.user)
    console.log(this.token)

    if (this.user === null) {
      window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
    }
  },
  methods: {
    logout() {
      store.mutations.REMOVE_USER()
      window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/' : 'https://yourweb.monster/'
    },
    isInSession() {
      this.axios.get('https://id.onegaming.group/api/v1/user', {
        headers: {
          'Authorization': 'Bearer ' + this.token
        }
      }).then(response => {
        if (response.status === 200) {
          store.mutations.SET_USER(response.data)
          store.mutations.SET_TOKEN(this.token)
        }
      }).catch(error => {
        if (error.response.status === 401) {
          store.mutations.REMOVE_TOKEN()
          store.mutations.REMOVE_USER()
          window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
        }
      })
    }
  }
}
</script>

<style scoped>

</style>