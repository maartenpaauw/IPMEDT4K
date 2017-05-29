#!/usr/bin/env bash

export DISPLAY=:99.0
sh -e /etc/init.d/xvfb start
./vendor/laravel/dusk/bin/chromedriver-linux &
composer install --no-interaction
cp .env.travis .env
chmod 777 -R storage
