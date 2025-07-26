FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy composer files first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy package files
COPY package.json package-lock.json ./
RUN npm ci --only=production

# Copy application files
COPY . .

# Build assets
RUN npm run build

# Set proper permissions
RUN chmod -R 755 storage bootstrap/cache

# Create .env file with basic configuration
RUN echo 'APP_NAME="studiu u sicilianu"' > .env && \
    echo 'APP_ENV=production' >> .env && \
    echo 'APP_DEBUG=false' >> .env && \
    echo 'APP_URL=https://studiu-u-sicilianu.onrender.com' >> .env && \
    echo 'LOG_CHANNEL=stack' >> .env && \
    echo 'LOG_LEVEL=debug' >> .env && \
    echo 'DB_CONNECTION=sqlite' >> .env && \
    echo 'DB_DATABASE=database/database.sqlite' >> .env && \
    echo 'BROADCAST_DRIVER=log' >> .env && \
    echo 'CACHE_DRIVER=file' >> .env && \
    echo 'FILESYSTEM_DISK=local' >> .env && \
    echo 'QUEUE_CONNECTION=sync' >> .env && \
    echo 'SESSION_DRIVER=file' >> .env && \
    echo 'SESSION_LIFETIME=120' >> .env

# Generate application key
RUN php artisan key:generate --no-interaction

# Create database file if it doesn't exist
RUN touch database/database.sqlite

# Run migrations
RUN php artisan migrate --force

# Clear and cache config
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose port
EXPOSE 8080

# Start Laravel's built-in server
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080} 