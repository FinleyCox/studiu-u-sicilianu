<template>
    <nav class="nav flex-column custom-nav">
        <router-link class="nav-link" to="/quiz">
            <i class="bi bi-question-circle"> 単語クイズ</i>
        </router-link>
        <router-link class="nav-link" to="/conjugation-essentials">
            <i class="bi bi-book"> 動詞の活用</i>
        </router-link>
        <router-link class="nav-link" to="/words">
            <i class="bi bi-pencil"> 単語</i>
        </router-link>
        <!-- <router-link class="nav-link" to="/phrases">
            <i class="bi bi-pencil-square"> フレーズ</i>
        </router-link> -->
        <router-link v-if="isLoggedin" class="nav-link" to="/user-menu">
            <i class="bi bi-person"> ユーザーメニュー</i>
        </router-link>
    </nav>
</template>

<script>
    import '/resources/css/nav.css';
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
