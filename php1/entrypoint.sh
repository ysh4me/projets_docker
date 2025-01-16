#!/bin/bash
set -e 

if [ ! -f "vendor/autoload.php" ]; then
  echo "Running composer install..."
  composer install
fi

if [ ! -d "node_modules" ]; then
  echo "Running npm install..."
  npm install
fi

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
