FROM php:8.1-apache
RUN apt-get update && apt-get install -y curl nano unzip zip iputils-ping

COPY ./index.php /var/www/html/index.php
COPY ./ports.conf /etc/apache2/ports.conf
EXPOSE 8080