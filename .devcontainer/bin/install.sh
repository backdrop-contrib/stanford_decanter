#!/bin/bash

# rm -rf /var/www/html/settings.php
rm -rf /var/www/html/files/config*

mariadb -h db --password=root -e 'DROP DATABASE IF EXISTS app; CREATE DATABASE app'

bee site-install \
      --db-name=app --db-user=root --db-pass=root --db-host=db --db-prefix=''\
      --auto\
      --profile=decanter_profile \
      --root=/var/www/html \