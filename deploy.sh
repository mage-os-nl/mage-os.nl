#!/bin/bash
yarn build
git commit -m 'New CSS' pub/style.css
git push origin main

docker-compose up -d
docker-compose exec -u www-data www bash -c "php bin/directory-validation.php" || exit

ssh yireo-php "cd /home/yireo/public_html/mage-os.nl && git pull origin main && composer install"
yireo opcache:refresh 8.2
