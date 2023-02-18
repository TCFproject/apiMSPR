<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216192936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentary (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, plant_id INTEGER NOT NULL, user_id INTEGER NOT NULL, comment VARCHAR(255) NOT NULL, CONSTRAINT FK_1CAC12CA1D935652 FOREIGN KEY (plant_id) REFERENCES plante (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1CAC12CAA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_1CAC12CA1D935652 ON commentary (plant_id)');
        $this->addSql('CREATE INDEX IDX_1CAC12CAA76ED395 ON commentary (user_id)');
        $this->addSql('CREATE TABLE entretien (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, plant_id INTEGER DEFAULT NULL, user_id INTEGER NOT NULL, intitule VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, date DATE NOT NULL, CONSTRAINT FK_2B58D6DA1D935652 FOREIGN KEY (plant_id) REFERENCES plante (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2B58D6DAA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_2B58D6DA1D935652 ON entretien (plant_id)');
        $this->addSql('CREATE INDEX IDX_2B58D6DAA76ED395 ON entretien (user_id)');
        $this->addSql('CREATE TABLE plante (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, nom_latin VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, CONSTRAINT FK_517A6947A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_517A6947A76ED395 ON plante (user_id)');
        $this->addSql('CREATE TABLE role (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, label VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, role_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_8D93D649D60322AC ON "user" (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commentary');
        $this->addSql('DROP TABLE entretien');
        $this->addSql('DROP TABLE plante');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE "user"');
    }
}
