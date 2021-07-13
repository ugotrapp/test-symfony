<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713140040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seed ADD family_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seed ADD CONSTRAINT FK_4487E306C35E566A FOREIGN KEY (family_id) REFERENCES family (id)');
        $this->addSql('CREATE INDEX IDX_4487E306C35E566A ON seed (family_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE seed DROP FOREIGN KEY FK_4487E306C35E566A');
        $this->addSql('DROP INDEX IDX_4487E306C35E566A ON seed');
        $this->addSql('ALTER TABLE seed DROP family_id');
    }
}
