<template>
    <!-- TODO:ログインボタンとかの幅 -->
    <div class="main">
        <div class="col-12">
            <div class="login-form">
            <form @submit.prevent="handleLogin">
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input
                        type="text"
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

                <p v-if="errorMsg">{{ errorMsg }}</p>
                <div class="row">
                    <!-- <div class="btn-group mt-2"> -->
                        <button type="submit" class="btn btn-info mt-2">ログイン</button>
                        <button type="button" class="btn btn-secondary mt-2" @click="register">登録</button>
                    <!-- </div> -->
                    <div class="btn-group mt-2">
                        <a class="mt-2" style="color: black;" onclick="location.href='/'">ログインせずに使用する</a>　または　
                        <a class="mt-2" style="color: black;"  @click="forgotPassword">メールアドレスをわすれた</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'Login',
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                errorMsg:'',
            };
        },
        methods: {
            handleLogin() {
                axios.post('/api/login', {
                    email: this.form.email,
                    password: this.form.password
                })
                .then(response => {
                        if(response.data.login === true) {
                            localStorage.setItem('token', response.data.token)
                            localStorage.setItem('username', response.data.username)
                            localStorage.setItem('userId', response.data.userId)
                            // リダイレクト('/')へ:pushだと画面追加になるので履歴には残さない
                            window.location.href = '/'
                        } else {
                            this.errorMsg = response.data.message;
                        }
                    })
                .catch(error => {
                    if(error.response && error.response.status == 422) {
                        this.errorMsg = 'メールアドレスまたはパスワードが入力されていません';
                    } else {
                        console.error('APIエラー（ログイン）:', error);
                    }
                });
            },
            // 登録画面へ遷移
            register() {
                this.$router.push('/register');
            },
            forgotPassword() {
                this.$router.push('/forgot-password');
            }
        }
    };
</script>

<style scoped>
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
        margin-left: 20%;
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
