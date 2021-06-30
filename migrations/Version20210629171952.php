<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210629171952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autor (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autor_libro (autor_id INT NOT NULL, libro_id INT NOT NULL, INDEX IDX_59ADB71014D45BBE (autor_id), INDEX IDX_59ADB710C0238522 (libro_id), PRIMARY KEY(autor_id, libro_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editorial (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE libro (id INT AUTO_INCREMENT NOT NULL, edicion_id INT NOT NULL, titulo VARCHAR(50) NOT NULL, isbn VARCHAR(15) NOT NULL, publicacion VARCHAR(4) NOT NULL, categoria VARCHAR(50) NOT NULL, INDEX IDX_5799AD2BD651B81E (edicion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE autor_libro ADD CONSTRAINT FK_59ADB71014D45BBE FOREIGN KEY (autor_id) REFERENCES autor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE autor_libro ADD CONSTRAINT FK_59ADB710C0238522 FOREIGN KEY (libro_id) REFERENCES libro (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE libro ADD CONSTRAINT FK_5799AD2BD651B81E FOREIGN KEY (edicion_id) REFERENCES editorial (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE autor_libro DROP FOREIGN KEY FK_59ADB71014D45BBE');
        $this->addSql('ALTER TABLE libro DROP FOREIGN KEY FK_5799AD2BD651B81E');
        $this->addSql('ALTER TABLE autor_libro DROP FOREIGN KEY FK_59ADB710C0238522');
        $this->addSql('DROP TABLE autor');
        $this->addSql('DROP TABLE autor_libro');
        $this->addSql('DROP TABLE editorial');
        $this->addSql('DROP TABLE libro');
    }
}
