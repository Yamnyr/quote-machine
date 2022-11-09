Quote-Machine

Installation du projet

Configuration de la base de données
    
fichier .env
    DATABASE_URL="mysql://[username]:[password]@127.0.0.1:3306/app?serverVersion=8&charset=utf8mb4

Création de la base de données, exécution des migrations et chargement des fixtures

    php bin/console make:migration
    php bin/console doctrine:migrations:migrate

Lancement du serveur de développement

    symfony serve
    ou
    symfony server:start