<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210220125911 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catalog_category ADD website_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE catalog_category ADD CONSTRAINT FK_349BC7DF18F45C82 FOREIGN KEY (website_id) REFERENCES website (id)');
        $this->addSql('CREATE INDEX IDX_349BC7DF18F45C82 ON catalog_category (website_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catalog_category DROP FOREIGN KEY FK_349BC7DF18F45C82');
        $this->addSql('DROP INDEX IDX_349BC7DF18F45C82 ON catalog_category');
        $this->addSql('ALTER TABLE catalog_category DROP website_id');
    }
}
