# projet symfony "quote-mahine" 

## WAROQUET Quentin

### prérequis :

Installation du projet

### prérequis :

- PHP 8.1.0 ou supérieur
- Symfony 5.4.17
- mysql
- composer 2.4.2
-

### installer base de donné:

- fichier .env:\
- changer cette ligne:
    - <code>DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8&charset=utf8mb4"</code>

- <code>composer require --dev doctrine/doctrine-fixtures-bundle </code>
- <code>symfony console doctrine:database:create </code>
- <code>symfony console make:migration </code>
- <code>symfony console doctrine:migrations:migrate </code>
- <code>symfony console doctrine:fixtures:load </code>

### Lancement du serveur de développement

- <code>symfony serve</code>\
  ou
- <code>symfony server:start</code>

### Contenu du projet

- gestion de citation
    - les admins peuvent créer/modifier/supprimer des citations, des catégories
- système d'utilisateur
    - les admins peuvent créer des citations, des catégories
    - les utilisateurs peuvent uniquement voir les citaions

- utilisation de fixtures
- utilisation de foundry
