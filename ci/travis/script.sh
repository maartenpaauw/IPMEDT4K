#!/usr/bin/env bash

# Laravel
php artisan config:clear
php artisan key:generate
php artisan migrate
php artisan db:seed

# PHP Unit
vendor/bin/phpunit

# Laravel Dusk
php artisan serve &
php artisan dusk

# Yarn
yarn run prod
