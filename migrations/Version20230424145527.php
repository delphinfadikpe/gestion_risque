<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424145527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, code_agence VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, departement_id INT NOT NULL, intitule VARCHAR(255) NOT NULL, est_agent_risque TINYINT(1) NOT NULL, est_responsable TINYINT(1) NOT NULL, INDEX IDX_268B9C9DCCF9E01E (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bale_niveau1 (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bale_niveau2 (id INT AUTO_INCREMENT NOT NULL, bale_niveau1_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_225DBA2F4C15005A (bale_niveau1_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bale_niveau3 (id INT AUTO_INCREMENT NOT NULL, bale_niveau2_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, typologie_irregularite VARCHAR(255) NOT NULL, INDEX IDX_555A8AB95EA0AFB4 (bale_niveau2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification_perte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE decisioncas (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, agence_id INT NOT NULL, libelle_departement VARCHAR(255) NOT NULL, INDEX IDX_C1765B63D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_pret_system (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etude_de_cas (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluationt_perte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_database (id INT AUTO_INCREMENT NOT NULL, agent_id INT NOT NULL, proprio_id INT DEFAULT NULL, decisioncas_id INT DEFAULT NULL, type_reference_id INT DEFAULT NULL, bale_niveau1_id INT DEFAULT NULL, bale_niveau2_id INT DEFAULT NULL, bale_niveau3_id INT DEFAULT NULL, departement_id INT DEFAULT NULL, typologie_irregularite_id INT DEFAULT NULL, etat_pret_system_id INT DEFAULT NULL, statut_perte_id INT DEFAULT NULL, classification_perte_id INT DEFAULT NULL, evaluationt_perte_id INT DEFAULT NULL, id_event VARCHAR(255) NOT NULL, date_ouv_dossier DATE NOT NULL, nature_incident VARCHAR(255) NOT NULL, date_decouverte DATE NOT NULL, date_statut_cas DATE DEFAULT NULL, date_affectation DATE DEFAULT NULL, date_fin_traitement DATE DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, est_pour_credit TINYINT(1) DEFAULT NULL, code_client VARCHAR(255) DEFAULT NULL, date_decais DATE DEFAULT NULL, montant_pret NUMERIC(10, 0) DEFAULT NULL, description_cas_pret VARCHAR(255) DEFAULT NULL, etat_impaye VARCHAR(255) DEFAULT NULL, description_cas_autre VARCHAR(255) NOT NULL, montant_brut NUMERIC(10, 0) DEFAULT NULL, montant_net NUMERIC(10, 0) DEFAULT NULL, INDEX IDX_8FBFEFFE3414710B (agent_id), INDEX IDX_8FBFEFFE6B82600 (proprio_id), INDEX IDX_8FBFEFFED607BA6F (decisioncas_id), INDEX IDX_8FBFEFFE910664AC (type_reference_id), INDEX IDX_8FBFEFFE4C15005A (bale_niveau1_id), INDEX IDX_8FBFEFFE5EA0AFB4 (bale_niveau2_id), INDEX IDX_8FBFEFFEE61CC8D1 (bale_niveau3_id), INDEX IDX_8FBFEFFECCF9E01E (departement_id), INDEX IDX_8FBFEFFE8229B4F7 (typologie_irregularite_id), INDEX IDX_8FBFEFFED8857FF6 (etat_pret_system_id), INDEX IDX_8FBFEFFEB0BA60CC (statut_perte_id), INDEX IDX_8FBFEFFE4A2ABF3D (classification_perte_id), INDEX IDX_8FBFEFFE84C1AAAE (evaluationt_perte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_perte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_reference (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typologie_irregularite (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vent (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DCCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE bale_niveau2 ADD CONSTRAINT FK_225DBA2F4C15005A FOREIGN KEY (bale_niveau1_id) REFERENCES bale_niveau1 (id)');
        $this->addSql('ALTER TABLE bale_niveau3 ADD CONSTRAINT FK_555A8AB95EA0AFB4 FOREIGN KEY (bale_niveau2_id) REFERENCES bale_niveau2 (id)');
        $this->addSql('ALTER TABLE departement ADD CONSTRAINT FK_C1765B63D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFE3414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFE6B82600 FOREIGN KEY (proprio_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFED607BA6F FOREIGN KEY (decisioncas_id) REFERENCES decisioncas (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFE910664AC FOREIGN KEY (type_reference_id) REFERENCES type_reference (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFE4C15005A FOREIGN KEY (bale_niveau1_id) REFERENCES bale_niveau1 (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFE5EA0AFB4 FOREIGN KEY (bale_niveau2_id) REFERENCES bale_niveau2 (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFEE61CC8D1 FOREIGN KEY (bale_niveau3_id) REFERENCES bale_niveau3 (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFECCF9E01E FOREIGN KEY (departement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFE8229B4F7 FOREIGN KEY (typologie_irregularite_id) REFERENCES typologie_irregularite (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFED8857FF6 FOREIGN KEY (etat_pret_system_id) REFERENCES etat_pret_system (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFEB0BA60CC FOREIGN KEY (statut_perte_id) REFERENCES statut_perte (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFE4A2ABF3D FOREIGN KEY (classification_perte_id) REFERENCES classification_perte (id)');
        $this->addSql('ALTER TABLE event_database ADD CONSTRAINT FK_8FBFEFFE84C1AAAE FOREIGN KEY (evaluationt_perte_id) REFERENCES evaluationt_perte (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DCCF9E01E');
        $this->addSql('ALTER TABLE bale_niveau2 DROP FOREIGN KEY FK_225DBA2F4C15005A');
        $this->addSql('ALTER TABLE bale_niveau3 DROP FOREIGN KEY FK_555A8AB95EA0AFB4');
        $this->addSql('ALTER TABLE departement DROP FOREIGN KEY FK_C1765B63D725330D');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFE3414710B');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFE6B82600');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFED607BA6F');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFE910664AC');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFE4C15005A');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFE5EA0AFB4');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFEE61CC8D1');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFECCF9E01E');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFE8229B4F7');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFED8857FF6');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFEB0BA60CC');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFE4A2ABF3D');
        $this->addSql('ALTER TABLE event_database DROP FOREIGN KEY FK_8FBFEFFE84C1AAAE');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE bale_niveau1');
        $this->addSql('DROP TABLE bale_niveau2');
        $this->addSql('DROP TABLE bale_niveau3');
        $this->addSql('DROP TABLE classification_perte');
        $this->addSql('DROP TABLE decisioncas');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE etat_pret_system');
        $this->addSql('DROP TABLE etude_de_cas');
        $this->addSql('DROP TABLE evaluationt_perte');
        $this->addSql('DROP TABLE event_database');
        $this->addSql('DROP TABLE statut_perte');
        $this->addSql('DROP TABLE type_reference');
        $this->addSql('DROP TABLE typologie_irregularite');
        $this->addSql('DROP TABLE vent');
    }
}
