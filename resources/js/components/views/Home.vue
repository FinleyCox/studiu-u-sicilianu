<template>
    <nav class="nav flex-column custom-nav">
        <router-link class="nav-link" to="/quiz">
            <i class="bi bi-question-circle"> Word Quiz</i>
        </router-link>
        <router-link class="nav-link" to="/conjugation-essentials">
            <i class="bi bi-book"> Conjugation</i>
        </router-link>
        <router-link class="nav-link" to="/phrases">
            <i class="bi bi-pencil-square"> Phrases</i>
        </router-link>
        <router-link v-if="isLoggedin" class="nav-link" to="/user-menu">
            <i class="bi bi-person"> UserMenu</i>
        </router-link>
    </nav>
</template>

<script>
    export default {
        name: "Home",
        mounted() {
            // トークンがあればユーザーメニューをtrueにして表示させる
            const token = localStorage.getItem('token');
            if(token) {
                this.isLoggedin = true;
            }
        },
        data() {
            return {
                isLoggedin: false, // ユーザーメニュー表示に使用
            }
        },
    }
</script>

<style>
    .custom-nav {
        margin-top: 50px;
        padding: 15px;
        border-radius: 10px;
    }
    .nav-link {
        color: #333;
        font-weight: 600;
        font-size: 20px;
        padding: 20px 20px;
        border-radius: 8px;
        transition: background 0.3s ease, transform 0.2s ease;
        background: linear-gradient(135deg, #eeecf1, #e7eaf0);
        box-shadow: 0px 20px 20px rgba(17, 17, 17, 0.1);
        display: flex;
        text-decoration: none;
        letter-spacing: 0.5px;
        border: 2px solid rgb(0, 0, 0);
        margin-bottom: 30px;
    }
    .nav-link:hover {
        transform: translateX(5px);
    }
    i {
        font-size: 24px;
    }
    .sidenav {
        height: 100%;
        width: 15%;
        background-color: rgb(182, 216, 218);
        overflow-x: hidden;
        padding-top: 20px;
        position: fixed;
        top: 0;
        left: 0;
    }
</style>
