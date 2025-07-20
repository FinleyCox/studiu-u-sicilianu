# PHPイメージ
FROM php:8.2-fpm

# Node.jsをインストール
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get update && apt-get install -y nodejs unzip git nginx

# Composerをインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 必要なPHP拡張をインストール
RUN apt-get install -y \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql zip

# 作業ディレクトリ
WORKDIR /app

# ソースコードをコピー
COPY . .

# 依存関係をインストール
RUN composer install --no-dev --optimize-autoloader --no-scripts
RUN composer dump-autoload --optimize
RUN npm ci --only=production

# フロントエンドをビルド
RUN npm run build

# .env.example → .env
RUN cp .env.example .env

# LaravelのAPP_KEY生成
RUN php artisan key:generate --force

# キャッシュを最適化
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# 権限設定
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# マイグレーション用のスクリプトを作成
RUN echo '#!/bin/bash\n\
php artisan migrate --force\n\
php artisan db:seed --force\n\
php-fpm' > /usr/local/bin/start.sh && chmod +x /usr/local/bin/start.sh

# ポート設定
EXPOSE 8000

# 起動コマンド
CMD ["/usr/local/bin/start.sh"]
