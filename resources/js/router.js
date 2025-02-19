import { createRouter, createWebHistory } from "vue-router";
// import Quiz from './componens/Quiz.vue';

const routes = [
    {
        path: '/',
        name: 'App',
        component: () => import('./components//App.vue')
    }
]

// const routes = [
//     { path: '/', component: Quiz }
// ]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router

