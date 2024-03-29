# Use the official PHP 8.0 image as the base image
FROM php:8.0

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-openssl-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

RUN npm install

WORKDIR /var/www/html

COPY . .

COPY --from=composer:2.3.5 /usr/bin/composer /usr/local/bin/composer

ENV PORT=443
RUN chmod +x Docker/entrypoint.sh
ENTRYPOINT [ "Docker/entrypoint.sh" ]