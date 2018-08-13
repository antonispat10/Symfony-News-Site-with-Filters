<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180813181030 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE countries (id INT AUTO_INCREMENT NOT NULL, country_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY fk_posts_categories');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY fk_posts_languages');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY fk_posts_years');
        $this->addSql('ALTER TABLE posts CHANGE category_id category_id INT DEFAULT NULL, CHANGE language_id language_id INT DEFAULT NULL, CHANGE year_id year_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX fk_posts_categories ON posts');
        $this->addSql('CREATE INDEX IDX_885DBAFA12469DE2 ON posts (category_id)');
        $this->addSql('DROP INDEX fk_posts_languages ON posts');
        $this->addSql('CREATE INDEX IDX_885DBAFA82F1BAF4 ON posts (language_id)');
        $this->addSql('DROP INDEX fk_posts_years ON posts');
        $this->addSql('CREATE INDEX IDX_885DBAFA40C1FEA7 ON posts (year_id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT fk_posts_categories FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT fk_posts_languages FOREIGN KEY (language_id) REFERENCES languages (id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT fk_posts_years FOREIGN KEY (year_id) REFERENCES years (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE countries');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFA12469DE2');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFA82F1BAF4');
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFA40C1FEA7');
        $this->addSql('ALTER TABLE posts CHANGE category_id category_id INT NOT NULL, CHANGE language_id language_id INT NOT NULL, CHANGE year_id year_id INT NOT NULL');
        $this->addSql('DROP INDEX idx_885dbafa40c1fea7 ON posts');
        $this->addSql('CREATE INDEX fk_posts_years ON posts (year_id)');
        $this->addSql('DROP INDEX idx_885dbafa82f1baf4 ON posts');
        $this->addSql('CREATE INDEX fk_posts_languages ON posts (language_id)');
        $this->addSql('DROP INDEX idx_885dbafa12469de2 ON posts');
        $this->addSql('CREATE INDEX fk_posts_categories ON posts (category_id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFA12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFA82F1BAF4 FOREIGN KEY (language_id) REFERENCES languages (id)');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFA40C1FEA7 FOREIGN KEY (year_id) REFERENCES years (id)');
    }
}
