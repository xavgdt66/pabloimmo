<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231119193649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL, ADD telephone VARCHAR(255) DEFAULT NULL, ADD address VARCHAR(255) DEFAULT NULL, ADD presentation LONGTEXT DEFAULT NULL, ADD employment_status VARCHAR(255) DEFAULT NULL, ADD net_income NUMERIC(10, 2) DEFAULT NULL, ADD guarantee VARCHAR(255) DEFAULT NULL, ADD profile_picture VARCHAR(255) DEFAULT NULL, ADD user_type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP first_name, DROP last_name, DROP telephone, DROP address, DROP presentation, DROP employment_status, DROP net_income, DROP guarantee, DROP profile_picture, DROP user_type');
    }
}
