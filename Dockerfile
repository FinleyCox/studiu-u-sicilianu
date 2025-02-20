FROM php:8.1-fpm

# パフォーマンス向上のためにapt-getをキャッシュクリア
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

# 依存関係のファイルのみをコピー
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

# アプリケーションファイルをコピー
COPY . .
RUN composer dump-autoload --optimize

# Node.jsとNPMのインストール
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# npmパッケージをインストール
COPY package*.json ./
RUN npm ci

# Viteのビルド
RUN npm run build

# 権限設定
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 本番環境用の設定
ENV PHP_OPCACHE_ENABLE=1
ENV PHP_OPCACHE_ENABLE_CLI=1
ENV PHP_OPCACHE_VALIDATE_TIMESTAMPS=0

CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080
