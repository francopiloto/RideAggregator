CREATE DATABASE mad3134_ride;
USE mad3134_ride;

CREATE TABLE places (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	latitude VARCHAR(255) NOT NULL,
	longitude VARCHAR(255) NOT NULL
);

CREATE TABLE legs (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	origin INT NOT NULL,
	destination INT NOT NULL,
	price VARCHAR(255) NOT NULL,
	provider VARCHAR(255) NOT NULL,
	FOREIGN KEY (origin) REFERENCES places(id),
	FOREIGN KEY (destination) REFERENCES places(id)
);

INSERT INTO places (name,latitude,longitude) VALUES ('Lambton College',43.773410,-79.335415);
INSERT INTO places (name,latitude,longitude) VALUES ('Fairview Mall',43.776936,-79.344649);
INSERT INTO places (name,latitude,longitude) VALUES ('55 Charolais Blvd, Brampton', 43.667156, -79.741632);

INSERT INTO legs (origin,destination,price,provider) VALUES (1,2,'3.00','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,1,'3.00','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,3,'3.00','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,3,'3.00','Lambton Bus');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,1,'3.00','Lambton Bus');


