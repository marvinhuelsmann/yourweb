<template>
  <Profile :text='user.text' :sub-head-line='user.subHeadLine' :birthday='user.birthday' :place='user.place'
           :social='socialMedias' :name='user.name' :img-url='user.image'></Profile>
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
      }
    }
  },
  setup() {
    return {
      socialMedias,
    }
  },
  mounted() {

    fetch('https://yourweb.monster/api/v1/getSite' + window.location.search).then(result => {
      result.json().then(result => {
          this.user = result
      })
    }).catch(error => {
      console.error(error)
    })

  },
  components: {
    Profile
  }
}
</script>

<style scoped>

</style>