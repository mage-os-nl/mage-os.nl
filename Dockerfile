FROM php:8.2-apache

ARG uid

RUN a2enmod rewrite
ENV PHP_MEMORY_LIMIT=-1

ENV APACHE_DOCUMENT_ROOT=/var/www/html/pub
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN usermod -u ${uid} www-data && groupmod -g ${uid} www-data
