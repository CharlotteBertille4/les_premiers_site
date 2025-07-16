# 🎓 Site Web d'École – Projet Symfony

Ce projet est un site web dynamique pour un établissement scolaire, développé avec le framework **Symfony**. Il permet la gestion des informations publiques de l’école ainsi qu’un panneau d’administration sécurisé.

---

## 🚀 Fonctionnalités principales

- 🏫 Présentation de l’établissement (histoire, vision, valeurs, équipe)
- 📚 Liste des formations proposées
- 📰 Publication d’actualités et événements scolaires
- 📷 Galerie photos
- 📞 Formulaire de contact
- 🔐 Panneau d’administration sécurisé (CRUD complet)
- 📱 Design responsive (mobile / tablette / desktop)

---

## 🛠️ Technologies utilisées

- PHP 8+ / Symfony 6
- Twig pour le templating
- Doctrine ORM pour la base de données
- Bootstrap pour le front-end
- MySQL pour la base de donnees
- Webpack Encore pour la gestion des assets

---

## Installation

### Etape 1 : Cloner le projet

- ` gitlab.com/Bertille6/lespremiers_site`

### Etape 2 : Installation des dépendances.
- `composer install`  à la racine du projet

### Etape 3 : Configuration de la Base de Données.
- `créer un fichier .env.local`  à la racine du projet et copier tout le contenu du fichier `.env`
  et modifier la ligne commançant par DATABASE_URL en mettant les parametres pour acceder a votre SGBDR

### Etape 4 : Création de la Base de Données.
- `symfony console doctrine:database:create`  à la racine du projet

### Etape 5 : Création des tables Base de Données en executant les migrations.
- `symfony console doctrine:migrations:migrate`  à la racine du projet

### Etape 6 : Lancement de l'application.
- `symfony serve`  à la racine du projet

## Contribution

Si vous souhaiter contribuer, Merci de consulter [contributing.md](contributing.md) pour plus de détail.

## Crédits

- [Charlotte TOMENOU ][Maintenance du code charlottetomenou@gmail.com - 01 40 04 38 39]

## Licence

Copyright **Charly_dev**. Veuillez consulter la [licence](#) pour plus d'information.