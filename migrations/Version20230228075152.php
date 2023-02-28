<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228075152 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chevaux (id INT AUTO_INCREMENT NOT NULL, le_proprietaire_id INT DEFAULT NULL, nom_cheval VARCHAR(255) NOT NULL, prix_achat INT NOT NULL, prix_revente INT NOT NULL, INDEX IDX_9990D6E6FCC76766 (le_proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chevaux_courses (id INT AUTO_INCREMENT NOT NULL, le_cheval_id INT DEFAULT NULL, la_course_id INT DEFAULT NULL, resultat INT NOT NULL, INDEX IDX_9131F28A11A681CC (le_cheval_id), INDEX IDX_9131F28A30DDAEE7 (la_course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE courses (id INT AUTO_INCREMENT NOT NULL, nom_course VARCHAR(255) NOT NULL, gain INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaires (id INT AUTO_INCREMENT NOT NULL, nom_proprietaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chevaux ADD CONSTRAINT FK_9990D6E6FCC76766 FOREIGN KEY (le_proprietaire_id) REFERENCES proprietaires (id)');
        $this->addSql('ALTER TABLE chevaux_courses ADD CONSTRAINT FK_9131F28A11A681CC FOREIGN KEY (le_cheval_id) REFERENCES chevaux (id)');
        $this->addSql('ALTER TABLE chevaux_courses ADD CONSTRAINT FK_9131F28A30DDAEE7 FOREIGN KEY (la_course_id) REFERENCES courses (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chevaux DROP FOREIGN KEY FK_9990D6E6FCC76766');
        $this->addSql('ALTER TABLE chevaux_courses DROP FOREIGN KEY FK_9131F28A11A681CC');
        $this->addSql('ALTER TABLE chevaux_courses DROP FOREIGN KEY FK_9131F28A30DDAEE7');
        $this->addSql('DROP TABLE chevaux');
        $this->addSql('DROP TABLE chevaux_courses');
        $this->addSql('DROP TABLE courses');
        $this->addSql('DROP TABLE proprietaires');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
