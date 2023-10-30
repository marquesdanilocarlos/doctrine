<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231029232327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE details (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, visibility VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE posts ADD detail_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFAD8D003BB FOREIGN KEY (detail_id) REFERENCES details (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_885DBAFAD8D003BB ON posts (detail_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFAD8D003BB');
        $this->addSql('DROP TABLE details');
        $this->addSql('DROP INDEX UNIQ_885DBAFAD8D003BB ON posts');
        $this->addSql('ALTER TABLE posts DROP detail_id');
    }
}
