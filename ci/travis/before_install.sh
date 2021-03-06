#!/usr/bin/env bash

# Database
mysql -e 'CREATE DATABASE IPMEDT4K;'

# Composer
composer self-update
composer install --no-interaction

# Yarn
nvm install 6.10
yarn install
