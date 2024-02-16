FROM php:8.0-fpm-alpine3.15

RUN if [[ -n ${http_proxy} ]]; then pear config-set http_proxy "$http_proxy"; fi

RUN apk add --no-cache --update linux-headers \
    && apk add --no-cache $PHPIZE_DEPS

RUN pecl install xdebug && pecl clear-cache \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache libmcrypt-dev \
    && pecl install mcrypt-1.0.4 && pecl clear-cache\
    && docker-php-ext-enable mcrypt

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

USER www-data:www-data

WORKDIR /var/www/backend

COPY --chown=www-data:www-data . .

RUN composer install --no-dev
