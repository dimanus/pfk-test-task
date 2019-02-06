FROM yiisoftware/yii2-php:7.2-apache

RUN a2enmod rewrite

WORKDIR /app
ADD composer.lock composer.json /app/
ADD web/ /app/

RUN composer install --prefer-dist --optimize-autoloader --no-dev && \
    composer clear-cache

RUN mkdir -p runtime web/assets && \
    chmod -R 775 runtime web/assets && \
    chown -R www-data:www-data runtime web/assets
