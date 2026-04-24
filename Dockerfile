FROM php:7.4-apache

# Install PHP extensions yang dibutuhkan CI3
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libzip-dev libxml2-dev libcurl4-openssl-dev \
    libonig-dev libicu-dev \
    unzip git curl \
    && docker-php-ext-install mysqli pdo pdo_mysql gd zip curl xml mbstring intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable mod_rewrite untuk CI3
RUN a2enmod rewrite

# Set document root
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Copy Apache config
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Copy entrypoint
COPY docker/entrypoint.sh /entrypoint.sh
RUN sed -i 's/\r//' /entrypoint.sh && chmod +x /entrypoint.sh

# Copy aplikasi
COPY . /var/www/html/

# Set permission
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/application/cache \
    && chmod -R 777 /var/www/html/application/logs

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
