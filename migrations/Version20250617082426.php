<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250617082426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE stat (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, bonus_stat_id INT DEFAULT NULL, weapon_type_id INT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, base_atk INT DEFAULT NULL, base_weapon_skill LONGTEXT NOT NULL, rarity INT NOT NULL, INDEX IDX_6933A7E6F8CBC703 (bonus_stat_id), INDEX IDX_6933A7E6607BCCD7 (weapon_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE weapon_type (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E6F8CBC703 FOREIGN KEY (bonus_stat_id) REFERENCES stat (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE weapon ADD CONSTRAINT FK_6933A7E6607BCCD7 FOREIGN KEY (weapon_type_id) REFERENCES weapon_type (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE resonator CHANGE rarity rarity INT NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE weapon DROP FOREIGN KEY FK_6933A7E6F8CBC703
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE weapon DROP FOREIGN KEY FK_6933A7E6607BCCD7
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE stat
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE weapon
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE weapon_type
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `resonator` CHANGE rarity rarity VARCHAR(20) NOT NULL
        SQL);
    }
}
