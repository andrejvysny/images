FROM php:8.1-fpm

ARG extensions="gd xdebug intl exif opcache pdo_mysql dom xml amqp"

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN echo 'alias phpcs="php vendor/bin/phpcs -psn --colors"' >> ~/.bashrc \
    && echo 'alias phpcs-fix="php vendor/bin/phpcbf"' >> ~/.bashrc

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    nano \
    unzip zip \
    && install-php-extensions ${extensions}


WORKDIR /var/www
