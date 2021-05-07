<template>
  <div v-if="user != null">
    {{user.name}}
    {{user.email}}
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
    }
  },
  mounted() {
    console.log(this.user)

    if (this.user === null) {
      window.location = `https://id.onegaming.group/api/v1/oauth2/authorize?scope=openid+profile+email&response_type=token&approval_prompt=auto&redirect_uri=${encodeURIComponent(process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/auth/callback' : 'https://yourweb.monster/auth/callback')}&client_id=6087146f33be422f07a57e4f`
    }
  },
  methods: {
    logout() {
      store.mutations.REMOVE_USER()
      window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/' : 'https://yourweb.monster/'
    }
  }
}
</script>

<style scoped>

</style>