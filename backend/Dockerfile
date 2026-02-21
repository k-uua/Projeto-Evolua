FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git unzip zip libzip-dev \
  && docker-php-ext-install pdo pdo_mysql zip \
  && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Cria diretórios padrão (não quebra se já existirem)
RUN mkdir -p /var/www/storage/framework/cache \
    /var/www/storage/framework/views \
    /var/www/storage/framework/sessions \
    /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache