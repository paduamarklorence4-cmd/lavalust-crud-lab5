FROM php:8.2-apache

# Enable Apache mod_rewrite for LavaLust's .htaccess routing
RUN a2enmod rewrite

# Install PDO MySQL extension (required for Aiven MySQL connection)
RUN docker-php-ext-install pdo pdo_mysql

# Point Apache's document root to the /public folder (LavaLust's web root)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Allow .htaccess overrides (needed for LavaLust routing to work)
RUN sed -ri -e '0,/AllowOverride None/s//AllowOverride All/' /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project files into the container
COPY . /var/www/html

WORKDIR /var/www/html

# Install PHP dependencies (skip if no composer.json)
RUN if [ -f composer.json ]; then composer install --no-dev --optimize-autoloader --no-interaction; fi

# Ensure proper permissions
RUN chown -R www-data:www-data /var/www/html

# Render provides a dynamic $PORT env var — Apache must listen on it
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]