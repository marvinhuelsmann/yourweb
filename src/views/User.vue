<template>
  <div v-if="isLoaded">
    <Profile :text='user.text' :sub-head-line='user.subHeadLine' :birthday='user.birthday' :place='user.place'
             :social='socialMedias' :name='user.name' :img-url='user.image'></Profile>
  </div>
  <div v-else-if="isNotCorrectLoading">
  <h1>Error 404 user not found!</h1>
  </div>
  <div v-else>
    <div class="animate-pulse flex space-x-4">
      <div class="rounded-full bg-light-blue-400 h-12 w-12"></div>
      <div class="flex-1 space-y-4 py-1">
        <div class="h-4 bg-light-blue-400 rounded w-3/4"></div>
        <div class="space-y-2">
          <div class="h-4 bg-light-blue-400 rounded"></div>
          <div class="h-4 bg-light-blue-400 rounded w-5/6"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Profile from '../components/Profile.vue'
import {AnnotationIcon, GlobeAltIcon, LightningBoltIcon, ScaleIcon} from "@heroicons/vue/outline/esm";

const socialMedias = [
  {
    name: 'Competitive exchange rates',
    description:
        'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.',
    icon: GlobeAltIcon,
  },
  {
    name: 'No hidden fees',
    description:
        'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.',
    icon: ScaleIcon,
  },
  {
    name: 'Transfers are instant',
    description:
        'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.',
    icon: LightningBoltIcon,
  },
  {
    name: 'Mobile notifications',
    description:
        'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.',
    icon: AnnotationIcon,
  },
]

export default {
  name: "User",
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
      isLoaded: false,
      isNotCorrectLoading: false
    }
  },
  setup() {
    return {
      socialMedias,
    }
  },
  mounted() {
    this.isLoaded = false;
    this.isNotCorrectLoading = false;
    fetch('https://yourweb.monster/api/v1/getSite' + window.location.search).then(result => {
      if (result.ok) {
        result.json().then(result => {
          this.user = result
        })
      } else {
        this.isNotCorrectLoading = true;
      }
    }).catch(error => {
      if (error)
        console.error(error)
    }).finally(() => {
      this.isLoaded = true;
    })

  },
  components: {
    Profile
  }
}
</script>

<style scoped>

</style>