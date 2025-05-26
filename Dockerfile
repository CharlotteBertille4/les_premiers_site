# Étape 1 : Utilisation de Node.js + Debian slim comme base
FROM node:18-bullseye-slim

# Variables d'environnement
ENV APP_ENV=prod
WORKDIR /app

# 📦 Installation des dépendances système PHP, Composer, GPG (pour Yarn)
RUN apt-get update && apt-get install -y \
    php-cli php-mbstring php-xml php-intl php-curl php-mysql php-sqlite3 \
    php-zip php-bcmath php-tokenizer php-json php-common php-gd php-dom \
    php-pdo php-pdo-mysql php-soap php-ctype php-opcache php-readline \
    unzip curl git gnupg \
    && rm -rf /var/lib/apt/lists/*

# 📥 Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# 📥 Installation de Yarn (sans apt-key)
RUN curl -fsSL https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor -o /usr/share/keyrings/yarn-archive-keyring.gpg && \
    echo "deb [signed-by=/usr/share/keyrings/yarn-archive-keyring.gpg] https://dl.yarnpkg.com/debian/ stable main" \
    | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && apt-get install -y yarn

# 📁 Copie du projet Symfony
COPY . .

# 🔧 Installation des dépendances PHP et JS
# Par ces lignes séparées :
    RUN composer install --no-dev --optimize-autoloader
    RUN yarn install
    RUN yarn build
    
# 📂 Symfony stocke les fichiers web ici
EXPOSE 8000

# ▶️ Lancement du serveur Symfony (adapté pour Render)
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
