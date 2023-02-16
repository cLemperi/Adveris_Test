# Adveris_Test
Test de l'entreprise Adveris
INSTALLATION :
Installez les dépendances : composer install
Créez une base de données: php bin/console d:d:c
Jouez les migrations : php bin/console d:m:m
Lancez le serveur Symfony : symfony server:start


PROJET
Pour ce projet j'ai donc créé une commande qui permet à l'utilisateur de choisir la source de donnée à importer en base de données.

Pour importer le fichier XML veuillez copier coller la commande suivante

php bin/console ImportDataCommand https://test-back-symfony.adveris.dev/upload/default/projects.xml


Concernant l'affichage et le champs de recherche, tout se trouve directement sur l'index Localhost

Merci et à très vite.
