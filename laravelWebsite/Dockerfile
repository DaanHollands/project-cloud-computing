FROM docker.io/php:8.3-fpm

# Install system dependencies and build tools
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    libcurl4-openssl-dev \
    libxml2-dev \
    libonig-dev \
    libssl-dev \
    zlib1g-dev \
    libtool \
    autoconf \
    automake \
    nodejs \
    npm \
    libpq-dev \
    protobuf-compiler \
    && docker-php-ext-install pgsql pdo_pgsql soap xml curl

# Install gRPC and PHP dependencies
RUN apt-get install -y \
    libgrpc-dev \
    && pecl install grpc \
    && docker-php-ext-enable grpc

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /app

# Install Laravel dependencies
COPY . /app
RUN composer install --no-interaction --optimize-autoloader
RUN npm install

# Expose port 8000 and start Laravel
EXPOSE 8000
EXPOSE 5173
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
RUN chmod +x ./start.sh
CMD ["./start.sh"]
