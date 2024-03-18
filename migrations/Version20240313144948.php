<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313144948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat ADD metier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471ED16FA20 FOREIGN KEY (metier_id) REFERENCES metier (id)');
        $this->addSql('CREATE INDEX IDX_6AB5B471ED16FA20 ON candidat (metier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471ED16FA20');
        $this->addSql('DROP INDEX IDX_6AB5B471ED16FA20 ON candidat');
        $this->addSql('ALTER TABLE candidat DROP metier_id');
    }
}
