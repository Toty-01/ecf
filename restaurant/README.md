# ecf
Ce projet de fin d'études avait pour but de permettre à des clients de se connecter et de faire une réservation. 
Côté restaurant l'administrateur devait être capable de gerer les plats, menus, formules, réservations et horaires du restaurant.

Grâce à cette application vous serez en mesure de le faire. 
Après avoir cloné le git sur votre ordinateur suivre ces étapes :

1. Installer les dépendances : exécutez la commande `composer install` pour installer les dépendances du projet.

2. Créer la base de données : exécutez la commande `php bin/console doctrine:database:create` pour créer la base de données.

3. Mettre à jour la base de données : Migrer les données `php bin/console doctrine:migrations:migrate` pour mettre à jour la base de données.

4. Lancer le serveur : exécutez la commande `php bin/console server:run` pour lancer le serveur de développement.

5. Accéder à l'application : ouvrez un navigateur et accédez à l'URL `http://localhost:8000` pour accéder à l'application.

Dans les datafixtures, l admin est parametré avec un mot de passe. Il ne vous reste plus qu'à l'envoyer à la base de donnée ainsi vous pourrez vous connecter dans un espace privé de gestion de menu, carte, plats ...


