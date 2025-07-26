FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Configure Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf \
    && a2enmod rewrite

# Copy application
COPY . /var/www/html

WORKDIR /var/www/html

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# 9. Laravelキャッシュ系（DB繋がらないので失敗してもOKにする）
RUN php artisan config:clear || true \
    && php artisan cache:clear || true \
    && php artisan route:clear || true \
    && php artisan view:clear || true \
    && php artisan config:cache || true \
    && php artisan route:cache || true \
    && php artisan view:cache || true

# 10. 権限
RUN chown -R www-data:www-data storage bootstrap/cache

# 11. Laravelログをstdoutに
RUN ln -sf /dev/stdout storage/logs/laravel.log

# 12. Apache起動
CMD ["apache2-foreground"]

# FROM php:8.2-apache

# # --- 1. 必要なパッケージのインストール
# RUN apt-get update && apt-get install -y \
#     git \
#     unzip \
#     zip \
#     && apt-get clean \
#     && rm -rf /var/lib/apt/lists/*

# # --- 2. PHP拡張のインストール
# RUN docker-php-ext-install pdo pdo_mysql

# # --- 3. Composerのインストール
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # --- 4. Apacheポート変更（Railway用に8080）
# RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf
# EXPOSE 8080

# # --- 5. DocumentRootを Laravel の public ディレクトリに設定
# ENV APACHE_DOCUMENT_ROOT /var/www/html/public
# RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
#     && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf \
#     && a2enmod rewrite

# # --- 6. アプリのコードをコピー
# COPY . /var/www/html
# WORKDIR /var/www/html

# # --- 7. ダミー .env を作成（build用。RailwayのVariablesは起動時に反映）
# RUN echo "APP_KEY=base64:gkR0uJV0/LPor2FfSifv0LjLMhZqgR4QayzHsIATNWc=" > .env && \
#     echo "APP_ENV=production" >> .env && \
#     echo "APP_DEBUG=false" >> .env && \
#     echo "APP_URL=http://localhost" >> .env && \
#     echo "DB_CONNECTION=mysql" >> .env && \
#     echo "DB_HOST=127.0.0.1" >> .env && \
#     echo "DB_PORT=3306" >> .env && \
#     echo "DB_DATABASE=dummy" >> .env && \
#     echo "DB_USERNAME=dummy" >> .env && \
#     echo "DB_PASSWORD=dummy" >> .env && \
#     echo "CACHE_DRIVER=file" >> .env \
#     && echo "SESSION_DRIVER=file" >> .env \
#     && echo "QUEUE_CONNECTION=sync" >> .env

# # --- 8. Composer install（本番モードで軽量に）
# RUN composer install --no-dev --optimize-autoloader

# # --- 9. Laravelキャッシュ系コマンド（失敗しても止まらないよう || true）
# RUN php artisan config:clear || true \
#     && php artisan cache:clear || true \
#     && php artisan route:clear || true \
#     && php artisan view:clear || true \
#     && php artisan config:cache || true \
#     && php artisan route:cache || true \
#     && php artisan view:cache || true

# # --- 10. 書き込み権限の設定
# RUN chown -R www-data:www-data storage bootstrap/cache

# # --- 11. Laravelログを stdout に出力（Railwayログで確認できる）
# RUN ln -sf /dev/stdout storage/logs/laravel.log

# # --- 12. Apache起動
# CMD ["apache2-foreground"]
