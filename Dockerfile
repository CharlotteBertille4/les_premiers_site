FROM php:8.2.12-cli

# Installer les dépendances système de base
RUN apt-get update && apt-get install -y \
    git unzip curl zip gnupg2 \
    libicu-dev libonig-dev libzip-dev libxml2-dev \
    libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer Node.js (version LTS) via NodeSource
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g yarn \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le dossier de travail
WORKDIR /app

# Copier les fichiers composer pour profiter du cache Docker
COPY composer.json composer.lock ./

# Installer les dépendances PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Copier les fichiers yarn pour profiter du cache Docker
COPY package.json yarn.lock ./

# Installer les dépendances JS
RUN yarn install

# Copier tout le reste des fichiers
COPY . .

# Builder le frontend
RUN yarn build

# Commande par défaut pour lancer le serveur PHP
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
