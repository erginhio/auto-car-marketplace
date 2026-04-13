FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libzip-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install

# Install frontend dependencies and build
RUN npm install && npm run build

# Permissions
RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]
