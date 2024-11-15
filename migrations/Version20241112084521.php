<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241112084521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, evenement_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, date_publication DATETIME NOT NULL, INDEX IDX_F65593E57ECF78B0 (cours_id), INDEX IDX_F65593E5FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, enseignant_responsable_id INT NOT NULL, nom_cours VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, code_cours VARCHAR(50) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, UNIQUE INDEX UNIQ_FDCA8C9C119F95D0 (code_cours), INDEX IDX_FDCA8C9CFEF0522B (enseignant_responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devoir (id INT AUTO_INCREMENT NOT NULL, cours_id INT NOT NULL, titre_devoir VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, date_limite DATETIME NOT NULL, INDEX IDX_749EA7717ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grp_communication (id INT AUTO_INCREMENT NOT NULL, nom_groupe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_utilisateur (grp_communication_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_92C1107D78846489 (grp_communication_id), INDEX IDX_92C1107DFB88E14F (utilisateur_id), PRIMARY KEY(grp_communication_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscri_evenement (id INT AUTO_INCREMENT NOT NULL, événement_id INT NOT NULL, utilisateur_id INT NOT NULL, date_inscription DATETIME NOT NULL, statut VARCHAR(50) NOT NULL, INDEX IDX_C423A337B84DCA9B (événement_id), INDEX IDX_C423A337FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intervenant (id INT AUTO_INCREMENT NOT NULL, événement_id INT NOT NULL, nom_intervenant VARCHAR(255) NOT NULL, bio LONGTEXT DEFAULT NULL, INDEX IDX_73D0145CB84DCA9B (événement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, expéditeur_id INT NOT NULL, destinataire_utilisateur_id INT DEFAULT NULL, destinataire_groupe_id INT DEFAULT NULL, contenu LONGTEXT NOT NULL, date_envoi DATETIME NOT NULL, INDEX IDX_B6BD307F974FC797 (expéditeur_id), INDEX IDX_B6BD307F8327D3F4 (destinataire_utilisateur_id), INDEX IDX_B6BD307F3A8B7D2D (destinataire_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, cours_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_C2426287ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, type_notification VARCHAR(50) NOT NULL, contenu LONGTEXT NOT NULL, date_envoi DATETIME NOT NULL, INDEX IDX_BF5476CAFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, photo_profil VARCHAR(255) DEFAULT NULL, biographie LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, cours_id INT DEFAULT NULL, module_id INT DEFAULT NULL, type VARCHAR(50) NOT NULL, url_ou_fichier VARCHAR(255) NOT NULL, INDEX IDX_939F45447ECF78B0 (cours_id), INDEX IDX_939F4544AFC2B591 (module_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rôle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, date_inscription DATETIME NOT NULL, statut VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), INDEX IDX_1D1C63B3D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Événement (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E57ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5FD02F13 FOREIGN KEY (evenement_id) REFERENCES Événement (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CFEF0522B FOREIGN KEY (enseignant_responsable_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE devoir ADD CONSTRAINT FK_749EA7717ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE groupe_utilisateur ADD CONSTRAINT FK_92C1107D78846489 FOREIGN KEY (grp_communication_id) REFERENCES grp_communication (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_utilisateur ADD CONSTRAINT FK_92C1107DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscri_evenement ADD CONSTRAINT FK_C423A337B84DCA9B FOREIGN KEY (événement_id) REFERENCES Événement (id)');
        $this->addSql('ALTER TABLE inscri_evenement ADD CONSTRAINT FK_C423A337FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE intervenant ADD CONSTRAINT FK_73D0145CB84DCA9B FOREIGN KEY (événement_id) REFERENCES Événement (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F974FC797 FOREIGN KEY (expéditeur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F8327D3F4 FOREIGN KEY (destinataire_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F3A8B7D2D FOREIGN KEY (destinataire_groupe_id) REFERENCES grp_communication (id)');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C2426287ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F45447ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F4544AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3D60322AC FOREIGN KEY (role_id) REFERENCES rôle (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E57ECF78B0');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5FD02F13');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CFEF0522B');
        $this->addSql('ALTER TABLE devoir DROP FOREIGN KEY FK_749EA7717ECF78B0');
        $this->addSql('ALTER TABLE groupe_utilisateur DROP FOREIGN KEY FK_92C1107D78846489');
        $this->addSql('ALTER TABLE groupe_utilisateur DROP FOREIGN KEY FK_92C1107DFB88E14F');
        $this->addSql('ALTER TABLE inscri_evenement DROP FOREIGN KEY FK_C423A337B84DCA9B');
        $this->addSql('ALTER TABLE inscri_evenement DROP FOREIGN KEY FK_C423A337FB88E14F');
        $this->addSql('ALTER TABLE intervenant DROP FOREIGN KEY FK_73D0145CB84DCA9B');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F974FC797');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F8327D3F4');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F3A8B7D2D');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C2426287ECF78B0');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAFB88E14F');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F45447ECF78B0');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F4544AFC2B591');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3D60322AC');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE devoir');
        $this->addSql('DROP TABLE grp_communication');
        $this->addSql('DROP TABLE groupe_utilisateur');
        $this->addSql('DROP TABLE inscri_evenement');
        $this->addSql('DROP TABLE intervenant');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE rôle');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE Événement');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
