import Vue from 'vue'
import VueRouter from 'vue-router'
//import Category from "../components"

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: () => import('../views/Index'),
        children: [
            {
                path: '',
                name: 'index',
                component: () => import('@/views/IndexGlobal'),
            },
        ],
    },
    {
        path: '/category/:id',
        name: 'Category',
        component: () => import('@/components/Category'),
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes,
})

export default router
