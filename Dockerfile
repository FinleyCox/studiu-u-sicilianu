FROM php:8.2-fpm

# システムパッケージのインストール
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libonig-dev \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql mbstring \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

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

# ストレージとキャッシュのパーミッション設定
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Laravel キャッシュクリア & マイグレーション実行
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan view:clear

# 本番環境用の設定
ENV PHP_OPCACHE_ENABLE=1
ENV PHP_OPCACHE_ENABLE_CLI=1
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS=0

# マイグレーションを実行しつつ、Laravel を起動
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080

# ポートを公開
EXPOSE 8080
