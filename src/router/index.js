import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Create from '../views/Create.vue'

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
    }
]

const router = createRouter({
    history: createWebHistory(),
    hash: false,
    routes
})


export default router
