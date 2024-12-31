ARG VARIANT=8.3-apache-bookworm
FROM php:${VARIANT}

RUN a2enmod rewrite

RUN apt-get update && \
		apt-get install -y \
			git \
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

COPY ./.ops/bin/init /usr/local/bin/

COPY ./ /var/www/html/themes/stanford_decanter
COPY ./.ops/decanter_profile /var/www/html/profiles/decanter_profile

RUN \
		 echo "#!/bin/bash\nbee --root=/var/www/html --base-url=http://localhost:8000/ \$@" >> /usr/bin/bd \
	&& echo "#!/bin/bash\nbd cc all" >> /usr/bin/cr \
	&& chmod a+x /usr/bin/*

RUN bee dl-core /var/www/html \
	&& bee dl --root=/var/www/html \
  					theme_hooks \
						devel \
	&& chown -R www-data:www-data /var/www/html

CMD ["/usr/local/bin/init"]