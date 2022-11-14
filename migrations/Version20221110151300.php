<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221110151300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE api_clients (id INT AUTO_INCREMENT NOT NULL, client_id VARCHAR(255) DEFAULT NULL, client_name VARCHAR(255) DEFAULT NULL, active TINYINT(1) NOT NULL, short_description VARCHAR(255) DEFAULT NULL, full_description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, dpo VARCHAR(255) DEFAULT NULL, technical_contact VARCHAR(255) DEFAULT NULL, commercial_contact VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apiclientsgrants (id INT AUTO_INCREMENT NOT NULL, client_grant_id INT DEFAULT NULL, client_id INT DEFAULT NULL, install_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, perms VARCHAR(255) NOT NULL, branch_id TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_6927648972EAB936 (client_grant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apiclientsgrants ADD CONSTRAINT FK_6927648972EAB936 FOREIGN KEY (client_grant_id) REFERENCES api_clients (id)');
        $this->addSql('ALTER TABLE user ADD apiclients_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499B494274 FOREIGN KEY (apiclients_id) REFERENCES api_clients (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6499B494274 ON user (apiclients_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499B494274');
        $this->addSql('ALTER TABLE apiclientsgrants DROP FOREIGN KEY FK_6927648972EAB936');
        $this->addSql('DROP TABLE api_clients');
        $this->addSql('DROP TABLE apiclientsgrants');
        $this->addSql('DROP INDEX IDX_8D93D6499B494274 ON user');
        $this->addSql('ALTER TABLE user DROP apiclients_id');
    }
}
