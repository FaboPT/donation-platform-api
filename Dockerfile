FROM php:8.4-fpm-alpine
RUN apk update && apk add libzip-dev libpng-dev
RUN docker-php-ext-install pdo_mysql gd zip opcache
