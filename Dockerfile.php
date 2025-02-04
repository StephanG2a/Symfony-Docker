FROM php:8.3.11
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN curl -sSL https://getcomposer.org/installer | php -- --filename=composer --install-dir=/usr/local/bin 
RUN curl -sSL https://get.symfony.com/cli/installer | bash
RUN apt update && apt install -y zip git libicu-dev locales
RUN docker-php-ext-install opcache intl pdo_mysql
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
RUN locale-gen fr_FR.UTF-8
WORKDIR /app
COPY ./composer.json .
COPY . .
RUN composer install
RUN symfony server:ca:install
CMD ["symfony", "serve"]