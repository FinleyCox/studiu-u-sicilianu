# ベースイメージとしてPHP 8.2-FPMアルパインを使用
FROM php:8.2-fpm-alpine

# システムパッケージのインストール
RUN apk update && apk add --no-cache \
    curl \
    zip \
    unzip \
    git \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libonig-dev \
    libzip-dev \
    postgresql-dev \
    nginx

# PHP拡張機能のインストール
RUN docker-php-ext-install pdo_pgsql mbstring zip gd

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ワーキングディレクトリを設定
WORKDIR /var/www/html

# アプリケーションファイルをコピー
COPY . .

# Composer インストール
RUN composer install --no-scripts --no-dev --optimize-autoloader

# Node.jsとnpmのインストール
RUN apk add --no-cache nodejs npm

# npmパッケージをインストール & Viteのビルド
RUN npm ci && npm run build

# ストレージとキャッシュのパーミッション設定
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Nginx設定ファイルのコピー
COPY nginx.conf /etc/nginx/nginx.conf

# Nginxの起動
CMD ["nginx", "-g", "daemon off;", "&&", "php-fpm"]

# ポートを公開
EXPOSE 80 9000
