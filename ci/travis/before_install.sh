#!/usr/bin/env bash

mysql -e 'CREATE DATABASE IPMEDT4K;'
composer self-update
composer install --no-interaction
composer dump-autoload -o
