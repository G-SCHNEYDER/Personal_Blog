FROM zareef/php81-apache

RUN a2enmod rewrite
RUN apt-get update \
  && apt-get install -y libzip-dev git wget --no-install-recommends \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install pdo mysqli pdo_mysql zip;
RUN wget https://getcomposer.org/download/2.5.8/composer.phar \ 
  && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer

RUN apt-get clean && apt-get update
RUN apt-get upgrade -y && \
    apt-get install -y nodejs \
    npm      

COPY docker/apache.conf /etc/apache2/sites-enabled/000-default.conf
COPY docker/entrypoint.sh /entrypoint.sh
# COPY . /var/www

WORKDIR /var/www

CMD ["apache2-foreground"]

RUN npm install

RUN chmod +x /entrypoint.sh
# RUN chown -R www-data:www-data var/

ENTRYPOINT ["/entrypoint.sh"]