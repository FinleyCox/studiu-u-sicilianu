<template>
    <div>
        <div v-for="(item, index) in lists" :key="index">
            <router-link :to="item.route" class="menu-item">
                {{ item.name }}
            </router-link>
        </div>
        <!-- logoutは別で追加 -->
        <div v-if="isLoggedin === true" type="button" class="menu-item" @click="logout()">logout</div>
        <div v-else type="button" class="menu-item" @click="loginOrRegister()">login / register</div>
    </div>
</template>

<script>
    export default {
        name: 'SideUserMenu',
        mounted() {
            const token = localStorage.getItem('token');
            if(token) {
                this.isLoggedin = true;
            }
        },
        data() {
            return {
                lists: [
                    { name:'home', route: '/' },
                    { name:'quiz', route: '/quiz' },
                    { name:'conjugation', route: '/conjugation-essentials' },
                    { name:'phrases', route: '/phrases' },
                ],
                isLoggedin: false,
            }
        },
        methods: {
            logout() {
                axios.post('/api/logout', {},
                {
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    // console.log(response.data); // ここでJSONが返るか確認
                    if(response.data.logout === true) {
                        localStorage.removeItem('token');
                        localStorage.removeItem('username');
                        // ログイン画面へ遷移
                        window.location.href = '/login'
                    }
                })
                .catch(error => {
                    console.error('APIエラー:', error);
                });
            },
            loginOrRegister() {
                this.$router.push('/login');
            },
        }
    }
</script>

<style>
    .menu-item {
        color: #fff;
        text-decoration: none;
        display: flex;
        margin-bottom: 15px;
    }
</style>
