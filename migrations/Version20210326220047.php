<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210326220047 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add activity_type column to activity table.';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE activity ADD activity_type INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_ACTIVITY_TYPE FOREIGN KEY (activity_type) REFERENCES activity_type (id)');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('ALTER TABLE activity DROP activity_type');
    }
}
