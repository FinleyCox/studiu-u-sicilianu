#!/bin/bash

# PHP-FPMの設定ディレクトリを作成
mkdir -p /run/php

# PHP-FPMを起動
php-fpm -D

# データベースマイグレーションとキャッシュの設定
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link

# 権限の設定
chown -R www-data:www-data /var/www/storage
chown -R www-data:www-data /var/www/bootstrap/cache

# Nginxをフォアグラウンドで起動
nginx -g "daemon off;"