INSERT INTO users (username, email, password, language)
VALUES ("admin", "ribeirohugo.op@gmail.com", "$2y$12$0IGfhQJuitCcPzXlDSKAm.IQ1o1.i9zSfXTX1oT5KiYQsanhVVeeG", "pt");

INSERT INTO country (name, slug) VALUES ("Portugal", "PT");
INSERT INTO country (name, slug) VALUES ("Spain", "ES");

SELECT id INTO @pt FROM country WHERE name = "Portugal";

INSERT INTO region (name, country) VALUES ("Porto", );
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