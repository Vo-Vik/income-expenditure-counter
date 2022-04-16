FROM php:7.2.34-apache
LABEL maintainer="your_email@gmail.com"
#WORKDIR /var/www/html
#ADD . /var/www/html

COPY ./mysite.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update
RUN apt-get install -y git

#RUN apt-get install -y libmcrypt-dev
#RUN pecl install mcrypt-1.0.2
#RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql

#RUN curl -sS https://getcomposer.org/installer | php -- --filename=composer

#RUN ./composer install --no-plugins --no-scripts --no-dev --prefer-dist

ADD after_mount.sh /usr/local/bin/after_mount.sh
RUN chmod 777 /usr/local/bin/after_mount.sh

CMD /usr/local/bin/after_mount.sh && tail -F /var/log/apache2/error.log

#RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
#    a2enmod rewrite &&\
#    service apache2 restart




