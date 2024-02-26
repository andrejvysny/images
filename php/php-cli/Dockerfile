FROM php:8.3-cli

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_NO_INTERACTION 1
ENV PATH "/root/.composer/vendor/bin:$PATH"

RUN apt-get update && apt-get install -y \
    git \
    curl \
    wget \
    zip \
    unzip zip

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ARG extensions="gd xdebug intl exif opcache pdo_mysql amqp openssl pdo_pgsql pgsql"

RUN install-php-extensions ${extensions}

RUN composer global require \
        phpstan/phpstan \
        phpunit/phpunit \
        squizlabs/php_codesniffer 
        
WORKDIR /var/www
