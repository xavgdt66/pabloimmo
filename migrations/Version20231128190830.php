<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231128190830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD nom_agence VARCHAR(255) DEFAULT NULL, ADD numero_rue VARCHAR(255) DEFAULT NULL, ADD nom_rue VARCHAR(255) DEFAULT NULL, ADD code_postal VARCHAR(255) DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD carte_professionnelle VARCHAR(255) DEFAULT NULL, ADD siren VARCHAR(255) DEFAULT NULL, ADD siret VARCHAR(255) DEFAULT NULL, ADD kbis VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP nom_agence, DROP numero_rue, DROP nom_rue, DROP code_postal, DROP ville, DROP carte_professionnelle, DROP siren, DROP siret, DROP kbis');
    }
}
