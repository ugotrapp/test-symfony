<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713132347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE harvest_period (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rank INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planting_period (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rank INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seed DROP recolt_period, DROP planting_period');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE harvest_period');
        $this->addSql('DROP TABLE planting_period');
        $this->addSql('ALTER TABLE seed ADD recolt_period DATETIME NOT NULL, ADD planting_period DATETIME NOT NULL');
    }
}
