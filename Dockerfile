FROM php:8.1-apache

# Enable required Apache modules
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite

# Copy all files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
