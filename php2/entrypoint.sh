#!/bin/bash
composer install
npm install
npm run build
php artisan key:generate
php artisan migrate:fresh --seed
php-fpm
