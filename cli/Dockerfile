FROM php:8.1

ARG extensions="gd xdebug intl exif opcache pdo_mysql dom xml amqp"

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_NO_INTERACTION 1
ENV PATH "/root/.composer/vendor/bin:$PATH"

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN composer global require --prefer-stable \
        phpstan/phpstan \
        phpunit/phpunit \
        "squizlabs/php_codesniffer=*" \
        && phpcs --config-set colors 1 && phpcs --config-set extensions php

        

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    nano \
    unzip zip \
    && install-php-extensions ${extensions}


WORKDIR /var/www
