import {createApp} from 'vue'
import App from './App.vue'
import router from './router'
import './assets/tailwind.css'
import axios from 'axios'
import VueAxios from 'vue-axios'

import GAuth from 'vue3-google-oauth2'
const gAuthOptions = { clientId: '1095032961626-se382fodqvi2op0kbhmkp4i9nlutneoo.apps.googleusercontent.com', scope: 'profile', prompt: 'consent', fetch_basic_profile: true }

const app = createApp(App)
app.use(VueAxios, axios)
app.use(GAuth, gAuthOptions)
app.use(router).mount('#app')
