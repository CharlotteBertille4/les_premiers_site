FROM php:8.2.12-cli

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git unzip curl zip gnupg2 \
    libicu-dev libonig-dev libzip-dev libxml2-dev \
    libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    nodejs npm

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Définir le dossier de travail
WORKDIR /lespremiers_site

# Copier les fichiers nécessaires AVANT le composer install
COPY composer.json composer.lock ./

# Vérifie que Composer fonctionne (optionnel pour debug)
RUN composer --version

# Installer les dépendances PHP
RUN composer install --no-scripts --no-interaction --prefer-dist --optimize-autoloader
RUN which composer


# Copier tout le reste
COPY . .

# Installer les dépendances JS et build
RUN npm install -g yarn \
    && yarn install \
    && yarn build

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
