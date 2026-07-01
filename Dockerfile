# Stage 1: Builder stage
FROM php:8.2-fpm as builder

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files and install dependencies, ignoring platform requirements for extensions
COPY composer.json composer.lock ./
COPY bootstrap ./bootstrap
RUN composer install --no-dev --no-interaction --no-progress --optimize-autoloader \
    --no-scripts \
    --ignore-platform-req=ext-mongodb --ignore-platform-req=ext-exif

# Stage 2: Node builder for frontend assets
FROM node:22-alpine as node-builder

WORKDIR /app

COPY package.json ./
RUN npm install

COPY vite.config.js tsconfig.json* ./
COPY resources ./resources
COPY public ./public

RUN npm run build

# Stage 3: Runtime stage
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    sqlite3 \
    libsqlite3-0 \
    gcc \
    make \
    pkg-config \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite bcmath exif \
    && apt-get remove -y gcc make pkg-config libsqlite3-dev \
    && apt-get autoremove -y \
    && rm -rf /var/lib/apt/lists/*

# Copy PHP configuration
RUN echo "memory_limit = 512M" >> /usr/local/etc/php/conf.d/docker.ini && \
    echo "max_execution_time = 120" >> /usr/local/etc/php/conf.d/docker.ini

WORKDIR /app

# Copy application from builder
COPY --from=builder /app/vendor ./vendor
COPY --from=builder /app/bootstrap ./bootstrap

# Copy built assets from node-builder
COPY --from=node-builder /app/public/build ./public/build
COPY --from=node-builder /app/public ./public

# Copy application code
COPY app ./app
COPY config ./config
COPY database ./database
COPY routes ./routes
COPY src ./src
COPY resources ./resources
COPY storage ./storage
COPY bootstrap ./bootstrap
COPY artisan ./.env* ./

# Set proper permissions
RUN chown -R www-data:www-data /app && \
    chmod -R 755 /app/storage

# Create necessary directories
RUN mkdir -p /app/database && \
    touch /app/database/database.sqlite && \
    chown www-data:www-data /app/database/database.sqlite

EXPOSE 9000

CMD ["php-fpm"]
