FROM php:8.2-fpm

# システムパッケージのインストール
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libonig-dev \
    libpq-dev \
    nginx \
    && docker-php-ext-install pdo_pgsql mbstring \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
    
# PHP-FPMの設定
RUN sed -i 's/listen = 127.0.0.1:9000/listen = \/var\/run\/php-fpm.sock/g' /usr/local/etc/php-fpm.d/www.conf && \
    sed -i 's/;listen.owner = www-data/listen.owner = www-data/g' /usr/local/etc/php-fpm.d/www.conf && \
    sed -i 's/;listen.group = www-data/listen.group = www-data/g' /usr/local/etc/php-fpm.d/www.conf && \
    sed -i 's/;listen.mode = 0660/listen.mode = 0660/g' /usr/local/etc/php-fpm.d/www.conf

# ログディレクトリの作成
RUN mkdir -p /var/log/nginx && \
    touch /var/log/nginx/error.log && \
    touch /var/log/nginx/access.log && \
    chown -R www-data:www-data /var/log/nginx

# Composerのインストール
COPY --from=composer /usr/bin/composer /usr/bin/composer

# ワーキングディレクトリを設定
WORKDIR /var/www

# 依存関係のファイルのみをコピー
COPY composer.json composer.lock ./

# Composer インストール
RUN composer install --no-scripts --no-autoloader --no-dev --optimize-autoloader

# アプリケーションファイルをコピー
COPY . .
RUN composer dump-autoload --optimize

# Node.jsとNPMのインストール
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean

# npmパッケージをインストール & Viteのビルド
COPY package*.json ./
RUN npm ci
RUN npm run build

# Nginxの設定ファイルをコピー
COPY nginx.conf /etc/nginx/conf.d/default.conf

# ストレージとキャッシュのパーミッション設定
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 本番環境用の設定
ENV PHP_OPCACHE_ENABLE=1
ENV PHP_OPCACHE_ENABLE_CLI=1
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS=0

# 環境設定
RUN cp .env.example .env
RUN php artisan key:generate

# 起動スクリプトの作成
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

CMD ["/usr/local/bin/start.sh"]

EXPOSE 80