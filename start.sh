#!/bin/bash

# PHP-FPMを起動
php-fpm -D

# データベースマイグレーションとキャッシュの設定
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Nginxをフォアグラウンドで起動
nginx -g "daemon off;"