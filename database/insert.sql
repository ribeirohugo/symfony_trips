/* Insert admin user */
INSERT INTO users (username, email, password, language)
VALUES ("admin", "ribeirohugo.op@gmail.com", "$2y$12$0IGfhQJuitCcPzXlDSKAm.IQ1o1.i9zSfXTX1oT5KiYQsanhVVeeG", "pt");

/* Insert countries */
INSERT INTO country (name, slug) VALUES ("Portugal", "PT");
INSERT INTO country (name, slug) VALUES ("Spain", "ES");

/* Insert regions related to countries */
SELECT id INTO @pt FROM country WHERE name = "Portugal";

INSERT INTO region (name, country) VALUES ("Porto", @pt);
INSERT INTO region (name, country) VALUES ("Lisboa", @pt);
INSERT INTO region (name, country) VALUES ("Braga", @pt);
INSERT INTO region (name, country) VALUES ("Viana do Castelo", @pt);
INSERT INTO region (name, country) VALUES ("Vila Real", @pt);
INSERT INTO region (name, country) VALUES ("Bragança", @pt);
INSERT INTO region (name, country) VALUES ("Guarda", @pt);
INSERT INTO region (name, country) VALUES ("Aveiro", @pt);
INSERT INTO region (name, country) VALUES ("Viseu", @pt);
INSERT INTO region (name, country) VALUES ("Coimbra", @pt);
INSERT INTO region (name, country) VALUES ("Castelo Branco", @pt);
INSERT INTO region (name, country) VALUES ("Leiria", @pt);
INSERT INTO region (name, country) VALUES ("Santarém", @pt);
INSERT INTO region (name, country) VALUES ("Beja", @pt);
INSERT INTO region (name, country) VALUES ("Portalegre", @pt);
INSERT INTO region (name, country) VALUES ("Setúbal", @pt);
INSERT INTO region (name, country) VALUES ("Faro", @pt);
INSERT INTO region (name, country) VALUES ("Madeira", @pt);
INSERT INTO region (name, country) VALUES ("Açores", @pt);

/* Insert locations related to regions */
SELECT id INTO @region FROM region WHERE name = "Porto";
INSERT INTO location (name, region) VALUES ("Porto", @region);
INSERT INTO location (name, region) VALUES ("Matosinhos", @region);
INSERT INTO location (name, region) VALUES ("Valongo", @region);

SELECT id INTO @region FROM region WHERE name = "Lisboa";
INSERT INTO location (name, region) VALUES ("Lisboa", @region);
INSERT INTO location (name, region) VALUES ("Sintra", @region);

SELECT id INTO @region FROM region WHERE name = "Leiria";
INSERT INTO location (name, region) VALUES ("Fátima", @region);
INSERT INTO location (name, region) VALUES ("Óbidos", @region);
INSERT INTO location (name, region) VALUES ("Peniche", @region);

SELECT id INTO @region FROM region WHERE name = "Faro";
INSERT INTO location (name, region) VALUES ("Portimão", @region);
INSERT INTO location (name, region) VALUES ("Faro", @region);
INSERT INTO location (name, region) VALUES ("Albufeira", @region);

SELECT id INTO @region FROM region WHERE name = "Braga";
INSERT INTO location (name, region) VALUES ("Braga", @region);
INSERT INTO location (name, region) VALUES ("Guimarães", @region);

SELECT id INTO @region FROM region WHERE name = "Aveiro";
INSERT INTO location (name, region) VALUES ("Aveiro", @region);
INSERT INTO location (name, region) VALUES ("Arouca", @region);

SELECT id INTO @region FROM region WHERE name = "Coimbra";
INSERT INTO location (name, region) VALUES ("Coimbra", @region);

SELECT id INTO @region FROM region WHERE name = "Santarém";
INSERT INTO location (name, region) VALUES ("Tomar", @region);

/* Insert place types */
INSERT INTO place_type (name) VALUES ("Bar");
INSERT INTO place_type (name) VALUES ("Club");
INSERT INTO place_type (name) VALUES ("Hosting");
INSERT INTO place_type (name) VALUES ("Restaurant");

/* Insert attraction types */
INSERT INTO place_type (name) VALUES ("Beach");
INSERT INTO place_type (name) VALUES ("Monument");
INSERT INTO place_type (name) VALUES ("Museum");

/* Insert place */
SELECT id INTO @location FROM location WHERE name = "Porto";
SELECT id INTO @placetype FROM place_type WHERE name = "Monument";
INSERT INTO place(name, location, place_type, last_price) VALUES ("Torre dos Clérigos", @location, @placetype, 5.00);
INSERT INTO place(name, location, place_type, last_price) VALUES ("Sé Catedral", @location, @placetype, 0.00);
INSERT INTO place(name, location, place_type, last_price) VALUES ("Palácio da Bolsa", @location, @placetype, 7.00);

/* Insert status */
/*INSERT INTO status (name) VALUES ("Pending");
INSERT INTO status (name) VALUES ("Cancelled");
INSERT INTO status (name) VALUES ("Finished");*/

/* Insert activity type */
INSERT INTO activity_type (name) VALUES ("Travel");
INSERT INTO activity_type (name) VALUES ("Party");
INSERT INTO activity_type (name) VALUES ("Event");

/* Insert hosting type */
INSERT INTO hosting_type (name) VALUES ("Hotel");
INSERT INTO hosting_type (name) VALUES ("Hostel");
INSERT INTO hosting_type (name) VALUES ("House");

