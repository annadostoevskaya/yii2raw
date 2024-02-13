FROM php:8.0-alpine3.16

WORKDIR /app

COPY . /app

RUN if [[ -n ${http_proxy} ]]; then pear config-set http_proxy "$http_proxy"; fi

RUN apk add --no-cache --update linux-headers \
    && apk add --no-cache $PHPIZE_DEPS

RUN pecl install xdebug && pecl clear-cache \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache libmcrypt-dev \
    && pecl install mcrypt-1.0.4 && pecl clear-cache\
    && docker-php-ext-enable mcrypt

COPY --from=composer:2.7 /usr/bin/composer /usr/local/bin/composer
# --no-interaction --no-plugins --no-scripts --no-dev --prefer-dist
RUN composer install 

RUN docker-php-ext-install pdo pdo_mysql mysqli

CMD ["-S", "0.0.0.0:8080", "-t", "/app/public"]
