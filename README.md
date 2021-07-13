## Install

    git clone https://github.com/ugotrapp/test-symfony
    cd test-symfony
    composer install

Après install du projet, créez le fichier `.env.local` et ajoutez-y les variables `APP_ENV` et `DATABASE_URL`.

Créez la BDD avec PhpMyAdmin.

Ensuite créez le schéma de la BDD et injectez les données de test avec la commande :

# suppression de toutes les tables
php bin/console doctrine:schema:drop --full-database --force --no-interaction
# création du schéma de BDD
php bin/console doctrine:migrations:migrate --no-interaction
# validation du schéma de BDD
php bin/console doctrine:schema:validate
# injection des données de test dans la BDD
php bin/console doctrine:fixtures:load --no-interaction

## Utilisation

symfony serve dans le terminal

Ensuite visitez la page [http://localhost:8000](http://localhost:8000).

### Liste des CRUD

page pour les graines : https://127.0.0.1:8000/seed/

page des familles : https://127.0.0.1:8000/family/

page des periodes de recolte : https://127.0.0.1:8000/harvest-period/

page des periodes de plantation : https://127.0.0.1:8000/planting-period/