FROM php:7.4-cli

LABEL maintainer="containers@darksociety.cloud"

ENV DEBIAN_FRONTEND noninteractive

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN \
    set -xeu \
    && apt-get update -q \
    && apt-get install -qq -y \
        curl \
        git \
        libsqlite3-dev \
        libzip-dev \
        unzip \
        zip \
        zlib1g-dev; \
    install-php-extensions \
        bcmath \
        gd \
        pdo_mysql \
        pdo_sqlite \
        redis \
        zip; \
    apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_MEMORY_LIMIT -1
RUN composer global require phpunit/phpunit ^9.0 --no-progress --no-scripts --no-interaction

RUN \
    pecl install xdebug \
    && echo 'zend_extension="/usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so"' > \
        /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && php -m | grep xdebug

ENV PATH bin:vendor/bin:$PATH

CMD ["phpunit"]