#!/usr/bin/env bash
sudo chmod -R 777 var/cache
php bin/console c:c
sudo chmod -R 777 var/cache
php bin/console assetic:dump
sudo chmod -R 777 var/cache