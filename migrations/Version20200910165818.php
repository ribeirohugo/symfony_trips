<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200910165818 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Relational Model first implementation.';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(250) DEFAULT NULL, email VARCHAR(250) DEFAULT NULL, phone VARCHAR(15) DEFAULT NULL, password VARCHAR(64) DEFAULT NULL, language VARCHAR(5) DEFAULT NULL, timestamp DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) DEFAULT NULL, price DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE place_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE hosting_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) DEFAULT NULL, slug VARCHAR(2) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, country INT DEFAULT NULL, name VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, region INT DEFAULT NULL, name VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');

        $this->addSql("CREATE TABLE place(
            id INT AUTO_INCREMENT NOT NULL,
            hosting_type INT DEFAULT NULL,
            location INT DEFAULT NULL,
            place_type INT DEFAULT NULL,
            name VARCHAR(250) DEFAULT NULL,
            description TEXT DEFAULT NULL,
            timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
            last_price DOUBLE PRECISION DEFAULT NULL,
            main_contact VARCHAR(250) DEFAULT NULL,
            positive_points TEXT DEFAULT NULL,
            negative_points TEXT DEFAULT NULL,
            address VARCHAR(250) DEFAULT NULL,
            drive_files VARCHAR(250) DEFAULT NULL,
            stars VARCHAR(1) DEFAULT NULL,
            PRIMARY KEY(id))");
        $this->addSql('CREATE TABLE activity_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(250) DEFAULT NULL, description TEXT DEFAULT NULL, timestamp DATETIME DEFAULT CURRENT_TIMESTAMP, drive_files VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE team_building (id INT AUTO_INCREMENT NOT NULL, activity INT DEFAULT NULL, url VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE product_activity (id INT AUTO_INCREMENT NOT NULL, activity INT DEFAULT NULL, product INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE edition (id INT AUTO_INCREMENT NOT NULL, activity INT DEFAULT NULL, semester VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, edition INT DEFAULT NULL, url VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE budget (id INT AUTO_INCREMENT NOT NULL, edition INT DEFAULT NULL, url VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');

        $this->addSql("CREATE TABLE contact (
        id INT AUTO_INCREMENT NOT NULL,
        activity INT DEFAULT NULL,
        name VARCHAR(250) DEFAULT NULL,
        email VARCHAR(250) DEFAULT NULL,
        phone VARCHAR(15) DEFAULT NULL,
        phone2 VARCHAR(15) DEFAULT NULL,
        description TEXT DEFAULT NULL,
        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
        skype VARCHAR(150) DEFAULT NULL,
        PRIMARY KEY(id))");

        $this->addSql('CREATE TABLE contact_place (id INT AUTO_INCREMENT NOT NULL, contact INT DEFAULT NULL, place INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE city_tour (id INT AUTO_INCREMENT NOT NULL, activity INT DEFAULT NULL, title VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id))');

        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_REGION_COUNTRY FOREIGN KEY (country) REFERENCES country (id)');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_LOCATION_REGION FOREIGN KEY (region) REFERENCES region (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_PLACE_HOSTING_TYPE FOREIGN KEY (hosting_type) REFERENCES hosting_type (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_PLACE_LOCATION FOREIGN KEY (location) REFERENCES location (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_PLACE_TYPE FOREIGN KEY (place_type) REFERENCES place_type (id)');
        $this->addSql('ALTER TABLE team_building ADD CONSTRAINT FK_TEAM_BUILDING_ACTIVITY FOREIGN KEY (activity) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE product_activity ADD CONSTRAINT FK_PA_ACTIVITY FOREIGN KEY (activity) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE product_activity ADD CONSTRAINT FK_PA_PRODUCT FOREIGN KEY (product) REFERENCES product (id)');
        $this->addSql('ALTER TABLE edition ADD CONSTRAINT FK_EDITION_ACTIVITY FOREIGN KEY (activity) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_REPORT_EDITION FOREIGN KEY (edition) REFERENCES edition (id)');
        $this->addSql('ALTER TABLE budget ADD CONSTRAINT FK_BUDGET_EDITION FOREIGN KEY (edition) REFERENCES edition (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_CONTACT_ACTIVITY FOREIGN KEY (activity) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE contact_place ADD CONSTRAINT FK_CP_CONTACT FOREIGN KEY (contact) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE contact_place ADD CONSTRAINT FK_CP_PLACE FOREIGN KEY (place) REFERENCES place (id)');
        $this->addSql('ALTER TABLE city_tour ADD CONSTRAINT FK_CITY_TOUR_ACTIVITY FOREIGN KEY (activity) REFERENCES activity (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city_tour DROP FOREIGN KEY FK_CITY_TOUR_ACTIVITY');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_CONTACT_ACTIVITY');
        $this->addSql('ALTER TABLE edition DROP FOREIGN KEY FK_EDITION_ACTIVITY');
        $this->addSql('ALTER TABLE product_activity DROP FOREIGN KEY FK_PA_ACTIVITY');
        $this->addSql('ALTER TABLE team_building DROP FOREIGN KEY FK_TEAM_BUILDING_ACTIVITY');
        $this->addSql('ALTER TABLE contact_place DROP FOREIGN KEY FK_CP_CONTACT');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_REGION_COUNTRY');
        $this->addSql('ALTER TABLE budget DROP FOREIGN KEY FK_BUDGET_EDITION');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_REPORT_EDITION');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_PLACE_HOSTING_TYPE');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_PLACE_LOCATION');
        $this->addSql('ALTER TABLE contact_place DROP FOREIGN KEY FK_CP_PLACE');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_PLACE_TYPE');
        $this->addSql('ALTER TABLE product_activity DROP FOREIGN KEY FK_PA_PRODUCT');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_LOCATION_REGION');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_type');
        $this->addSql('DROP TABLE budget');
        $this->addSql('DROP TABLE city_tour');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_place');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE edition');
        $this->addSql('DROP TABLE hosting_type');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE place_type');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE product_activity');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE team_building');
        $this->addSql('DROP TABLE users');
    }
}
