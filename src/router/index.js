import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue'
import Auth from '../components/Auth.vue'
import Create from '../views/Create.vue'
import Profile from '../views/User.vue'
import Community from '../views/Community.vue'
import Search from '../views/Search.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/auth/callback',
        name: 'Auth',
        component: Auth
    },
    {
        path: '/create',
        name: 'Create',
        component: Create,
    },
    {
        path: '/community',
        name: 'Community',
        component: Community,
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
        path: "/search",
        name: 'Suchen',
        component: Search
    },
    {
        path: "/dashboard/home",
        name: 'Dashboard Home',
        component: () => import('../views/dashboard/Home.vue')
    },
    {
        path: "/dashboard/site",
        name: 'Dashboard Seiten',
        component: () => import('../views/dashboard/Site.vue')
    },
    {
        path: "/dashboard/settings",
        name: 'Dashboard Einstellungen',
        component: () => import('../views/dashboard/Settings.vue')
    },
    {
        path: "/:pathMatch(.*)*",
        name: '404',
        component: Profile
    }
]

const router = createRouter({
    history: createWebHistory(),
    hash: false,
    routes
})


export default router
