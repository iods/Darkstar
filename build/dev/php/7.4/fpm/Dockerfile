ARG PHP_TAG=7.4-fpm
FROM php:$PHP_TAG

RUN \
    apt-get update \
    && apt-get install -y \
        git \
        unzip \
        zip

COPY --from=composer:1.9.3 /usr/bin/composer /usr/bin/composer

ADD config/docker/php/php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /app

CMD ["php-fmp"]