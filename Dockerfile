FROM php:8.1-fpm

LABEL maintainer="Carlos Cativo <cativo23.kt@gmail.com>"

# Arguments defined in docker-compose.yml
ARG user
ARG uid
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

#Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    zlib1g-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    supervisor \
    vim \
    unzip \
    gnupg2

# Clean
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-source delete

# Install redis extension
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Get latest composers
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add user for laravel application
RUN useradd -u $uid -ms /bin/bash -G www-data,root -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Copy code to /var/www
COPY --chown=$user:www-data ./ /var/www

RUN ls /var/www

# add root to www group
RUN chmod -R ug+w /var/www/storage

# Copy php/supervisor configs
COPY ./docker/supervisor/supervisord.conf /etc/supervisord.conf
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/app.ini

# Set working directory
WORKDIR /var/www

# Deployment steps
RUN composer install --optimize-autoloader --no-dev

EXPOSE 9000
RUN ls
COPY docker/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

ENTRYPOINT ["/usr/local/bin/entrypoint"]

