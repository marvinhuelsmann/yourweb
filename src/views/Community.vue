<template>
  <div>
    <div v-if="isLoaded">
    <Profile :text='user.text' :sub-head-line='user.subHeadLine' :birthday='user.birthday' :place='user.place'
             :name='user.name' :img-url='user.image'></Profile>
    </div>
  </div>
</template>

<script>
import Profile from "@/components/Profile";
export default {
  name: "Community",
  components: {Profile},
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
</script>

<style scoped>

</style>