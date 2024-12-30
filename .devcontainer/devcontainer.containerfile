# https://github.com/devcontainers/images/blob/main/src/php/.devcontainer/Dockerfile
FROM mcr.microsoft.com/devcontainers/php:0-8.1-bullseye

RUN a2enmod rewrite

RUN apt-get update && \
		apt-get install -y \
			libzip-dev \
			libonig-dev \
			libpng-dev \
			libjpeg-dev \
			libwebp-dev \
			logrotate \
			mariadb-client \
			libfreetype6-dev && \
	  docker-php-ext-configure \
  		gd \
			--with-jpeg=/usr \
			--with-freetype \
			--with-webp &&\
		docker-php-ext-install \
			gd \
			opcache \
			mbstring \
			pdo \
			pdo_mysql \
			zip

RUN git clone https://github.com/backdrop-contrib/bee.git /bee && \
 	 	chmod +x /bee/bee.php && \
		ln -s /bee/bee.php /usr/bin/bee

# enable Xdebug remote debugging
RUN { \
    echo 'xdebug.mode=off'; \
    echo 'xdebug.discover_client_host=true'; \
    echo 'xdebug.client_host=host.docker.internal'; \
    echo 'xdebug.start_with_request=yes'; \
    echo 'memory_limit = 2048M'; \
		echo 'xdebug.client_port = 9000'; \
    echo 'error_log = /var/log/php_error.log'; \
    echo 'xdebug.log = /var/log/xdebug.log'; \
} >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


RUN  cd /var/log \
  && touch php_error.log xdebug.log \
  && chown 1001:1001 php_error.log xdebug.log

WORKDIR /var/www/html

RUN  bee dl-core --root=/var/www/html \
  && bee site-install --db-name=app --db-user=root --db-pass=root --db-host=db --db-prefix=''\
                      --username=admin --password=admin --email=admin@example.com \
                      --site-name="Decanter 7 Test" \
                      --site-email="admin@example.com" \
                      --langcode=en \
                      --base-url=http://localhost:8000/ \
                      --root=/var/www/html \
                      --auto \
  && chown -R www-data:www-data /var/www/html

# RUN { \
#   echo '<?php'; \
#   echo "\$database = 'mysql://root:root@db/app';"; \
#   echo "\$config_directories['active'] = 'files/config/active';" \
#   echo "\$config_directories['staging'] = 'files/config/staging;'"; \
# } >> /var/www/html/settings.local.php

EXPOSE 80
