<template>
    <!--
        TODO:
        ・ログアウト
        ・復習ワード機能(間違えたワード)
        ・フレーズ
    -->
    <div class="header">
        <h1>studiu u sicilianu</h1>
    </div>
    <div class="sidenav">
        <div class="login-main-text">

        </div>
    </div>
    <div class="container">
        <router-view></router-view>
    </div>
    <div v-if="$route.path !== '/'" class="back">
        <router-link class="back-text" to="/"><i class="bi bi-arrow-left-circle">BACK</i></router-link>
    </div>
    <div class="footer">
        <div class="text-center p-4" style="background-color: rgb(203, 201, 201);">
            <a class="text-reset fw-bold footer-a" href="https://github.com/FinleyCox" target="_blank">🐕created by Ai Nakajima🐕</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "App",
    }
</script>
<script setup>
    import { onMounted } from 'vue';
    onMounted(() => {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css';
        document.head.appendChild(link);

        const icon = document.createElement('link');
        icon.rel = 'stylesheet';
        icon.href = 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css';
        document.head.appendChild(icon);

        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js';
        document.body.appendChild(script);

    });
</script>

<style scoped>
    .header {
        text-align: center;
        display: block; /* 固定 */
    }
    .container {
        height: 100%;
        text-align: center;
        background-color: linear-gradient(135deg, #eeecf1, #e7eaf0);
        display: block;
    }
    h1 {
        z-index: 5;
    }
    .back {
        height: 50px;
        position: fixed; /* 固定 */
        bottom: 20%;
        text-decoration: none;
    }
    .back-text {
        color: black;
        text-decoration: none;
    }
    .footer {
        height: 100px;
        width: 100%; /* 横幅いっぱいにする */
        background-color: rgb(203, 201, 201);
        display: flex;
        align-items: center; /* テキストを中央配置 */
        justify-content: center;
        position: fixed; /* 固定 */
        bottom: 0; /* 画面下部に配置 */
    }
    .footer-a {
        text-decoration: none;
        background-color: rgb(203, 201, 201);
        color: #ffffff;
    }
    .sidenav {
        height: 100%;
        width: 20%;
        background-color: rgb(182, 216, 218);
        overflow-x: hidden;
        padding-top: 20px;
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
    }
</style>
