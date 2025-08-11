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

# 4) アプリ一式をコピー
WORKDIR /var/www/html
COPY . /var/www/html

# 5) Composer（本番想定）
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader

# 6) Laravelの必須ディレクトリを作成（.gitignoreで空が落ちる対策）
RUN mkdir -p storage/framework/{cache,data,sessions,testing,views} \
    storage/logs \
    bootstrap/cache

# 7) 権限
RUN chown -R www-data:www-data /var/www/html \
 && chmod -R ug+rwx storage bootstrap/cache

# 8. 起動スクリプトを作成
RUN echo '#!/bin/bash\n\
set -e\n\
export PORT=${PORT:-8080}\n\
# ports.conf の Listen 行を実ポートに\n\
sed -i "s/^Listen .*/Listen ${PORT}/" /etc/apache2/ports.conf\n\
# 000-default.conf の <VirtualHost *:PORT> を実ポートに（:$PORT や :80 の両方に対応）\n\
sed -ri "s#<VirtualHost \\*(:[0-9]+)?>#<VirtualHost *:${PORT}>#g" /etc/apache2/sites-available/000-default.conf\n\
# $PORT という文字列が残っている場合の保険（ports.conf / 000-default.conf 両方）\n\
sed -i \"s/\\$PORT/${PORT}/g\" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf\n\
# ServerName の警告抑止\n\
echo \"ServerName localhost\" > /etc/apache2/conf-available/servername.conf\n\
a2enconf servername >/dev/null 2>&1 || true\n\
exec apache2-foreground' > /usr/local/bin/start.sh \
 && chmod +x /usr/local/bin/start.sh

CMD ["/usr/local/bin/start.sh"]
