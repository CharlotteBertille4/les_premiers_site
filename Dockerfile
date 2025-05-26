FROM php:8.2-cli

# Installe les dépendances système
RUN apt-get update && apt-get install -y \
    git unzip curl zip gnupg2 \
    libicu-dev libonig-dev libzip-dev libxml2-dev \
    libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    nodejs npm

# Installe Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installe Yarn
RUN npm install -g yarn

# Définit le dossier de travail
WORKDIR /app

# Copie tous les fichiers
COPY . .

# Installe les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Installe les dépendances JS
RUN yarn install
RUN yarn build

# Commande par défaut
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
