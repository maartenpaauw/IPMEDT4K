#!/usr/bin/env bash

export DISPLAY=:99.0
sh -e /etc/init.d/xvfb start
./vendor/laravel/dusk/bin/chromedriver-linux &
composer install --no-interaction
php artisan serve &
chmod 777 -R storage