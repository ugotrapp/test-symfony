<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713133730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seed_planting_period (seed_id INT NOT NULL, planting_period_id INT NOT NULL, INDEX IDX_41C44FD864430F6A (seed_id), INDEX IDX_41C44FD8F05E462A (planting_period_id), PRIMARY KEY(seed_id, planting_period_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seed_planting_period ADD CONSTRAINT FK_41C44FD864430F6A FOREIGN KEY (seed_id) REFERENCES seed (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seed_planting_period ADD CONSTRAINT FK_41C44FD8F05E462A FOREIGN KEY (planting_period_id) REFERENCES planting_period (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE seed_planting_period');
    }
}
