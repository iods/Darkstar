FROM php:7.4-fpm

LABEL maintainer="containers@darksociety.cloud"

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN \
    set -xeu \
    && apt-get update -q \
    && apt-get install -qq -y \
        curl \
        git \
        unzip \
        zip; \
    install-php-extensions \
        bcmath \
        gd \
        redis; \
    apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN \
    apt-get update \
    && apt-get install -y \
        node-gyp; \
    apt-get install -y \
        nodejs \
        npm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_MEMORY_LIMIT -1
ENV PATH bin:vendor/bin:$PATH

RUN chmod +x /usr/local/bin/composer

WORKDIR /var/www

USER www-data