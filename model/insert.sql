
/*Table format*/
INSERT INTO format VALUES (1,"Romans");
INSERT INTO format VALUES (2,"Bandes-dessinées");
INSERT INTO format VALUES (3,"Mangas");

/*Table categorie*/
INSERT INTO categorie VALUES (1,"Science-Fiction");
INSERT INTO categorie VALUES (2,"Fantastique");
INSERT INTO categorie VALUES (3,"Histoire");
INSERT INTO categorie VALUES (4,"Policier");
INSERT INTO categorie VALUES (5,"Cuisine");
INSERT INTO categorie VALUES (6,"Thriller");
INSERT INTO categorie VALUES (7,"Adolescent");

/*Table Livre */
INSERT INTO livre VALUES ("1000000000000","Fondation","La base de la SF!",7.25,"photo_fondation","Isaac Asimov","Gallimard",256,'1957-01-01',1,1);
INSERT INTO livre VALUES ("1000000000001","Gunnm","manga de SF",7.90,"photo_Gunnm","Yukito Kishiro","Glénat",100,'1990-01-01',1,3);
INSERT INTO livre VALUES ("1000000000002","Le Transperceneige","bd de SF",25.00,"photo_Transperceneige","Jacques Lob","casterman",100,'1990-01-01',1,3);

/* Cuisine */
INSERT INTO livre VALUES ("1000000000050","Gastronogeek","Livre de recette geek!",22.50,"photo_gastronogeek","Thibaud Villanova","Hachette",144,'2016-10-11',5,1);
INSERT INTO livre VALUES ("1000000000051","Dans les cuisines de l'histoire","bd de cuisine",17.95,"photo_Dans_Cuisine","Isabelle Bauthian","Le Lombard",120,'2017-04-14',5,2);
INSERT INTO livre VALUES ("1000000000052","Food War","manga de cuisine!",7.90,"photo_Food_War","Shun Saeki","Delcourt",244,'2014-09-10',5,3);

/* Thriller */
INSERT INTO livre VALUES ("1000000000060","Intimidation","Nouveau roman de Coben!",7.90,"photo_inimidation","Harlan Coben","pocket",432,'2017-10-05',6,1);
INSERT INTO livre VALUES ("1000000000061","Prophecy - tome 1","manga thriller",20.90,"photo_Prophecy","Tetsuya Tsutsui","Kioon",218,'2012-06-28',6,3);
INSERT INTO livre VALUES ("1000000000062","Le pouvoir des Innocents","thriller sanglant!",37.90,"photo_Pouvoir_Innocents","Hirn Brunschwig","Delcourt",62,'1992-01-01',6,2);

/* Histoire */
INSERT INTO livre VALUES ("1000000000070","Hunger Games","Best-seller! ",7.90,"photo_Hunger_Games","Suzanne Colins","Pocket Jeunesse",432,'2015-06-04',7,1);
INSERT INTO livre VALUES ("1000000000071","Tom-Tom et Nana - Subliiiimes","petite db pour enfant",9.95,"photo_Tomtom_Nana","Catherine Viansson Ponte","Bayard Jeunesse",90,'2017-03-08',7,2);
INSERT INTO livre VALUES ("1000000000072","Chocola et Vanilla","Un shojo adorable",6.60,"photo_Chocola_Vanilla","Moyoco Anno","Kurokawa",208,'2007-04-01',7,3);




ISBN char(13) primary key,
titre varchar,
comp_info varchar,
prix numeric,
photo varchar,
auteur varchar,
editeur varchar,
nb_pages integer,
date_parution date
idCategorie integer references categorie(idCategorie),
idFormat integer references format(idFormat)
