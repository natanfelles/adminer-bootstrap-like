FROM natanfelles/php-base
COPY . /var/www
WORKDIR /var/www
RUN composer install --no-dev
CMD ["php", "-S", "[::]:8080", "-t", "/var/www/public"]
EXPOSE 8080
