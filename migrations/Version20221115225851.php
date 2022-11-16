<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221115225851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE structures ADD user_email_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE structures ADD CONSTRAINT FK_5BBEC55A48BF25C9 FOREIGN KEY (user_email_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5BBEC55A48BF25C9 ON structures (user_email_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE structures DROP FOREIGN KEY FK_5BBEC55A48BF25C9');
        $this->addSql('DROP INDEX IDX_5BBEC55A48BF25C9 ON structures');
        $this->addSql('ALTER TABLE structures DROP user_email_id');
    }
}
