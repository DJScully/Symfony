<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628185303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fondo (id INT AUTO_INCREMENT NOT NULL, titulo VARCHAR(50) NOT NULL, autores LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', isbn VARCHAR(20) NOT NULL, edicion VARCHAR(4) NOT NULL, categoría VARCHAR(30) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fondo_catalogo (fondo_id INT NOT NULL, catalogo_id INT NOT NULL, INDEX IDX_A2C08DE9AA510E89 (fondo_id), INDEX IDX_A2C08DE94979D753 (catalogo_id), PRIMARY KEY(fondo_id, catalogo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fondo_catalogo ADD CONSTRAINT FK_A2C08DE9AA510E89 FOREIGN KEY (fondo_id) REFERENCES fondo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fondo_catalogo ADD CONSTRAINT FK_A2C08DE94979D753 FOREIGN KEY (catalogo_id) REFERENCES catalogo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fondo_catalogo DROP FOREIGN KEY FK_A2C08DE9AA510E89');
        $this->addSql('DROP TABLE fondo');
        $this->addSql('DROP TABLE fondo_catalogo');
    }
}
