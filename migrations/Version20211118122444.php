<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118122444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, categorie_naam VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opberger (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, naam VARCHAR(255) NOT NULL, INDEX IDX_BE40D1799D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opslag (id INT AUTO_INCREMENT NOT NULL, opberger_id_id INT NOT NULL, product_id_id INT NOT NULL, aantal INT NOT NULL, verpakking VARCHAR(255) NOT NULL, INDEX IDX_26C56FC83910F30C (opberger_id_id), INDEX IDX_26C56FC8DE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producten (id INT AUTO_INCREMENT NOT NULL, categorie_id_id INT DEFAULT NULL, naam VARCHAR(255) NOT NULL, barcode VARCHAR(255) DEFAULT NULL, inhoud INT DEFAULT NULL, meeteenheid VARCHAR(10) DEFAULT NULL, vervaldatum DATE DEFAULT NULL, INDEX IDX_EF9D14B58A3C7387 (categorie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE opberger ADD CONSTRAINT FK_BE40D1799D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE opslag ADD CONSTRAINT FK_26C56FC83910F30C FOREIGN KEY (opberger_id_id) REFERENCES opberger (id)');
        $this->addSql('ALTER TABLE opslag ADD CONSTRAINT FK_26C56FC8DE18E50B FOREIGN KEY (product_id_id) REFERENCES producten (id)');
        $this->addSql('ALTER TABLE producten ADD CONSTRAINT FK_EF9D14B58A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE producten DROP FOREIGN KEY FK_EF9D14B58A3C7387');
        $this->addSql('ALTER TABLE opslag DROP FOREIGN KEY FK_26C56FC83910F30C');
        $this->addSql('ALTER TABLE opslag DROP FOREIGN KEY FK_26C56FC8DE18E50B');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE opberger');
        $this->addSql('DROP TABLE opslag');
        $this->addSql('DROP TABLE producten');
    }
}
