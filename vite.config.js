import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,  // 相対URLにする
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
    base: '/',  // ベースパスが正しいか確認
    server: {
        https: true, // HTTPSを使用
    },
    build: {
        // ビルドの際にHTTPSで提供されるように設定
        assetsDir: 'assets', // もし必要なら、ビルド出力先の設定を調整
    },
});
