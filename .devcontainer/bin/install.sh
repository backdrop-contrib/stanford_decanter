#!/bin/bash

# rm -rf /var/www/html/settings.php
rm -rf /var/www/html/files/config*

mariadb -h db --user=root --password=root -e 'DROP DATABASE IF EXISTS app; CREATE DATABASE app'

bee site-install \
      --db-name=app --db-user=root --db-pass=root --db-host=db --db-prefix=''\
      --auto\
      --profile=decanter_profile \
      --root=/var/www/html


bee uli \
      --base-url=http://localhost:8000/ \
      --root=/var/www/html

bee en devel devel_generate \
      --root=/var/www/html


chown --quiet -R www-data:www-data /var/www/html