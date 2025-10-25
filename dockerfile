FROM php:8.2-apache

# Instalar extensiones necesarias (PDO y PostgreSQL)
RUN docker-php-ext-install pdo pdo_pgsql

# Copiar archivos al contenedor
COPY . /var/www/html/

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
