#!/usr/bin/env bash

# Laravel
cp .env.travis .env

# Laravel Dusk
export DISPLAY=:99.0
sh -e /etc/init.d/xvfb start
./vendor/laravel/dusk/bin/chromedriver-linux &
chmod -R 0755 vendor/laravel/dusk/bin

# Laravel storage
chmod 777 -R storage
