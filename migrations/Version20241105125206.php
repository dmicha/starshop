<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241105125206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE ships RENAME COLUMN ship_status TO status_id');
        // $this->addSql('ALTER TABLE ships ADD CONSTRAINT FK_27F71B316BF700BD FOREIGN KEY (status_id) REFERENCES ship_status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        // $this->addSql('CREATE INDEX IDX_27F71B316BF700BD ON ships (status_id)');
    }

    public function down(Schema $schema): void
    {
        // // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE SCHEMA public');
        // $this->addSql('ALTER TABLE ships DROP CONSTRAINT FK_27F71B316BF700BD');
        // $this->addSql('DROP INDEX IDX_27F71B316BF700BD');
        // $this->addSql('ALTER TABLE ships RENAME COLUMN status_id TO ship_status');
    }
}
