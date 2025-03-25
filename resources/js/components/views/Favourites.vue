<template>
    <h2>お気に入り</h2>
    <table>
        <thead>
            <tr>
                <td v-for="favourite in favourites" :key="favourite.id">
                    <h3>{{ favourite.japanese }}</h3>
                    <p>{{ favourite.sicilian }}</p>
                </td>
            </tr>
        </thead>
    </table>
</template>

<script>
    export default {
        name: 'Favourites',
        data() {
            return {
                favourites: [], 
                userId: localStorage.getItem('userId')
            }
        },
        mounted() {
            console.log(this.userId);
            this.getFavourites(this.userId);
        },
        methods: {
            getFavourites(userId) {
                axios.get('/api/get-favourites', {
                    params: {
                        userId: userId,
                    }
                })
                .then(response => {
                    if(response.data.success === true) {
                        this.favourites = response.data.favourites;
                    } else {
                        console.error('APIエラー:', response.data.message);
                    }
                })
                .catch(error => {
                    console.error('APIエラー:', error);
                })
                    
            }
        }
    }
</script>
