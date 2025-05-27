FROM php:8.2.12-cli

# Dépendances système
RUN apt-get update && apt-get install -y \
    git unzip curl zip gnupg2 \
    libicu-dev libonig-dev libzip-dev libxml2-dev \
    libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    nodejs npm

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Yarn
RUN npm install -g yarn

# Dossier de travail (adapter à ton projet)
WORKDIR /lespremiers_site

# Copier les fichiers composer pour profiter du cache Docker
COPY composer.json composer.lock ./

# Installer les dépendances PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copier le reste du projet
COPY . .

# Installer les dépendances JS
RUN yarn install
RUN yarn build

# Lancer le serveur PHP (à adapter si besoin)
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
