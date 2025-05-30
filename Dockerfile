# PHPイメージ
FROM php:8.2-cli

# Node.jsをインストール
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs unzip git

# Composerをインストール
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 作業ディレクトリ
WORKDIR /app

# ソースコードをコピー
COPY . .

# PHP依存をインストール
RUN composer install


# Node依存もインストール＆ビルド
RUN npm install && npm run build

# .env.example → .env
RUN cp .env.example .env

# LaravelのAPP_KEY生成（初回のみ）
RUN php artisan key:generate || true

# Laravelキャッシュクリア
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# Laravelマイグレーション（必要なら）
RUN php artisan migrate --force || true

# 権限設定
RUN chmod -R 777 storage bootstrap/cache

# サーバー起動
CMD php artisan serve --host=0.0.0.0 --port=$PORT
