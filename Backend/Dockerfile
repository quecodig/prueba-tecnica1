FROM php:8.3-apache

RUN echo "error_log = /dev/stderr" >> /usr/local/etc/php/conf.d/docker-php-errors.ini
# Actualiza paquetes del sistema para corregir vulnerabilidades
RUN apt-get update && apt-get upgrade -y && apt-get clean

# Instala extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Copia el código fuente
COPY . /var/www/html/

# Habilita mod_rewrite para Apache
RUN a2enmod rewrite

# Configura Apache para permitir .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

EXPOSE 80