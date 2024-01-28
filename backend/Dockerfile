FROM php:8.0-alpine3.16

WORKDIR /app

COPY . /app

# && pear config-set http_proxy $http_proxy \

RUN apk add --no-cache --update linux-headers $PHPIZE_DEPS \
    && pecl install xdebug && pecl clear cache \
    && docker-php-ext-enable xdebug 

RUN apk add --no-cache libmcrypt-dev \
    && pecl install mcrypt-1.0.4 && pecl clear-cache\
    && docker-php-ext-enable mcrypt

RUN cp utils/composer.phar /usr/local/bin/composer && composer install

RUN docker-php-ext-install pdo pdo_mysql mysqli

CMD ["-S", "0.0.0.0:8080", "-t", "/app/public"]
