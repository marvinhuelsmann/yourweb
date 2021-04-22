import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Create from '../views/Create.vue'
import Profile from '../views/User.vue'
import Preview from '../views/Preview.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/about',
        name: 'About',
        component: About,
    },
    {
        path: '/create',
        name: 'Create',
        component: Create,
    },
    {
        path: '/user',
        name: 'User',
        component: Profile
    },
    {
        path: '/u',
        name: 'User',
        component: Profile
    },
    {
        path: '/preview',
        name: 'Preview',
        component: Preview
    }
]

const router = createRouter({
    history: createWebHistory(),
    hash: false,
    routes
})


export default router
