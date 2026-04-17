FROM php:8.4-fpm

# ---------------------------
# System dependencies
# ---------------------------
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpq-dev libonig-dev libzip-dev \
    gnupg \
    ca-certificates \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# ---------------------------
# Install Composer
# ---------------------------
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ---------------------------
# Install Node.js + npm (VITE SUPPORT)
# ---------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# ---------------------------
# App setup
# ---------------------------
WORKDIR /var/www

COPY . .

# ---------------------------
# Install PHP dependencies
# ---------------------------
RUN composer install --no-interaction --prefer-dist

# ---------------------------
# Install JS dependencies + build Vite
# ---------------------------
RUN npm install
RUN npm run build

# ---------------------------
# Permissions
# ---------------------------
RUN chown -R www-data:www-data /var/www

# ---------------------------
# Start PHP-FPM
# ---------------------------
CMD ["php-fpm"]
