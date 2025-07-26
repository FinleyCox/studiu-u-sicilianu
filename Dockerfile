FROM php:8.2-apache

# 必須拡張などをインストール
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libonig-dev libpng-dev libpq-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Apache用にDocumentRootを設定（Laravelのpublicディレクトリ）
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Apache設定変更
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf \
    && a2enmod rewrite

# アプリのコードをコピー
COPY . /var/www/html

WORKDIR /var/www/html

# Laravelのセットアップ
RUN composer install --no-dev --optimize-autoloader \
    && if [ -f .env.example ]; then cp .env.example .env; else echo "APP_NAME=Laravel" > .env && echo "APP_ENV=production" >> .env && echo "APP_DEBUG=false" >> .env && echo "APP_URL=http://localhost" >> .env && echo "DB_CONNECTION=mysql" >> .env && echo "DB_HOST=127.0.0.1" >> .env && echo "DB_PORT=3306" >> .env && echo "DB_DATABASE=laravel" >> .env && echo "DB_USERNAME=root" >> .env && echo "DB_PASSWORD=" >> .env; fi

# パーミッションの設定（必要に応じて）
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# パーミッションの設定（必要に応じて）
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
