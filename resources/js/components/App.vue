<template>
    <div class="container">
        <h1>studiu u sicilianu</h1>
        <router-view></router-view>
    </div>
    <div v-if="$route.path !== '/login'" class="back">
    <!-- <div class="back"> -->
        <router-link to="/">back</router-link>
    </div>
    <div class="footer">
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05); height: 50px;">
            <a class="text-reset fw-bold" href="https://github.com/FinleyCox">🐕created by Ai Nakajima🐕</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "App",
    }
</script>

<style scoped>
    .container {
        height: 85vh;
        text-align: center;
        background-color: linear-gradient(135deg, #eeecf1, #e7eaf0);
    }
    h1 {
        position: relative;
        padding: 1rem 2rem calc(1rem + 10px);
        background: #ffffff;
        z-index: 5;
    }

    h1:before {
        position: absolute;
        top: -7px;
        left: -7px;
        width: 100%;
        height: 100%;
        content: '';
        border: 4px solid #000;
        border-radius: 8px;
        z-index: 5;
    }
    .back {
        height: 50px;
    }
</style>
