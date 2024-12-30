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

RUN { \
    echo 'xdebug.mode=off'; \
    echo 'xdebug.start_with_request=no'; \
		echo 'xdebug.client_port = 9000'; \
} >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN echo "alias backdrop='bee --root=/var/www/html --base-url=http://localhost:8000/'" >> /root/.zshrc

WORKDIR /var/www/html

RUN bee dl-core /var/www/html \
	&& bee dl --root=/var/www/html \
  					theme_hooks \
	&& chown -R www-data:www-data /var/www/html

EXPOSE 80
