#!/usr/bin/env bash
until cd /var/www/html/mysite
do
    echo "Waiting foun mount"
done
cd /var/www/html/
pwd && ls -la

chown www-data:www-data /var/www/html/mysite/protected/runtime
chown www-data:www-data /var/www/html/mysite/assets

echo "ServerName localhost" >> /etc/apache2/apache2.conf
a2enmod rewrite
service apache2 restart

#apt-get update && apt-get install -y libmcrypt-dev git
#    && pecl install mcrypt-1.0.2
#    && docker-php-ext-enable mcrypt

curl -sS https://getcomposer.org/installer | php -- --filename=composer

./composer install --no-interaction --no-plugins --no-scripts --no-dev --prefer-dist
