<template>
    <div v-for="word in words" :key="word.id">
        {{ word['japanese'] }} - {{ word['sicilian'] }}
    </div>
</template>

<script>
    export default{
        name: 'WordsContains',
        data() {
            return {
                words: [],
            }
        },
        mounted() {
            // Words.vueの{category: categoryNum}を指定する
            const categoryNum = this.$route.query.category;
            this.getWords(categoryNum);
        },
        methods: {
            getWords(categoryNum) {
                axios.get('/api/words-contains', {
                    params: { 'category': categoryNum }
                })
                .then(response => {
                    // console.log('succes')
                    // console.log(response.data); // ここでJSONが返るか確認
                    this.words = response.data;
                })
                .catch(error => {
                    console.error('APIエラー:', error);
                });
            }
        }
    }
</script>
