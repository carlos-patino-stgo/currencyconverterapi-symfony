<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315162612 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conversion (id INT AUTO_INCREMENT NOT NULL, amount DOUBLE PRECISION NOT NULL, from_currency enum(\'USD\', \'PLN\') NOT NULL, to_currency enum(\'MXN\', \'ERN\', \'DZD\', \'CDF\', \'MAD\', \'SYP\') NOT NULL, current_value_of_the_currency DOUBLE PRECISION NOT NULL, amount_convertor DOUBLE PRECISION NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE conversion');
    }
}