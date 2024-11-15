<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105120917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
    //     $this->addSql('ALTER TABLE ships DROP CONSTRAINT fk_27f71b31881ecfa7');
    //     $this->addSql('DROP INDEX idx_27f71b31881ecfa7');
    //     $this->addSql('ALTER TABLE ships ADD image_url VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE ships DROP image_url');
        // $this->addSql('ALTER TABLE ships ADD CONSTRAINT fk_27f71b31881ecfa7 FOREIGN KEY (status_id_id) REFERENCES ships (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('CREATE INDEX idx_27f71b31881ecfa7 ON ships (status_id_id)');
    }
}
