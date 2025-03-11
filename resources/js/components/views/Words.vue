<template>
    <nav class="nav flex-column custom-nav">
        <div class="nav-link" type="button" @click="goToWordsContains(1)">
            <i class="bi bi-book"> 人、物</i>
        </div>
        <div class="nav-link" type="button" @click="goToWordsContains(2)">
            <i class="bi bi-question-circle"> 前置詞</i>
        </div>
        <div class="nav-link" type="button" @click="goToWordsContains(3)">
            <i class="bi bi-book"> 動詞・副詞・形容詞など</i>
        </div>
        <div class="nav-link" type="button" @click="goToWordsContains(4)">
            <i class="bi bi-pencil"> 方向</i>
        </div>
        <div class="nav-link" type="button" @click="goToWordsContains(5)">
            <i class="bi bi-pencil-square"> 時間帯</i>
        </div>
        <div class="nav-link" type="button" @click="goToWordsContains(6)">
            <i class="bi bi-pencil-square"> 数字</i>
        </div>
    </nav>
</template>

<script>
    import '/resources/css/nav.css';
    import WordsContains from './WordsContains.vue';
    export default {
        name: 'Words',
        components: {
            WordsContains
        },
        methods: {
            goToWordsContains(categoryNum) {
                this.$router.push({
                    path: 'words-contains',
                    query: {category: categoryNum}
                })
            }
        }
    }
</script>
