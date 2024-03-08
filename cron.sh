#!/bin/bash
php bin/directory-validation.php || exit

git pull origin main
composer install --optimize-autoloader --no-dev
/usr/local/bin/cachetool opcache:reset --fcgi=/var/run/php/php8.2-fpm-yireo.sock
