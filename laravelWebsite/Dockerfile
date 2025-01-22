FROM docker.io/php:8.3-fpm

# Provides install-php-extensions
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install system dependencies and build tools
RUN apt-get update && apt-get install -y \
    build-essential \
    git \
    zip \
    unzip \
    curl \
    libcurl4-openssl-dev \
    libxml2-dev \
    libonig-dev \
    libssl-dev \
    zlib1g-dev \
    libgrpc-dev \
    libtool \
    autoconf \
    automake \
    nodejs \
    npm \
    libpq-dev \
    protobuf-compiler

# Install PHP Extensions
RUN docker-php-ext-install pgsql pdo_pgsql soap xml curl

# Install gRPC from PECL, Takes two eternities
RUN install-php-extensions grpc

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
