FROM php:7.4-fpm

RUN \
    apt-get update \
    && apt-get install -y \
        git \
        unzip \
        zip

COPY --from=composer:1.9.3 /usr/bin/composer /usr/bin/composer

COPY config/docker/php/php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www

CMD ["php-fpm"]
