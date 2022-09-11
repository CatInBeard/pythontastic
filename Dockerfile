FROM php:8.1.0-fpm

RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
		ssh sshpass \
	&& docker-php-ext-configure zip\
	&& docker-php-ext-install zip \
	&& docker-php-ext-install mysqli \
	&& docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY --chown=www-data:www-data src .

RUN composer install

RUN php artisan key:generate

ENTRYPOINT php-fpm