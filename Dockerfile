FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    zip unzip curl gnupg git libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql gd

# Install Node.js and Grunt
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g grunt-cli

# Set working directory
WORKDIR /var/www/html

# Copy existing application
COPY . .

# Install PHP dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies and Grunt locally
RUN npm install && npm install grunt --save-dev

# Expose port
EXPOSE 9000

CMD ["php-fpm"]