# NOUVEAU PROJET

php -r "file_put_contents('symfony', file_get_contents('https://symfony.com/installer'));"
php symfony new project_name

# LANCER SERVER
php app/console server:run

# NOUVEAU BUNDLE

php bin/console generate:bundle
    nommer le bundle
    choix de l'annotation
    ...

=> modifier les fichiers
app/AppKernel.php
app/config/config.yml
app/config/routing.yml


# BDD

=> identifiants de connection
app/config/parameters.yml 

=> eventuellement changer le driver pdo et l'encodage
app/config/config.yml 

=> creation de la table
php app/console doctrine:database:create 

=> creation d'une entité
php app/console generate:doctrine:entity 
	nommer l'entité => nomDuBundle:nomDeLentite (ex: OrderBundle:Cart)
	choix de l'annotation (ex yml)
	créer les champs
    
    
=> validation de la table
php app/console doctrine:schema:validate

=> update de la table
php app/console doctrine:schema:update --force


# CRUD
php app/console generate:doctrine:crud


