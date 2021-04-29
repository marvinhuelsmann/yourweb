<template>
  <div class="auth"></div>
</template>

<script>
import {store} from "@/store";

export default {
  name: "Auth",
  mounted() {
    const token = window.location.href.split('#')[1].split('=')[1].split('&')[0];
    this.axios.get('https://id.onegaming.group/api/v1/user', {
      headers: {
        'Authorization': 'Bearer ' + token
      }
    }).then(response => {
      store.mutations.SET_USER(response.data)
      this.$router.push('/')
    })
  }
}
</script>

<style scoped>

</style>w