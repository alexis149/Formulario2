# Imagen base con Apache y PHP 8.2
FROM php:8.2-apache

# Instalar extensiones necesarias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html/

# Configurar permisos para Apache
RUN chown -R www-data:www-data /var/www/html

# Habilitar el módulo de Apache para reescritura (opcional si usas .htaccess)
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80
