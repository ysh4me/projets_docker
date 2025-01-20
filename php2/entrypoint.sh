#!/bin/bash
set -e 

echo "Running npm run build..."
npm run build

echo "Generating application key..."
php artisan key:generate

echo "Running migrations and seeds..."
php artisan migrate:fresh --seed

echo "Clearing configuration cache..."
php artisan config:clear

echo "Starting PHP-FPM..."
php-fpm
