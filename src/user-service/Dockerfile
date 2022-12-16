ARG ALPINE_VERSION=3.16
FROM alpine:${ALPINE_VERSION}
LABEL Maintainer="Tim de Pater <code@trafex.nl>"
LABEL Description="Lightweight container with Nginx 1.22 & PHP 8.1 based on Alpine Linux."
# Setup document root
WORKDIR /var/www/html
COPY . /var/www/html

# Install packages and remove default server definition
RUN apk add --no-cache \
  curl \
  nginx \
  php81 \
  php81-ctype \
  php81-curl \
  php81-dom \
  php81-fpm \
  php81-gd \
  php81-intl \
  php81-mbstring \
  php81-mysqli \
  php81-pdo \
  php81-pdo_mysql \
  php81-fileinfo \
  php81-redis \
  php81-opcache \
  php81-openssl \
  php81-phar \
  php81-session \
  php81-xml \
  php81-xmlreader \
  php81-sodium \
  php81-tokenizer \
  php81-xmlwriter \
  supervisor

# Create symlink so programs depending on `php` still function
RUN ln -s /usr/bin/php81 /usr/bin/php

# Configure nginx
COPY deployment/nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY deployment/fpm-pool.conf /etc/php81/php-fpm.d/www.conf
COPY deployment/php.ini /etc/php81/conf.d/custom.ini

# Configure supervisord
COPY deployment/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Make sure files/folders needed by the processes are accessable when they run under the nobody user
# RUN chown -R nobody:nobody /var/www/html /run /var/lib/nginx /var/log/nginx

# Switch to use a non-root user from here on
# USER nobody

# Add application

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# RUN addgroup -g 1000 www

# RUN adduser -u www -s -G www www

RUN chown -R nobody:nobody . /run /var/lib/nginx /var/log/nginx

USER nobody

# Copy existing application directory contents
# COPY . /var/www/html

# Copy existing application directory permissions

# Composer install
RUN composer install --optimize-autoloader --no-interaction --no-progress

# Set /storage /public permission to public
RUN chmod -R 777 storage/ public/

EXPOSE 8080

# Let supervisord start nginx & php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

