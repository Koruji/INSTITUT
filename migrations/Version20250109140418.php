<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250109140418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matiere_stage (matiere_id INT NOT NULL, stage_id INT NOT NULL, INDEX IDX_4EDC3D1CF46CD258 (matiere_id), INDEX IDX_4EDC3D1C2298D193 (stage_id), PRIMARY KEY(matiere_id, stage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stage_stagiaire (stage_id INT NOT NULL, stagiaire_id INT NOT NULL, INDEX IDX_7C690D102298D193 (stage_id), INDEX IDX_7C690D10BBA93DD6 (stagiaire_id), PRIMARY KEY(stage_id, stagiaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matiere_stage ADD CONSTRAINT FK_4EDC3D1CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere_stage ADD CONSTRAINT FK_4EDC3D1C2298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_stagiaire ADD CONSTRAINT FK_7C690D102298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stage_stagiaire ADD CONSTRAINT FK_7C690D10BBA93DD6 FOREIGN KEY (stagiaire_id) REFERENCES stagiaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere ADD professeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574ABAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id)');
        $this->addSql('CREATE INDEX IDX_9014574ABAB22EE9 ON matiere (professeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere_stage DROP FOREIGN KEY FK_4EDC3D1CF46CD258');
        $this->addSql('ALTER TABLE matiere_stage DROP FOREIGN KEY FK_4EDC3D1C2298D193');
        $this->addSql('ALTER TABLE stage_stagiaire DROP FOREIGN KEY FK_7C690D102298D193');
        $this->addSql('ALTER TABLE stage_stagiaire DROP FOREIGN KEY FK_7C690D10BBA93DD6');
        $this->addSql('DROP TABLE matiere_stage');
        $this->addSql('DROP TABLE stage_stagiaire');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574ABAB22EE9');
        $this->addSql('DROP INDEX IDX_9014574ABAB22EE9 ON matiere');
        $this->addSql('ALTER TABLE matiere DROP professeur_id');
    }
}
