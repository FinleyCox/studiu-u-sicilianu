<template>
    <div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
        <form @submit.prevent="handleLogin">
            <div class="form-group">
                <label for="username">ユーザー名</label>
                <input
                    type="text"
                    id="username"
                    class="form-control"
                    v-model="form.username"
                />
            </div>
            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input
                    type="email"
                    id="email"
                    class="form-control"
                    v-model="form.email"
                />
            </div>
            <div class="form-group">
                <label for="password">パスワード</label>
                <input
                    type="password"
                    id="password"
                    class="form-control"
                    v-model="form.password"
                />
            </div>
            <div class="btn-group">
            <button type="button" class="btn btn-secondary" @click="register">登録</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'Register',
        data() {
            return {
                form: {
                username: '',
                email: '',
                password: '',
                }
            };
        },
        methods: {
            register() {
                axios.post('/api/register', {
                    username: this.form.username,
                    email: this.form.email,
                    password: this.form.password
                })
                .then(response => {
                        if(response.data.register === true) {
                            // リダイレクト('/login')へ
                            this.$router.push('/login');
                        } else {
                            alert('登録に失敗しました');
                        }
                    })
                .catch(error => {
                    console.error('APIエラー(ユーザー登録):', error);
                });
            }
        },
    }
</script>

<style scoped>
  /* GoogleFontsのPoppins適用 */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 40%;
        background-color: rgb(182, 216, 218);
        overflow-x: hidden;
        padding-top: 20px;
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .main {
        margin-left: 42%;
        padding: 20px;
        width: 58%;
    }

    @media screen and (max-width: 768px) {
        .sidenav {
        width: 100%;
        position: relative;
        height: auto;
        }
        .main {
        margin-left: 0;
        width: 100%;
        }
    }

    .login-main-text {
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }

    .login-main-text h2 {
        font-weight: 300;
    }

    .login-form {
        margin-top: 15%;
    }

    .form-group {
        display: block;
        margin-bottom: 5px;
    }

    .btn-group {
        display: block;
        gap: 100px;
    }

    .btn-black {
        background-color: #000 !important;
        color: #fff;
    }
</style>
