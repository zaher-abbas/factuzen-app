<h1>FactuZen App</h1>
# 📇 Symfony Client & Invoice Manager

FactuZen, une application Symfony conçue pour gérer les clients, et les factures d’un indépendant ou d’une petite entreprise.


![Symfony](https://img.shields.io/badge/Symfony-7.3-4a4a55?style=flat&logo=symfony)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=flat&logo=php)
![Doctrine ORM](https://img.shields.io/badge/Doctrine-ORM-orange?style=flat)
![Twig](https://img.shields.io/badge/Twig-3.x-6DB33F?style=flat)
![SQLite](https://img.shields.io/badge/SQLite-DB-003B57?style=flat&logo=sqlite)

Application Symfony 7 permettant de gérer des clients et leurs factures, avec rendu Twig. et base de données MySQL.

---

## 🧰 Prérequis

- PHP 8.2+
- Composer: https://getcomposer.org/download/
- Serveur MySQL en fonctionnement
- Symfony CLI: https://symfony.com/download

---

## 🚀 Installation

1) Cloner le dépôt
```
bash
git clone https://github.com/zaher-abbas/factuzen-app.git
cd factuzen-app
```
2) Installer les dépendances
```
bash
composer install
```
3) Configuration de l’environnement (local)
```
bash
bash cp .env .env.local
```
- Dans .env.local définissez au minimum `DATABASE_URL` l'URL de connexion à votre base de données MySQL


4) Créer la base et exécuter les migrations
```
bash
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
```
5) Lancer le serveur de développement
```
bash
symfony server:start
# ou sans Symfony CLI
php -S localhost:8000 -t public
```
---

## 🌐 Endpoints HTTP

Remarque: Ces routes retournent des vues HTML (Twig).

- GET /clients  
  Liste tous les clients.

- GET /clients/{id}  
  Affiche le détail d’un client.

- GET /clients/search?name={val}  
  Recherche des clients par début de nom de compagnie 'Company Name' (paramètre name).

- GET /clients/{id}/invoices  
  Liste les factures liées à un client.

- POST /clients/new  
  Soumet le formulaire de création d’un client, puis redirige vers /clients en cas de succès

  
## 🛠 Piles et composants clés

- Symfony 7.3 (framework)
- Doctrine ORM (accès DB)
- Twig (templates)
- SQLite (stockage par défaut)

---

## 🔐 Sécurité et configuration

- Ne commitez pas vos secrets. Utilisez `.env.local` (non versionné).
- APP_SECRET doit être une chaîne aléatoire et privée.
- En production, générez les variables d’environnement et le cache adapté:
```
bash
composer dump-env prod
php bin/console cache:clear --env=prod
```
---

## 📄 Licence

Ajoutez un fichier LICENSE si nécessaire et précisez la licence du projet.

---

## 🤝 Contributions

- Respectez PSR-12
- Ajoutez/actualisez les tests si vous modifiez des fonctionnalités
- Documentez vos changements dans ce README
```


Si vous souhaitez, je peux ajouter des exemples de données, un script de fixtures, ou un guide Docker pour l’exécution locale.
