#!/usr/bin/env bash
sudo chmod -R 777 var/cache
php bin/console c:c --env=prod
sudo chmod -R 777 var/cache
php bin/console assetic:dump --env=prod
sudo chmod -R 777 var/cache