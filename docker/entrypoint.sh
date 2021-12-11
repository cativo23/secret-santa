#!/bin/bash
php artisan optimize
php artisan migrate --force

supervisord -n -c /etc/supervisord.conf
