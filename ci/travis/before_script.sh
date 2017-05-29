#!/usr/bin/env bash

export DISPLAY=:99.0
sh -e /etc/init.d/xvfb start
./vendor/laravel/dusk/bin/chromedriver-linux &
cp .env.travis .env
chmod -R 0755 vendor/laravel/dusk/bin
chmod 777 -R storage
