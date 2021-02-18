<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210124192424 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD title_eng VARCHAR(255) DEFAULT NULL, ADD description_eng VARCHAR(255) DEFAULT NULL, ADD price_dollar DOUBLE PRECISION DEFAULT NULL, ADD color_eng VARCHAR(255) DEFAULT NULL, ADD shape_eng VARCHAR(255) DEFAULT NULL, ADD new_price_dollar DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP title_eng, DROP description_eng, DROP price_dollar, DROP color_eng, DROP shape_eng, DROP new_price_dollar');
    }
}
