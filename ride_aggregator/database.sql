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

INSERT INTO places (name,latitude,longitude) VALUES ('Lambton College', 43.773410, -79.335415);
INSERT INTO places (name,latitude,longitude) VALUES ('Fairview Mall', 43.776936, -79.344649);
INSERT INTO places (name,latitude,longitude) VALUES ('55 Charolais Blvd, Brampton', 43.667156, -79.741632);
INSERT INTO places (name,latitude,longitude) VALUES ('CN Tower', 43.642473, -79.387121);
INSERT INTO places (name,latitude,longitude) VALUES ('Casa Loma', 43.677996, -79.409329);
INSERT INTO places (name,latitude,longitude) VALUES ('Pearson Airport', 43.678391, -79.618294);
INSERT INTO places (name,latitude,longitude) VALUES ('High Park', 43.654712, -79.460010);
INSERT INTO places (name,latitude,longitude) VALUES ('Royal Ontario Museum', 43.667555, -79.394760);
INSERT INTO places (name,latitude,longitude) VALUES ('Woodbine Beach', 43.663579, -79.308870);
INSERT INTO places (name,latitude,longitude) VALUES ('Square One, Mississauga', 43.594840, -79.640063);

INSERT INTO legs (origin,destination,price,provider) VALUES (1,2,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,3,'3.25','Lambton Bus');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,4,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,5,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,6,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,7,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,8,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,9,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (1,10,'3.00','Lambton Bus');

INSERT INTO legs (origin,destination,price,provider) VALUES (2,1,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,3,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,4,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,5,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,6,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,7,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,8,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,9,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (2,10,'0','0');

INSERT INTO legs (origin,destination,price,provider) VALUES (3,1,'3.00','Lambton Bus');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,2,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,4,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,5,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,6,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,7,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,8,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,9,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (3,10,'0','0');

INSERT INTO legs (origin,destination,price,provider) VALUES (4,1,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (4,2,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (4,3,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (4,5,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (4,6,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (4,7,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (4,8,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (4,9,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (4,10,'0','0');

INSERT INTO legs (origin,destination,price,provider) VALUES (5,1,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (5,2,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (5,3,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (5,4,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (5,6,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (5,7,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (5,8,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (5,9,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (5,10,'0','0');

INSERT INTO legs (origin,destination,price,provider) VALUES (6,1,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (6,2,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (6,3,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (6,4,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (6,5,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (6,7,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (6,8,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (6,9,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (6,10,'0','0');

INSERT INTO legs (origin,destination,price,provider) VALUES (7,1,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (7,2,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (7,3,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (7,4,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (7,5,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (7,6,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (7,8,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (7,9,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (7,10,'0','0');

INSERT INTO legs (origin,destination,price,provider) VALUES (8,1,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (8,2,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (8,3,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (8,4,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (8,5,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (8,6,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (8,7,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (8,9,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (8,10,'0','0');

INSERT INTO legs (origin,destination,price,provider) VALUES (9,1,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (9,2,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (9,3,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (9,4,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (9,5,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (9,6,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (9,7,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (9,8,'3.25','TTC');
INSERT INTO legs (origin,destination,price,provider) VALUES (9,10,'0','0');

INSERT INTO legs (origin,destination,price,provider) VALUES (10,1,'3.00','Lambton Bus');
INSERT INTO legs (origin,destination,price,provider) VALUES (10,2,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (10,3,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (10,4,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (10,5,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (10,6,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (10,7,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (10,8,'0','0');
INSERT INTO legs (origin,destination,price,provider) VALUES (10,9,'0','0');



