FROM php:7.4-fpm

RUN \
    apt-get update \
    && apt-get install -y \
        apt-utils \
        build-essential \
        curl \
        git \
        jpegoptim \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        nano \
        optipng \
        pngquant \
        supervisor \
        unzip \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


COPY --from=composer:1.9.3 /usr/bin/composer /usr/bin/composer

COPY config/docker/php/php.ini /usr/local/etc/php/conf.d/40-custom.ini

RUN usermod -u 1000 www-data

WORKDIR /var/www

CMD ["php-fpm"]
