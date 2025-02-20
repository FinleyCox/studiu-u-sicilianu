<template>
    <nav class="nav flex-column custom-nav">
        <router-link class="nav-link" to="/quiz">
            <i class="bi bi-question-circle"></i> Quiz
        </router-link>
    </nav>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style>
/* GoogleFontsのPoppins適用 */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

body {
    font-family: 'Poppins', sans-serif;
}
.custom-nav {
    background: linear-gradient(135deg, #eeecf1, #e7eaf0);
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.nav-link {
    color: #333;
    font-weight: 600;
    font-size: 20px;
    padding: 12px 15px;
    border-radius: 8px;
    transition: background 0.3s ease, transform 0.2s ease;
    display: flex;
    align-items: center;
    text-decoration: none;
    letter-spacing: 0.5px;
}

.nav-link:hover {
    transform: translateX(5px);
}

i {
    margin-right: 10px;
    font-size: 24px;
}
</style>
