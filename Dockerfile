FROM php:8.3-fpm

ARG user=www-data
ARG uid=1000

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN id -u ${user} || useradd -G www-data,root -u $uid -d /home/$user $user

RUN mkdir -p \
    storage/app/public \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/testing \
    storage/framework/views \
    storage/logs && \
    touch \
    storage/app/.gitignore \
    storage/app/public/.gitignore \
    storage/framework/.gitignore \
    storage/framework/cache/.gitignore \
    storage/framework/sessions/.gitignore \
    storage/framework/testing/.gitignore \
    storage/framework/views/.gitignore \
    storage/logs/.gitignore

WORKDIR /var/www

USER $user