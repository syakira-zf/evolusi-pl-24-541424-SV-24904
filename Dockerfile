FROM php:8.2-cli-bookworm

# Install ekstensi PHP yang dibutuhkan Laravel + SQLite
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

# Ambil Composer dari image resmi Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Salin file dependency terlebih dahulu agar Docker cache bekerja
COPY composer.json composer.lock ./

# Install dependency sebelum source code disalin
RUN composer install \
    --no-dev \
    --no-scripts \
    --prefer-dist \
    --no-interaction \
    --no-progress

# Baru salin seluruh source code aplikasi
COPY . .

# Siapkan Laravel
RUN composer dump-autoload --optimize \
    && cp .env.example .env \
    && php artisan key:generate \
    && touch database/database.sqlite \
    && php artisan migrate --seed --force \
    && php artisan storage:link

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]