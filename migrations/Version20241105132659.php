<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105132659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ships ADD status_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ships ADD CONSTRAINT FK_27F71B31881ECFA7 FOREIGN KEY (status_id_id) REFERENCES ship_status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_27F71B31881ECFA7 ON ships (status_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ships DROP CONSTRAINT FK_27F71B31881ECFA7');
        $this->addSql('DROP INDEX IDX_27F71B31881ECFA7');
        $this->addSql('ALTER TABLE ships DROP status_id_id');
    }
}
