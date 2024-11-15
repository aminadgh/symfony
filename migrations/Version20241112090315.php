<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112090315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5FD02F13');
        $this->addSql('ALTER TABLE inscri_evenement DROP FOREIGN KEY FK_C423A337B84DCA9B');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145CB84DCA9B');
        $this->addSql('CREATE TABLE groupe_utilisateur (grp_communication_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_92C1107D78846489 (grp_communication_id), INDEX IDX_92C1107DFB88E14F (utilisateur_id), PRIMARY KEY(grp_communication_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Événement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_utilisateur ADD CONSTRAINT FK_92C1107D78846489 FOREIGN KEY (grp_communication_id) REFERENCES grp_communication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_utilisateur ADD CONSTRAINT FK_92C1107DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE événement');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5FD02F13');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5FD02F13 FOREIGN KEY (evenement_id) REFERENCES Événement (id)');
        $this->addSql('ALTER TABLE inscri_evenement DROP FOREIGN KEY FK_C423A337B84DCA9B');
        $this->addSql('ALTER TABLE inscri_evenement ADD CONSTRAINT FK_C423A337B84DCA9B FOREIGN KEY (événement_id) REFERENCES Événement (id)');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145CB84DCA9B');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145CB84DCA9B FOREIGN KEY (événement_id) REFERENCES Événement (id)');
        $this->addSql('ALTER TABLE profil CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE telephone telephone VARCHAR(20) DEFAULT NULL, CHANGE photo_profil photo_profil VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5FD02F13');
        $this->addSql('ALTER TABLE inscri_evenement DROP FOREIGN KEY FK_C423A337B84DCA9B');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145CB84DCA9B');
        $this->addSql('CREATE TABLE événement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE groupe_utilisateur DROP FOREIGN KEY FK_92C1107D78846489');
        $this->addSql('ALTER TABLE groupe_utilisateur DROP FOREIGN KEY FK_92C1107DFB88E14F');
        $this->addSql('DROP TABLE groupe_utilisateur');
        $this->addSql('DROP TABLE Événement');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5FD02F13');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5FD02F13 FOREIGN KEY (evenement_id) REFERENCES événement (id)');
        $this->addSql('ALTER TABLE inscri_evenement DROP FOREIGN KEY FK_C423A337B84DCA9B');
        $this->addSql('ALTER TABLE inscri_evenement ADD CONSTRAINT FK_C423A337B84DCA9B FOREIGN KEY (événement_id) REFERENCES événement (id)');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145CB84DCA9B');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145CB84DCA9B FOREIGN KEY (événement_id) REFERENCES événement (id)');
        $this->addSql('ALTER TABLE profil CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\', CHANGE telephone telephone VARCHAR(20) DEFAULT \'NULL\', CHANGE photo_profil photo_profil VARCHAR(255) DEFAULT \'NULL\'');
    }
}
