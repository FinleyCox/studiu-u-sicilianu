FROM php:8.2-apache

# --- 1. 必要なシステムパッケージのインストール
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# --- 2. PHP拡張のインストール（MySQL）
RUN docker-php-ext-install pdo pdo_mysql

# --- 3. Composerをインストール（公式イメージからコピー）
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# --- 4. Apacheポートの変更（Railway用）
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

# --- 7. .envを作成（なければ空ファイル）
RUN cp .env.example .env || touch .env

# --- 8. Composer依存関係のインストール（本番モード）
RUN composer install --no-dev --optimize-autoloader

# --- 9. Laravelのキャッシュクリアと再生成（エラー防止）
RUN php artisan config:clear \
    && php artisan cache:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# --- 10. 書き込み権限の設定（storageとbootstrap/cache）
RUN chown -R www-data:www-data storage bootstrap/cache

# --- 11. Laravelログをstdoutに出す（Railwayのログで確認可能）
RUN ln -sf /dev/stdout storage/logs/laravel.log

# --- 12. Apache起動
CMD ["apache2-foreground"]
