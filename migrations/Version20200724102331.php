<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200724102331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD lastname VARCHAR(50) NOT NULL, ADD firstname VARCHAR(50) NOT NULL, ADD target_min DOUBLE PRECISION NOT NULL, ADD target_max DOUBLE PRECISION NOT NULL, ADD doctor_name VARCHAR(50) DEFAULT NULL, ADD diabetes_type VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP lastname, DROP firstname, DROP target_min, DROP target_max, DROP doctor_name, DROP diabetes_type');
    }
}
