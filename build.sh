#!/usr/bin/env bash
# build.sh

set -o errexit

# Installer les dépendances
composer install --no-dev --optimize-autoloader

# Vider et réchauffer le cache
php bin/console cache:clear --no-warmup --env=prod
php bin/console cache:warmup --env=prod

# Exécuter les migrations
php bin/console doctrine:migrations:migrate --no-interaction --env=prod

# Installer les assets
php bin/console assets:install public --env=prod