<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315075606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE serie ADD likes INT NOT NULL');
        $this->addSql('ALTER TABLE serie_genre DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE serie_genre DROP FOREIGN KEY FK_173C8CF14296D31F');
        $this->addSql('ALTER TABLE serie_genre DROP FOREIGN KEY FK_173C8CF1D94388BD');
        $this->addSql('ALTER TABLE serie_genre ADD PRIMARY KEY (serie_id, genre_id)');
        $this->addSql('DROP INDEX idx_173c8cf1d94388bd ON serie_genre');
        $this->addSql('CREATE INDEX IDX_4B5C076CD94388BD ON serie_genre (serie_id)');
        $this->addSql('DROP INDEX idx_173c8cf14296d31f ON serie_genre');
        $this->addSql('CREATE INDEX IDX_4B5C076C4296D31F ON serie_genre (genre_id)');
        $this->addSql('ALTER TABLE serie_genre ADD CONSTRAINT FK_173C8CF14296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_genre ADD CONSTRAINT FK_173C8CF1D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE serie DROP likes');
        $this->addSql('ALTER TABLE serie_genre DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE serie_genre DROP FOREIGN KEY FK_4B5C076CD94388BD');
        $this->addSql('ALTER TABLE serie_genre DROP FOREIGN KEY FK_4B5C076C4296D31F');
        $this->addSql('ALTER TABLE serie_genre ADD PRIMARY KEY (genre_id, serie_id)');
        $this->addSql('DROP INDEX idx_4b5c076c4296d31f ON serie_genre');
        $this->addSql('CREATE INDEX IDX_173C8CF14296D31F ON serie_genre (genre_id)');
        $this->addSql('DROP INDEX idx_4b5c076cd94388bd ON serie_genre');
        $this->addSql('CREATE INDEX IDX_173C8CF1D94388BD ON serie_genre (serie_id)');
        $this->addSql('ALTER TABLE serie_genre ADD CONSTRAINT FK_4B5C076CD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_genre ADD CONSTRAINT FK_4B5C076C4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }
}
