# =========================================================
# STAGE 1: BUILD
# =========================================================
FROM php:8.2.34-cli-alpine3.24 AS builder

WORKDIR /var/www/html

# Install dependency yang dibutuhkan saat proses build
RUN apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    sqlite-dev \
    && docker-php-ext-install pdo_sqlite zip

# Ambil Composer dengan versi yang sudah dikunci
COPY --from=composer:2.10.3 /usr/bin/composer /usr/bin/composer

# Salin dependency terlebih dahulu supaya cache tetap bekerja
COPY composer.json composer.lock ./

# Install dependency Laravel
RUN composer install \
    --no-dev \
    --no-scripts \
    --prefer-dist \
    --no-interaction \
    --no-progress

# Baru salin seluruh source code aplikasi
COPY . .

# Siapkan Laravel dan database
RUN composer dump-autoload --optimize \
    && cp .env.example .env \
    && php artisan key:generate \
    && touch database/database.sqlite \
    && php artisan migrate --seed --force \
    && php artisan storage:link


# =========================================================
# STAGE 2: RUNTIME
# =========================================================
FROM php:8.2.34-cli-alpine3.24 AS runtime

WORKDIR /var/www/html

# Install hanya dependency yang dibutuhkan saat aplikasi berjalan
RUN apk add --no-cache \
    curl \
    libzip-dev \
    sqlite-dev \
    && docker-php-ext-install pdo_sqlite zip \
    && apk del libzip-dev sqlite-dev

# Ambil hasil aplikasi dari stage builder
COPY --from=builder /var/www/html /var/www/html

# Pastikan folder yang digunakan Laravel bisa ditulis oleh user aplikasi
RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache \
    database \
    public

# Container berjalan sebagai user non-root
USER www-data

# Port yang digunakan Laravel
EXPOSE 8000

# Cek apakah aplikasi Laravel bisa diakses
HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
    CMD curl -f http://127.0.0.1:8000/ || exit 1

# Jalankan aplikasi Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]