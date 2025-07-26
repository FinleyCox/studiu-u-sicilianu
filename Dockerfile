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
    gnupg

# Install Node.js 18.x
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install MySQL client
RUN apt-get update && apt-get install -y default-mysql-client

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy composer files first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy application files
COPY . .

# Set proper permissions
RUN chmod -R 755 storage bootstrap/cache

# Create log file and set permissions
RUN touch storage/logs/laravel.log && chmod 666 storage/logs/laravel.log

# Clear and cache config (will be done at runtime)
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# Make start script executable
COPY start.sh /app/start.sh
RUN chmod +x /app/start.sh

# Expose port
EXPOSE 8080

# Start Laravel's built-in server
CMD ["/app/start.sh"] 