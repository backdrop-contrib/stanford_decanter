#!/bin/bash

mariadb -h db --password=root -e 'DROP DATABASE IF EXISTS app; CREATE DATABASE app'

rm -rf /var/www/html
mkdir /var/www/html

bee dl-core /var/www/html
bee site-install --db-name=app --db-user=root --db-pass=root --db-host=db --db-prefix=''\
                      --username=admin --password=admin --email=admin@example.com \
                      --site-name="Decanter 7 Test" \
                      --site-email="admin@example.com" \
                      --langcode=en \
                      --base-url=http://localhost:8000/ \
                      --root=/var/www/html \
                      --auto \

chown -R www-data:www-data /var/www/html
