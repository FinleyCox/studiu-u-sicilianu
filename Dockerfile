FROM php:8.2-apache

# --- 1. 必要なシステムパッケージのインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# --- 2. PHP拡張のインストール（MySQL用）
RUN docker-php-ext-install pdo pdo_mysql

# --- 3. Composerをインストール（Composer公式イメージからコピー）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# --- 4. Apacheポートの変更（Railwayは8080固定）
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf
EXPOSE 8080

# --- 5. LaravelのDocumentRootを `public/` に設定
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf \
    && a2enmod rewrite

# --- 6. アプリケーションのコードをコピー
COPY . /var/www/html
WORKDIR /var/www/html

# --- 7. .envをダミーで作成（build時 artisanコマンド用）
RUN echo "APP_KEY=base64:dummykeydummykeydummykeydummykeydummykeydummykey=" > .env && \
    echo "APP_ENV=production" >> .env && \
    echo "APP_DEBUG=false" >> .env && \
    echo "APP_URL=http://localhost" >> .env && \
    echo "DB_CONNECTION=mysql" >> .env && \
    echo "DB_HOST=127.0.0.1" >> .env && \
    echo "DB_PORT=3306" >> .env && \
    echo "DB_DATABASE=dummy" >> .env && \
    echo "DB_USERNAME=dummy" >> .env && \
    echo "DB_PASSWORD=dummy" >> .env

# --- 8. Composer依存関係のインストール（本番モード）
RUN composer install --no-dev --optimize-autoloader

# --- 9. Laravelキャッシュ系コマンド（build中でも通るようにする）
RUN php artisan config:clear \
    && php artisan cache:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# --- 10. storage, bootstrap/cache に書き込み権限を設定
RUN chown -R www-data:www-data storage bootstrap/cache

# --- 11. Laravelログをstdoutに出す（Railwayログビューで確認用）
RUN ln -sf /dev/stdout storage/logs/laravel.log

# --- 12. Apache起動
CMD ["apache2-foreground"]
