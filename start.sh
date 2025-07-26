#!/bin/bash

set -e  # Exit on any error

# Debug: Show environment variables
echo "Debug: Environment variables"
echo "APP_URL: $APP_URL"
echo "RAILWAY_PUBLIC_DOMAIN: $RAILWAY_PUBLIC_DOMAIN"
echo "PORT: $PORT"

# Set APP_URL if not set
if [ -z "$APP_URL" ] && [ ! -z "$RAILWAY_PUBLIC_DOMAIN" ]; then
    export APP_URL="https://$RAILWAY_PUBLIC_DOMAIN"
    echo "Set APP_URL to: $APP_URL"
fi

# Wait for database to be ready
echo "Waiting for database connection..."
while ! mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
    sleep 1
done
echo "Database is ready!"

# Install and build assets
echo "Installing and build assets..."
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

# Debug: Check if build files exist
echo "Debug: Checking build files..."
ls -la public/build/ || echo "Build directory not found"

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Clear and cache config
echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Debug: Check Laravel configuration
echo "Debug: Laravel configuration"
php artisan config:show app
php artisan route:list --compact

# Debug: Check storage permissions
echo "Debug: Storage permissions"
ls -la storage/
ls -la storage/logs/
ls -la storage/framework/

# Start the application
echo "Starting Laravel application..."
echo "Application will be available at: http://0.0.0.0:${PORT:-8080}"
php artisan serve --host=0.0.0.0 --port=${PORT:-8080} 