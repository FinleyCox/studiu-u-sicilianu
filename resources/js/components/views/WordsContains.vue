<template>
    <table class="table table-hover words">
        <thead>
            <tr>
                <th>日本語</th>
                <th>シチリア語</th>
                <th>お気に入り</th>
            </tr>
            <tr v-for="word in words" :key="word.id">
                <td>{{ word['japanese'] }}</td>
                <td>{{ word['sicilian'] }}</td>
                <td v-if="isLoggedin === true">
                    <a v-if="favouriteWords[word.id]">
                        お気に入り済　：
                        <span class="text-danger">
                            <a href="javascript:void(0)" class="favourite" type="button" @click="deleteFavorite(word.id)">削除</a>
                        </span>
                    </a>
                    <a v-else href="javascript:void(0)" class="favourite" type="button" @click="addFavorite(word.id)">お気に入り登録</a>
                </td>
                <td v-else>
                    ログインするとお気に入り登録ができます
                </td>
            </tr>
        </thead>
    </table>
</template>

<script>
    // プロパティの変更を追跡するためにreactiveを使用。お気に入り追加があったらビューを更新して反映させる
    import { reactive } from 'vue'
    export default{
        name: 'WordsContains',
        data() {
            return {
                words: [],
                userId: this.$route.query.userId,
                isLoggedin: false,
                // ⚠️オブジェクトとして包むこと！！
                favouriteWords: reactive({}),
            }
        },
        mounted() {
            // Words.vueの{category: categoryNum}を指定する
            const categoryNum = this.$route.query.category;
            this.getWords(categoryNum);
            const token = localStorage.getItem('token');
            if(token) {
                this.isLoggedin = true;
            }
        },
        methods: {
            // カテゴリ別の単語
            getWords(categoryNum) {
                axios.get('/api/words-contains', {
                    params: { 'category': categoryNum }
                })
                .then(response => {
                    this.words = response.data;
                    // 各単語のお気に入り状態を確認
                    if (this.isLoggedin) {
                        this.words.forEach(word => {
                            this.checkFavourite(word.id);
                        });
                    }
                })
                .catch(error => {
                    console.error('APIエラー:', error);
                });
            },
            // お気に入り追加
            addFavorite(wordId) {
                axios.post('/api/words-contains/add-favourite', {
                    wordId: wordId,
                    userId: this.userId
                })
                .then(response => {
                    // console.log(response.data);
                    // お気に入り追加成功時にフラッシュメッセージを表示、お気に入り済みかどうかを確認
                    if(response.data.success == true) {
                        toastr.info(response.data.message);
                        this.checkFavourite(wordId);
                    } else {
                        toastr.error(response.data.message);
                    }
                })
                .catch(error => {
                    console.error('APIエラー:', error);
                });
            },
            // お気に入り済みかどうかを確認
            checkFavourite(wordId) {
                axios.post('/api/words-contains/is-favourite', {
                    wordId: wordId,
                    userId: this.userId
                })
                .then(response => {
                    this.favouriteWords[wordId] = response.data.success;
                })
                .catch(error => {
                    console.error('APIエラー:', error);
                });
            },
            // お気に入り削除
            deleteFavorite(wordId) {
                axios.post('/api/words-contains/delete-favourite', {
                    wordId: wordId,
                    userId: this.userId
                })
                .then(response => {
                    if(response.data.success === true) {
                        // 削除成功時に直接favouriteWordsの値をfalseに設定
                        toastr.success(response.data.message);
                        this.favouriteWords[wordId] = false;
                    } else {
                        toastr.error(response.data.message);
                    }
                })
                .catch(error => {
                    console.error('APIエラー:', error);
                });
            }
        }
    }
</script>

<style>
    .favourite {
        cursor: pointer;
        text-decoration: none;
    }
</style>
