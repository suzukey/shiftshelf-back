FROM php:7.4.8-fpm-alpine

ENV PROJECT_ROOTDIR /var/www/

WORKDIR $PROJECT_ROOTDIR

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:1.10.9 /usr/bin/composer /usr/bin/composer

COPY ./docker/php-fpm/config/php.ini /usr/local/etc/php/php.ini
COPY . $PROJECT_ROOTDIR

RUN composer install
