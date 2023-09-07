# Images ready to use!

![PHP-CLI](https://github.com/andrejvysny/images/actions/workflows/php-cli.yml/badge.svg)
![PHP-APACHE](https://github.com/andrejvysny/images/actions/workflows/php-apache.yml/badge.svg)

![Nginx-HelloWorld](https://github.com/andrejvysny/images/actions/workflows/nginx-hello-world.yml/badge.svg)

# Available Images

---
### PHP - Cli
```
ghcr.io/andrejvysny/php-cli:8.1
```
- Composer
- PHP Extensions: `gd xdebug intl exif opcache pdo_mysql amqp`
- phpstan
- phpunit
- squizlabs/php_codesniffer

### PHP - Apache
```
ghcr.io/andrejvysny/php-apache:8.1
```
- Document root: `/var/www/html/public`
- Composer
- PHP Extensions: `gd intl exif opcache pdo_mysql amqp`
- Port: 80

---

### Nginx - Hello World
```
ghcr.io/andrejvysny/nginx-hello-world:latest
```
- Image for testing web.
- Document root: `/usr/share/nginx/html`
- Port: 80



### Python Flask - Rest API Example
```
ghcr.io/andrejvysny/python-rest-api:latest
```
- Image for testing rest api.
- Port: 80