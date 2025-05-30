<template>
<div class="main">
        <div class="col-12">
            <div class="login-form">
            <form @submit.prevent="resetPassword">
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
                    <label for="password">新パスワード</label>
                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        v-model="form.password"
                    />
                </div>
                <div class="form-group">
                    <label for="password-confirm">確認用パスワード</label>
                    <input
                        type="password"
                        id="passwordConfirm"
                        class="form-control"
                        v-model="form.passwordConfirm"
                    />
                </div>

                <p v-if="msg">{{ msg }}</p>
                <div class="row">
                    <button type="submit" class="btn btn-info mt-2">パスワード再設定</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        name: 'ForgotPassword',
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    passwordConfirm: ''
                },
                msg:'',
            };
        },
        methods: {
            resetPassword() {
                if(this.form.password === this.form.passwordConfirm) {
                    axios.post('/api/resetpassword', {
                    email: this.form.email,
                    password: this.form.password
                })
                .then(response => {
                        if(response.data.success === true) {
                            toastr.success(response.data.message);
                            setTimeout(function(){
                            window.location.href = '/login';
                            }, 2*1000);
                        } else {
                            // フォームを初期化
                            toastr.error(response.data.message);
                            this.form.email = '';
                            this.form.password = '';
                            this.form.passwordConfirm = '';
                        }
                    })
                .catch(error => {
                    if(error.response && error.response.status == 422) {
                        this.msg = 'メールアドレスまたはパスワードが入力されていません';
                    } else {
                        this.msg = response.data.message;
                    }
                });
                }
            }
        }
    }
</script>

<style scoped>
</style>
