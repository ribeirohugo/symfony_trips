/*Apagar tabelas*/
/*SET FOREIGN_KEY_CHECKS=0;
DROP TABLE user;
DROP TABLE country;
DROP TABLE contact;
DROP TABLE company;
DROP TABLE task;
DROP TABLE action;
SET FOREIGN_KEY_CHECKS=1;*/

/*Tabela utilizadores*/
CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	username VARCHAR(250) NOT NULL,
	email VARCHAR(250) NOT NULL UNIQUE,
	phone VARCHAR(15),
	password VARCHAR(64),
	language VARCHAR(5),
	timestamp datetime default CURRENT_TIMESTAMP
);

/*Country table*/
CREATE TABLE country (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250) NOT NULL UNIQUE,
	slug VARCHAR(250) NOT NULL
);

/*Region table*/
CREATE TABLE region (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250) UNIQUE,
	country INT,

	CONSTRAINT fk_region_country FOREIGN KEY (country) REFERENCES country(id)
);

/*Location table*/
CREATE TABLE location (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250) UNIQUE,
	region INT,

	CONSTRAINT fk_location_region FOREIGN KEY (region) REFERENCES region(id)
);

/* Activity Type. */
CREATE TABLE activity_type (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250) NOT NULL UNIQUE
);

/*Tabela activity or trip */
CREATE TABLE activity (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250),
	description TEXT,
	timestamp datetime default CURRENT_TIMESTAMP,
	drive_files VARCHAR(250),
	activity_type INT,

	CONSTRAINT fk_activity_type FOREIGN KEY (activity_type) REFERENCES activity_type(id)
);

/* Place Type. It could be Hosting, Restaurant, Attraction, Club */
CREATE TABLE place_type (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250) NOT NULL UNIQUE
);

/* Hosting Type. */
CREATE TABLE hosting_type (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250) NOT NULL UNIQUE
);

/* Attraction Type. */
/*CREATE TABLE attraction_type (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250) NOT NULL UNIQUE
);*/

/* Place table */
CREATE TABLE place (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250) NOT NULL,
	description TEXT,
	timestamp datetime default CURRENT_TIMESTAMP,
	location INT,
	place_type INT,
	last_price FLOAT,
	main_contact VARCHAR(250),

	positive_points TEXT,
	negative_points TEXT,
	address VARCHAR(250),

	stars VARCHAR(1),
	hosting_type INT,

	CONSTRAINT fk_place_location FOREIGN KEY (location) REFERENCES location(id),
	CONSTRAINT fk_place_type FOREIGN KEY (place_type) REFERENCES place_type(id),
	CONSTRAINT fk_place_hosting_type FOREIGN KEY (hosting_type) REFERENCES hosting_type(id)
);

/*Contacts table*/
CREATE TABLE contact (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250),
	email VARCHAR(250),
	phone VARCHAR(15),
	phone2 VARCHAR(15),
	description TEXT,
	timestamp datetime default CURRENT_TIMESTAMP,
	skype VARCHAR(150),
	activity INT,

	CONSTRAINT fk_contact_activity FOREIGN KEY (activity) REFERENCES activity(id)
);

/* Contact - Place relationship*/
CREATE TABLE contact_place (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	contact INT,
	place INT,

	CONSTRAINT fk_contact_place_contact FOREIGN KEY (contact) REFERENCES contact(id),
	CONSTRAINT fk_contact_place_place FOREIGN KEY (place) REFERENCES place(id)
);

/*Product table*/
CREATE TABLE product (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	name VARCHAR(250),
	price FLOAT
);

/* Product - Activity relationship*/
CREATE TABLE product_activity (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	product INT,
	activity INT,

	CONSTRAINT fk_product_activity_product FOREIGN KEY (product) REFERENCES product(id),
	CONSTRAINT fk_product_activity_activity FOREIGN KEY (activity) REFERENCES activity(id)
);

/*City Tour table*/
CREATE TABLE city_tour (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	title VARCHAR(250),
	activity INT,

	CONSTRAINT fk_city_tour_activity FOREIGN KEY (activity) REFERENCES activity(id)
);

/*Team Building table*/
CREATE TABLE team_building (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	url VARCHAR(250),
	activity INT,

	CONSTRAINT fk_team_building_activity FOREIGN KEY (activity) REFERENCES activity(id)
);

/*Edition table*/
CREATE TABLE edition (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	semester VARCHAR(250),
	activity INT,

	CONSTRAINT fk_edition_activity FOREIGN KEY (activity) REFERENCES activity(id)
);

/*Report table*/
CREATE TABLE report (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	url VARCHAR(250),
	edition INT,

	CONSTRAINT fk_report_edition FOREIGN KEY (edition) REFERENCES edition(id)
);

/*Budget table*/
CREATE TABLE budget (
	id INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	url VARCHAR(250),
	edition INT,

	CONSTRAINT fk_edition_budget FOREIGN KEY (edition) REFERENCES edition(id)
);