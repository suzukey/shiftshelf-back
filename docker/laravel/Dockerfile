FROM composer:2.0.8 as build
WORKDIR /app

COPY database/ database/
COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist

FROM php:7.4.8-apache-buster
RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 8080

COPY . /var/www/
COPY --from=build /app/vendor/ /var/www/vendor/
COPY docker/laravel/config/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN chmod 777 -R /var/www/storage/ && \
    echo "Listen 8080" >> /etc/apache2/ports.conf && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite
