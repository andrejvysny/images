FROM php:8.1-apache
RUN apt-get update && apt-get install -y curl nano unzip zip iputils-ping

COPY index.php /var/www/html/index.php

EXPOSE 8080