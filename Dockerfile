# Utilise une image officielle PHP avec Apache
FROM php:8.2-apache

# Installe les extensions nécessaires
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libonig-dev libzip-dev zip \
    nodejs npm curl \
    && docker-php-ext-install intl pdo pdo_mysql zip

# Installe Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installe Yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
  && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
  && apt-get update && apt-get install -y yarn

# Copie tout le code dans le container
COPY . /var/www/html/

# Active le mod_rewrite d'Apache
RUN a2enmod rewrite

# Donne les bonnes permissions
RUN chown -R www-data:www-data /var/www/html/var

# Installe les dépendances PHP et JS
RUN cd /var/www/html && composer install && yarn install && yarn build

# Port exposé
EXPOSE 80
