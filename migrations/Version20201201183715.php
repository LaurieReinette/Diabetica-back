<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201183715 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bloodsugar (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, rate DOUBLE PRECISION NOT NULL, correction VARCHAR(50) DEFAULT NULL, corrected TINYINT(1) DEFAULT NULL, date DATE NOT NULL, time TIME NOT NULL, normality VARCHAR(20) NOT NULL, INDEX IDX_679503EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, target_min DOUBLE PRECISION NOT NULL, target_max DOUBLE PRECISION NOT NULL, doctor_name VARCHAR(50) DEFAULT NULL, doctor_email VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL, username VARCHAR(255) NOT NULL, treatment VARCHAR(30) NOT NULL, diabetes_type VARCHAR(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bloodsugar ADD CONSTRAINT FK_679503EA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloodsugar DROP FOREIGN KEY FK_679503EA76ED395');
        $this->addSql('DROP TABLE bloodsugar');
        $this->addSql('DROP TABLE `user`');
    }
}
