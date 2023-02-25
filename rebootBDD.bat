php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
echo yes | symfony console doctrine:migrations:migrate --no-interaction
sqlite3 var/data.db "INSERT INTO role(label) VALUES('Botaniste'),('Proprietaire')"
php bin/phpunit ./tests/PropriServiTest.php
php bin/phpunit ./tests/BotaServiTest.php