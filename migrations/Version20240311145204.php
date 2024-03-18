<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240311145204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, is_disponible TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, uptdate_at DATETIME NOT NULL, deleted_at DATETIME NOT NULL, pays VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, birth_at DATETIME NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_6AB5B471A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, candidat_id INT DEFAULT NULL, job_offer_id INT DEFAULT NULL, created_at DATETIME NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_E33BD3B88D0EB82 (candidat_id), INDEX IDX_E33BD3B83481D195 (job_offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, secteur_activitée VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, candidat_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_590C1038D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, candidat_id INT DEFAULT NULL, chemin VARCHAR(255) NOT NULL, INDEX IDX_8C9F36108D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, candidat_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_835033F88D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT DEFAULT NULL, type_offre_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, finish_at DATETIME NOT NULL, content LONGTEXT NOT NULL, lieu VARCHAR(255) NOT NULL, salaire INT NOT NULL, reference VARCHAR(255) NOT NULL, INDEX IDX_288A3A4EA4AEAFEA (entreprise_id), INDEX IDX_288A3A4E813777A6 (type_offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metier (id INT AUTO_INCREMENT NOT NULL, candidat_id INT DEFAULT NULL, job_offer_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_51A00D8C8D0EB82 (candidat_id), INDEX IDX_51A00D8C3481D195 (job_offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B88D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B83481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C1038D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F36108D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE genre ADD CONSTRAINT FK_835033F88D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EA4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E813777A6 FOREIGN KEY (type_offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE metier ADD CONSTRAINT FK_51A00D8C8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE metier ADD CONSTRAINT FK_51A00D8C3481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471A76ED395');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B88D0EB82');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B83481D195');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C1038D0EB82');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F36108D0EB82');
        $this->addSql('ALTER TABLE genre DROP FOREIGN KEY FK_835033F88D0EB82');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4EA4AEAFEA');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E813777A6');
        $this->addSql('ALTER TABLE metier DROP FOREIGN KEY FK_51A00D8C8D0EB82');
        $this->addSql('ALTER TABLE metier DROP FOREIGN KEY FK_51A00D8C3481D195');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE metier');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
