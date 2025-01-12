<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250112190457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD professeur_id INT DEFAULT NULL, ADD stagiaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649BAB22EE9 ON user (professeur_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649BBA93DD6 ON user (stagiaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BAB22EE9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BBA93DD6');
        $this->addSql('DROP INDEX UNIQ_8D93D649BAB22EE9 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649BBA93DD6 ON user');
        $this->addSql('ALTER TABLE user DROP professeur_id, DROP stagiaire_id');
    }
}
