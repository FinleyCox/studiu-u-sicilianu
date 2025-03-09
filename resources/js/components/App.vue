<template>
    <!--
        TODO:
        ・復習ワード機能(間違えたワード)
        ・フレーズ
        ・単語ページ、カテゴリ
        ・単語ページ作成。クリック内容によって取得データを異なるものを取得して描画
        ・お気に入り機能
    -->
    <div class="header">
        <p>studiu u sicilianu</p>
    </div>
    <div class="sidenav">
        <div v-if="$route.path !== '/login' && $route.path !== '/register'" class="side-menu">
            <p v-if="isLoggedin === true" class="w-100 mb-3">
                <i class="bi bi-person-circle"></i> {{ username }}さん
            </p>
                <SideUserMenu></SideUserMenu>
        </div>
    </div>
    <div class="container">
        <router-view></router-view>
    </div>
    <div v-if="$route.path !== '/' && $route.path !== '/login'" class="back">
        <router-link class="back-text" to="/"><i class="bi bi-arrow-left-circle">BACK</i></router-link>
    </div>
    <div class="footer">
        <div class="text-left p-4">
            <a class="text-reset fw-bold footer-a" href="https://github.com/FinleyCox" target="_blank">Created by Ai Nakajima</a> 👈Click to GitHub<br>
            <a class="text-reset fw-bold footer-a" href="https://qiita.com/_anonymous_dog_" target="_blank">@_anonymous_dog_</a> 👈Cliick to my Qiita account<br>
            <p><a class="text-reset fw-bold footer-a" href="javascript:void(0)">inter0370@gmail.com</a> 👈For Contanct</p>
        </div>
    </div>
</template>

<script>
    import SideUserMenu from './views/SideUserMenu.vue';
    export default {
        name: "App",
        components: {
            SideUserMenu
        },
        mounted() {
            // トークンがあればユーザーメニューをtrueにして表示させる
            const token = localStorage.getItem('token');
            this.username = localStorage.getItem('username');
            if(token) {
                this.isLoggedin = true;
            }
        },
        data() {
            return {
                isLoggedin: false, // ユーザーメニュー表示に使用
                username: '',
            }
        },
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Merriweather&display=swap');

    body {
        font-family: 'Merriweather', sans-serif;
    }
    .header {
        text-align: center;
        display: block; /* 固定 */
        font-size: 40px;
    }
    .container {
        height: 100%;
        width: 70%;
        text-align: center;
        background-color: linear-gradient(135deg, #eeecf1, #e7eaf0);
        display: block;
        z-index: 100;
    }
    .back {
        height: 50px;
        position: fixed;
        bottom: 20%;
        text-decoration: none;
    }
    .back-text {
        color: black;
        text-decoration: none;
    }
    .footer {
        width: 100%; /* 横幅いっぱいにする */
        background-color: rgb(243, 240, 240);
        display: flex;
        align-items: center; /* テキストを中央配置 */
        justify-content: center;
        position: fixed; /* 固定 */
        bottom: 0; /* 画面下部に配置 */
        z-index: -1;
    }
    .footer-a {
        text-decoration: none;
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
    .side-menu {
        color: #555151;
        border-radius: 9px;
        background-color: rgb(126, 190, 193);
    }
</style>
