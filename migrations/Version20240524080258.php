<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240524080258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE grape_variety_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE grape_variety (id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, thumbnail VARCHAR(255) DEFAULT NULL, plot TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN grape_variety.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN grape_variety.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE box ADD price INT NOT NULL');
        $this->addSql('ALTER TABLE wine ADD grape_variety_id INT NOT NULL');
        $this->addSql('ALTER TABLE wine ADD price INT NOT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468ED00A18A FOREIGN KEY (grape_variety_id) REFERENCES grape_variety (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_560C6468ED00A18A ON wine (grape_variety_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE wine DROP CONSTRAINT FK_560C6468ED00A18A');
        $this->addSql('DROP SEQUENCE grape_variety_id_seq CASCADE');
        $this->addSql('DROP TABLE grape_variety');
        $this->addSql('DROP INDEX IDX_560C6468ED00A18A');
        $this->addSql('ALTER TABLE wine DROP grape_variety_id');
        $this->addSql('ALTER TABLE wine DROP price');
        $this->addSql('ALTER TABLE box DROP price');
    }
}
