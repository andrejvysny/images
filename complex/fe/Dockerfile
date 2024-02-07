FROM php:8.1-apache

RUN apt-get update && apt-get install -y curl nano unzip zip iputils-ping
COPY ./index.php /var/www/html/index.php
COPY ./functions.php /var/www/html/functions.php
COPY ./style.css /var/www/html/style.css
COPY ./script.js /var/www/html/script.js


EXPOSE 80