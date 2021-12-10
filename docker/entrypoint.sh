#!/bin/bash
php artisan migrate
php artisan optimize

supervisord -n -c /etc/supervisord.conf
