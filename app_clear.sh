#!/bin/sh

set -eu

php artisan optimize
php artisan cache:clear
php artisan view:clear
php artisan clear-compiled

sudo service nginx restart

if type "php-fpm" > /dev/null 2>&1
then
    sudo service php-fpm restart
else
    sudo service php5-fpm restart
fi

php artisan migrate
