#!/usr/bin/env bash

cp .env.travis .env
php artisan key:generate
php artisan migrate
php artisan db:seed

php artisan dusk
vendor/bin/phpunit
