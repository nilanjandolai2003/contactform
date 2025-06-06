FROM php:8.1-apache

# Enable mod_rewrite (if needed)
RUN a2enmod rewrite

# Copy everything into the container
COPY . /var/www/html/

# Change DocumentRoot to 'public'
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set working dir
WORKDIR /var/www/html

# Permissions (optional)
RUN chown -R www-data:www-data /var/www/html
