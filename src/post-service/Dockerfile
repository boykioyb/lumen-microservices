FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        git \
        iputils-ping \
        zip \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql
# Set working directory
WORKDIR /var/www/post-service


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/post-service

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/post-service

# Change current user to www
USER www

# Composer install
RUN composer install
RUN composer update --no-scripts
RUN composer dump-autoload

# Set /storage /public permission to public
RUN chmod -R 777 storage/ public/



# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
