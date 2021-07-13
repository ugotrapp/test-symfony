<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713133943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE seed_harvest_period (seed_id INT NOT NULL, harvest_period_id INT NOT NULL, INDEX IDX_7791860864430F6A (seed_id), INDEX IDX_779186083B2ACE78 (harvest_period_id), PRIMARY KEY(seed_id, harvest_period_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE seed_harvest_period ADD CONSTRAINT FK_7791860864430F6A FOREIGN KEY (seed_id) REFERENCES seed (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seed_harvest_period ADD CONSTRAINT FK_779186083B2ACE78 FOREIGN KEY (harvest_period_id) REFERENCES harvest_period (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE seed_harvest_period');
    }
}
