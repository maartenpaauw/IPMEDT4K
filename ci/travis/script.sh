#!/usr/bin/env bash

php artisan config:clear
php artisan key:generate
php artisan migrate
php artisan db:seed

vendor/bin/phpunit

php artisan serve &
php artisan dusk
