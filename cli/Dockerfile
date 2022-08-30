FROM php:8.1-fpm

RUN apt update && apt upgrade -y 

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www