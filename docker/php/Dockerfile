FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libonig-dev libpng-dev libjpeg-dev libfreetype6-dev libxml2-dev libicu-dev libssl-dev g++ \
    && docker-php-ext-install pdo_mysql zip bcmath intl pcntl \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install gd \
    && pecl install mongodb redis \
    && docker-php-ext-enable mongodb redis \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia todo el código y luego instala dependencias
COPY . /var/www/html

RUN composer install --no-interaction --prefer-dist --optimize-autoloader || true

RUN php artisan key:generate || true

RUN chown -R www-data:www-data /var/www/html && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

EXPOSE 9000
CMD ["php-fpm"]
