<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210221160557 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery_information ADD recipient_name VARCHAR(255) DEFAULT NULL, ADD recipient_phone_number VARCHAR(255) DEFAULT NULL, DROP birthday_person_name, DROP birthday_person_phonen_umber');
        $this->addSql('ALTER TABLE purchase ADD delivery_information_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE purchase ADD CONSTRAINT FK_6117D13B8EFD213E FOREIGN KEY (delivery_information_id) REFERENCES delivery_information (id)');
        $this->addSql('CREATE INDEX IDX_6117D13B8EFD213E ON purchase (delivery_information_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE delivery_information ADD birthday_person_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD birthday_person_phonen_umber VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP recipient_name, DROP recipient_phone_number');
        $this->addSql('ALTER TABLE purchase DROP FOREIGN KEY FK_6117D13B8EFD213E');
        $this->addSql('DROP INDEX IDX_6117D13B8EFD213E ON purchase');
        $this->addSql('ALTER TABLE purchase DROP delivery_information_id');
    }
}
