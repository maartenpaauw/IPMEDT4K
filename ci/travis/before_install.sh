#!/usr/bin/env bash

mysql -e 'CREATE DATABASE IPMEDT4K;'

# Composer
composer self-update
composer install --no-interaction

# Yarn
yarn install
