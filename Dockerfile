FROM php:8.2-apache

# 1. 必要なパッケージのインストール

RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev libicu-dev libonig-dev libxml2-dev \
 && docker-php-ext-install pdo pdo_mysql zip intl \
 && a2enmod rewrite \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. ApacheのDocumentRootをpublicに
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 3. Railway用のポート設定
RUN sed -i 's/Listen 80/Listen $PORT/g' /etc/apache2/ports.conf \
    && sed -i 's/:80/:$PORT/g' /etc/apache2/sites-available/000-default.conf

# 4. publicディレクトリとテストファイルのみコピー
RUN mkdir -p /var/www/html/public
COPY public/test.php /var/www/html/public/test.php

# 5. 権限を明示的に設定
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R ug+rwx storage bootstrap/cache

# 6. 起動スクリプトを作成
RUN echo '#!/bin/bash\n\
export PORT=${PORT:-80}\n\
sed -i "s/\$PORT/$PORT/g" /etc/apache2/ports.conf\n\
sed -i "s/:80/:$PORT/g" /etc/apache2/sites-available/000-default.conf\n\
apache2-foreground' > /usr/local/bin/start.sh \
 && chmod +x /usr/local/bin/start.sh

# 7. ディレクトリを作成
 RUN mkdir -p storage/framework/{cache,data,sessions,testing,views} \
    storage/logs \
    bootstrap/cache \
 && chown -R www-data:www-data /var/www/html \
 && chmod -R ug+rwx storage bootstrap/cache

# 7. 起動スクリプトを実行
CMD ["/usr/local/bin/start.sh"]
