FROM hermsi/alpine-fpm-php:7.3.0

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN sed -i 's/;opcache.enable=1/opcache.enable=0/g' /usr/local/etc/php/php.ini
RUN echo 'max_execution_time=120' >> /usr/local/etc/php/conf.d/php.ini
RUN echo 'memory_limit=512M' >> /usr/local/etc/php/conf.d/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 9000
CMD ["php-fpm", "-F"]
