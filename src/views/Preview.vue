<template>
  <Profile :name='user.name' :text='user.text' :social="socialMedias" :sub-head-line='user.subHeadLine' :place='user.place' :birthday='user.birthday' :img-url='user.image'></Profile>
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
  name: "Preview",
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
  setup() {
    return {
      socialMedias,
    }
  },
  components: {
    Profile
  },
  methods: {
    getSiteData() {
      this.user.name = new URLSearchParams(location.search).get('name')
      this.user.subHeadLine = new URLSearchParams(location.search).get('subHeadLine')
      this.user.color = new URLSearchParams(location.search).get('color')
      this.user.text = new URLSearchParams(location.search).get('text')
      this.user.birthday = new URLSearchParams(location.search).get('birthday')
      this.user.place = new URLSearchParams(location.search).get('place')
      this.user.image = new URLSearchParams(location.search).get('image')
    }
  },
  mounted() {
    this.getSiteData()
  }
}
</script>
