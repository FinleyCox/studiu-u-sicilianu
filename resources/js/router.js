import { createRouter, createWebHistory } from "vue-router";

const routes = [
    { path: '/', name: 'Home', component: () => import('./components/views/Home.vue') },
    { path: '/quiz', name: 'Quiz', component: () => import('./components/views/Quiz.vue') },
    { path: '/conjugation-essentials', name: 'Conjugation', component: () => import('./components/views/Conjugation.vue') },
    { path: '/user-menu', name: 'UserMenu', component: () => import('./components/views/UserMenu.vue') },
    { path: '/login', name: 'Login', component: () => import('./components/views/Login.vue') },
    { path: '/register', name: 'Register', component: () => import('./components/views/Register.vue') },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router

