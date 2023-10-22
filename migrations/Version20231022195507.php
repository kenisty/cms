<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231022195507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add history columns to the api_user table.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE api_user ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE api_user DROP created_at, DROP updated_at');
    }
}
