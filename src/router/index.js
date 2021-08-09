import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue'
import Create from '../views/Create.vue'
import NotRegister from '../views/NotRegister.vue'
import Profile from '../views/User.vue'
import Community from '../views/Community.vue'
import Search from '../views/Search.vue'
import YouWillLeave from '../views/YouWillLeave.vue'
import Social from '../views/SocialMedia'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/create',
        name: 'Create',
        component: Create,
    },
    {
        path: '/not-login',
        name: 'Not LoggedIn',
        component: NotRegister,
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
        path: "/leave",
        name: 'YourWeb verlassen',
        component: YouWillLeave
    },
    {
        path: "/social",
        name: 'Zum SocialMedia',
        component: Social
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
        path: "/dashboard/statistic",
        name: 'Dashboard Statistiken',
        component: () => import('../views/dashboard/Statistic.vue')
    },
    {
        path: "/dashboard/moderator/home",
        name: 'Dashboard Moderation',
        component: () => import('../views/dashboard/moderator/Reports.vue')
    },
    {
        path: "/jobs",
        name: 'Jobs',
        component: () => import('../views/Jobs.vue')
    },
    {
        path: "/report",
        name: 'Report',
        component: () => import('../views/Report.vue')
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
