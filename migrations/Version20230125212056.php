<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125212056 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE botaniste (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, CONSTRAINT FK_6C8A9D5A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C8A9D5A76ED395 ON botaniste (user_id)');
        $this->addSql('CREATE TABLE commentary (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, botanist_id INTEGER NOT NULL, plant_id INTEGER NOT NULL, comment VARCHAR(255) NOT NULL, CONSTRAINT FK_1CAC12CAC5802BC8 FOREIGN KEY (botanist_id) REFERENCES botaniste (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_1CAC12CA1D935652 FOREIGN KEY (plant_id) REFERENCES plante (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_1CAC12CAC5802BC8 ON commentary (botanist_id)');
        $this->addSql('CREATE INDEX IDX_1CAC12CA1D935652 ON commentary (plant_id)');
        $this->addSql('CREATE TABLE entretien (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, plant_id INTEGER DEFAULT NULL, proprietaire_id INTEGER NOT NULL, intitule VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, date DATE NOT NULL, CONSTRAINT FK_2B58D6DA1D935652 FOREIGN KEY (plant_id) REFERENCES plante (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_2B58D6DA76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_2B58D6DA1D935652 ON entretien (plant_id)');
        $this->addSql('CREATE INDEX IDX_2B58D6DA76C50E4A ON entretien (proprietaire_id)');
        $this->addSql('CREATE TABLE plante (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, proprietaire_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, nom_latin VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, CONSTRAINT FK_517A694776C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_517A694776C50E4A ON plante (proprietaire_id)');
        $this->addSql('CREATE TABLE proprietaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, CONSTRAINT FK_69E399D6A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_69E399D6A76ED395 ON proprietaire (user_id)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE botaniste');
        $this->addSql('DROP TABLE commentary');
        $this->addSql('DROP TABLE entretien');
        $this->addSql('DROP TABLE plante');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE "user"');
    }
}
