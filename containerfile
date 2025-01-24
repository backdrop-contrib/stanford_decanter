ARG VARIANT=8.1-apache-bullseye
FROM php:${VARIANT}

RUN a2enmod rewrite

# Install os-level requirements for the cms, git, db etc.
RUN  apt-get update \ 
  && apt-get install -y \
      git \
      libzip-dev \
      libonig-dev \
      libpng-dev \
      libjpeg-dev \
      libwebp-dev \
      libfreetype6-dev \
      mariadb-client \
  && docker-php-ext-configure \
      gd \
        --with-jpeg=/usr \
        --with-freetype \
        --with-webp \
  && docker-php-ext-install \
      gd \
      opcache \
      mbstring \
      pdo \
      pdo_mysql \
      zip

# Create some helper utilities
RUN\
  util() { echo "#!/bin/sh\n\n$2" > "/usr/local/bin/$1" && chmod a+x "/usr/local/bin/$1"; }\
  && util "bd"          "php /bee/bee.php --root=/var/www/html --base-url=http://localhost:8888/ \$@" \
  && util "cr"          "bd cc all;" \
  && util "uli"         "bd uli;" \
  && util "si"          "bd si --auto --db-name=app --db-user=root --db-pass=root --db-host=db --profile=decanter_profile" \
  && util "reset-db"    "mariadb -h db --user=root --password=root -e 'DROP DATABASE IF EXISTS app; CREATE DATABASE app'" \
  && util "reset-app"   "rm -rf /var/www/html/files/config*;" \
  && util "fix-perms"   "chown --quiet -R www-data:www-data /var/www/html;" \
  && util "install-app" "reset-db && reset-app && si && fix-perms && uli;"


# Download backdrop and bee
RUN  git clone https://github.com/backdrop-contrib/bee.git /bee \
  && bd dl-core /var/www/html \
  && bd dl \
          theme_hooks \
          devel \
  && chown -R www-data:www-data /var/www/html

# Add the theme code to the bd install.
COPY ./ /workspace

RUN  cd /var/www/html \
  && ln -s /workspace themes/stanford_decanter \
  && ln -s /workspace/profiles profiles;