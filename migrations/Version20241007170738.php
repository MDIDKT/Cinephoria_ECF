<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241007170738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salles ADD cinema_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salles ADD CONSTRAINT FK_799D45AAB4CB84B6 FOREIGN KEY (cinema_id) REFERENCES cinemas (id)');
        $this->addSql('CREATE INDEX IDX_799D45AAB4CB84B6 ON salles (cinema_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salles DROP FOREIGN KEY FK_799D45AAB4CB84B6');
        $this->addSql('DROP INDEX IDX_799D45AAB4CB84B6 ON salles');
        $this->addSql('ALTER TABLE salles DROP cinema_id');
    }
}