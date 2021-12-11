#!/bin/bash
php artisan migrate --force
php artisan optimize

supervisord -n -c /etc/supervisord.conf
