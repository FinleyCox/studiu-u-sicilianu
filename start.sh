#!/bin/bash

set -e  # Exit on any error

# Debug: Show environment variables
echo "Debug: Environment variables"
echo "APP_URL: $APP_URL"
echo "RAILWAY_PUBLIC_DOMAIN: $RAILWAY_PUBLIC_DOMAIN"
echo "PORT: $PORT"

# Wait for database to be ready
echo "Waiting for database connection..."
while ! mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
    sleep 1
done
echo "Database is ready!"

# Install and build assets
echo "Installing and building assets..."
npm install
echo "NPM install completed"

# Check if build directory exists
if [ ! -d "public/build" ]; then
    echo "Building assets..."
    npm run build
    echo "Build completed"
else
    echo "Build directory already exists, skipping build"
fi

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Clear and cache config
echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start the application
echo "Starting Laravel application..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8080} 