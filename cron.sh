#!/bin/bash
git diff main...origin/main --quiet --exit-code && exit

php bin/directory-validation.php || exit

git pull origin main

composer install --optimize-autoloader --no-dev

/usr/local/bin/cachetool opcache:reset --fcgi=/var/run/php/php8.4-fpm-mageos.sock
