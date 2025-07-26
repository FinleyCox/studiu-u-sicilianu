FROM php:8.2-apache

# 1. 必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2. ApacheのDocumentRootをpublicに
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf \
    && a2enmod rewrite

# 3. publicディレクトリとテストファイルのみコピー
RUN mkdir -p /var/www/html/public
COPY public/test.php /var/www/html/public/test.php

# 4. Apache起動
CMD ["apache2-foreground"]
