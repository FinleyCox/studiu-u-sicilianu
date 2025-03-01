import { createRouter, createWebHistory } from "vue-router";

const routes = [
    // { path: '/', name: 'App', component: () => import('./components/App.vue') },
    { path: '/', name: 'Home', component: () => import('./components/views/Home.vue') },
    { path: '/quiz', name: 'Quiz', component: () => import('./components/views/Quiz.vue') },
    { path: '/conjugation-essentials', name: 'Conjugation', component: () => import('./components/views/Conjugation.vue') },
    { path: '/login', name: 'Login', component: () => import('./components/views/Login.vue') },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router

