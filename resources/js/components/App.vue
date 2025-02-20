<template>
    <div class="container">
        <h2>studiu u sicilianu</h2>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "App",
    }
</script>

<style scoped>
    .container {
        height: 100vh;
        text-align: center;
        background-color: #fff8dc;
    }
    h2 {
        position: relative;
        padding: 1rem 2rem calc(1rem + 10px);
        background: #b0e0e6;
    }

    h2:before {
        position: absolute;
        top: -7px;
        left: -7px;
        width: 100%;
        height: 100%;
        content: '';
        border: 4px solid #000;
    }
</style>
