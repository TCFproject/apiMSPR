php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
symfony console doctrine:migrations:migrate
yes