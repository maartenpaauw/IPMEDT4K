# IPMEDT4K

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ab96fc1f304e41cd88cfd2e8387c8a83)](https://www.codacy.com/app/maartenpaauw/IPMEDT4K?utm_source=github.com&utm_medium=referral&utm_content=maartenpaauw/IPMEDT4K&utm_campaign=badger)
[![Greenkeeper badge](https://badges.greenkeeper.io/maartenpaauw/IPMEDT4K.svg)](https://greenkeeper.io/)
[![Build Status](https://travis-ci.org/maartenpaauw/IPMEDT4K.svg?branch=master)](https://travis-ci.org/maartenpaauw/IPMEDT4K)
[![dependencies Status](https://david-dm.org/maartenpaauw/IPMEDT4K/status.svg)](https://david-dm.org/maartenpaauw/IPMEDT4K)
[![devDependencies Status](https://david-dm.org/maartenpaauw/IPMEDT4K/dev-status.svg)](https://david-dm.org/maartenpaauw/IPMEDT4K?type=dev)

> Het vak IPMEDT4 (Project Mediatechnologie 4) op Hogeschool Leiden.


Voor het installeren van de webapp is het volgende nodig:

  - NPM of YARN
  - PHP v7.0
  - Composer

# Installatie

Rename env.example naar .env
```sh
$ git clone https://github.com/maartenpaauw/IPMEDT4K.git .
$ cp env.example .env
```
Vul het aan met de database gegevens.
Vul ook de open weather API key in.
Vervolgens open je de terminal en voer je de volgende commando's uit:
```sh
$ php artisan key:generate
$ php artisan migrate --seed
$ npm install / yarn install
$ composer install
$ npm run watch / yarn run watch
```
Hierna opent de website in uw browser en kunt u de website bekijken.


License
----

MIT


**IPMEDT4 - Krankenhaus Krak**
**[Maarten Paauw](https://github.com/maartenpaauw) | [Zowie van Geest](https://github.com/zowie93) | [Gerson Straver](https://github.com/teddybro)**
