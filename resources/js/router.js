import { createRouter, createWebHistory } from "vue-router";

const routes = [
    { path: '/', name: 'Home', component: () => import('./components/views/Home.vue') },
    { path: '/quiz', name: 'Quiz', component: () => import('./components/views/Quiz.vue') },
    { path: '/conjugation-essentials', name: 'Conjugation', component: () => import('./components/views/Conjugation.vue') },
    { path: '/user-menu', name: 'UserMenu', component: () => import('./components/views/UserMenu.vue') },
    { path: '/login', name: 'Login', component: () => import('./components/views/Login.vue') },
    { path: '/register', name: 'Register', component: () => import('./components/views/Register.vue') },
    { path: '/side-user-menu', name: 'SideUserMenu', component: () => import('./components/views/SideUserMenu.vue') },
    { path: '/favourites', name: 'Favourites', component: () => import('./components/views/Favourites.vue') },
    { path: '/words', name: 'Words', component: () => import('./components/views/Words.vue') },
    { path: '/words-contains', name: 'WordsContains', component: () => import('./components/views/WordsContains.vue') },
    // { path: '/phrases', name: 'Phrases', component: () => import('./components/views/Phrases.vue') },
    { path: '/forgot-password', name: 'ForgotPassword', component: () => import('./components/views/Forgotpassword.vue') },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router

