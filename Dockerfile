FROM php:8.0-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo_mysql

RUN apk add --no-cache zip libzip-dev
RUN docker-php-ext-install zip

RUN apk add --no-cache libpng libpng-dev && docker-php-ext-install gd && apk del libpng-dev