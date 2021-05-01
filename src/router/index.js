import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue'
import Auth from '../components/Auth.vue'
import Create from '../views/Create.vue'
import Profile from '../views/User.vue'
import Community from '../views/Community.vue'
import Blog from '../views/Blog.vue'

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
        path: '/blog',
        name: 'Block',
        component: Blog
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
