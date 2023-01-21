<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230119195219 extends AbstractMigration
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
        $this->addSql('CREATE TABLE plante (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, proprietaire_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, nom_latin VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, CONSTRAINT FK_517A694776C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_517A694776C50E4A ON plante (proprietaire_id)');
        $this->addSql('CREATE TABLE proprietaire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, CONSTRAINT FK_69E399D6A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_69E399D6A76ED395 ON proprietaire (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE botaniste');
        $this->addSql('DROP TABLE plante');
        $this->addSql('DROP TABLE proprietaire');
    }
}
