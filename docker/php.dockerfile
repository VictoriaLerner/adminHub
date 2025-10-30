FROM php:8.2-fpm-alpine
# Create the application directory
RUN mkdir -p /var/www/html

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql


# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
