FROM php:8.1-fpm

RUN apt-get update && apt-get install -y curl libcurl3-dev libicu-dev libmemcached-dev libxml2-dev libjpeg-dev \
    libpng-dev libfreetype6-dev libsodium-dev libxslt-dev libzip-dev libonig-dev openssl zip unzip
RUN pecl install redis apcu memcached pcov

RUN docker-php-ext-configure zip 
RUN docker-php-ext-install curl 
RUN docker-php-ext-install gd 
RUN docker-php-ext-install intl 
RUN docker-php-ext-install mbstring 
RUN docker-php-ext-install opcache 
RUN docker-php-ext-install pdo_mysql 
RUN docker-php-ext-install session 
RUN docker-php-ext-install sodium 
RUN docker-php-ext-install xml 
RUN docker-php-ext-install xsl 
RUN docker-php-ext-install zip

RUN docker-php-ext-enable apcu curl gd intl mbstring memcached opcache pdo_mysql session redis xml xsl zip

RUN echo "extension=pcov.so" > $PHP_INI_DIR/conf.d/pcov.ini

RUN echo "$(curl -sS https://composer.github.io/installer.sig) -" > composer-setup.php.sig \
        && curl -sS https://getcomposer.org/installer | tee composer-setup.php | sha384sum -c composer-setup.php.sig \
        && php composer-setup.php && rm composer-setup.php* \
        && chmod +x composer.phar && mv composer.phar /usr/bin/composer

COPY symfony.ini /usr/local/etc/php/conf.d
COPY symfony.pool.conf /etc/php7/php-fpm.d/www.conf

RUN mkdir -p /var/app/cache && chmod 777 /var/app/cache
RUN mkdir -p /var/app/log && chmod 777 /var/app/log
RUN mkdir -p /var/www/uploads && chmod 777 /var/www/uploads

CMD ["php-fpm", "-F"]

WORKDIR /var/www/app

EXPOSE 9000
