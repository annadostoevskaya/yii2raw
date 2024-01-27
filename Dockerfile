FROM php:8.0-alpine3.16

WORKDIR /app

COPY . /app

RUN cp utils/composer.phar /usr/local/bin/composer 

WORKDIR /app/backend

RUN apk add --no-cache libmcrypt-dev $PHPIZE_DEPS \
    && pear config-set http_proxy $http_proxy \
    && pecl install mcrypt-1.0.4 && docker-php-ext-enable mcrypt \
    && composer install

