
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
/*Table Livre Science-Fiction */
INSERT INTO livre VALUES ("1000000000011","Fondation","La base de la SF!",7.25,"photo_fondation","Isaac Asimov","Gallimard",256,'1957-01-01',1,1);
INSERT INTO livre VALUES ("1000000000012","Le Transperceneige","bd de SF",25.00,"photo_Transperceneige","Jacques Lob","casterman",100,'1990-01-01',1,2);
INSERT INTO livre VALUES ("1000000000013","Gunnm","manga de SF",7.90,"photo_Gunnm","Yukito Kishiro","Glénat",100,'1990-01-01',1,3);

/*Table Livre Fantastique*/
INSERT INTO livre VALUES ("1000000000021","Les fiancés de l'hivers","Le meilleur roman fantastique de l'histoire!",18.0,"photo_FinancesDeLHivers","Christelle Dabos","Gallimard",528,'2013-06-06',2,1);
INSERT INTO livre VALUES ("1000000000022","Les naufragés d'Ythaq Tome 1","Bande dessinnée fanastique ",14.50,"photo_NaufragesYthaq","Christophe Arleston","Soleil",62,'2005-07-01',2,2);
INSERT INTO livre VALUES ("1000000000023","Radiant Tome 1","manga fantastique",7.16,"photo_Radiant","Tony Valente","Ankama",174,'2013-0704',2,3);

/*Table Livre Histoire*/
INSERT INTO livre VALUES ("1000000000031"," Tous les secrets du IIIe Reich ","Roman historique!",25.0,"photo_SecretReichIII","François Kersaudy","Perrin",480,'2017-01-20',3,1);
INSERT INTO livre VALUES ("1000000000032","Alix Senator Tome 1","Bande dessinnée historique ",13.95,"photo_AlixSenator","Valérie Mangin","Casterman",148,'2018-11-21',3,2);
INSERT INTO livre VALUES ("1000000000033","Save me pythie Tome 1","manga historique",7.16,"photo_SaveMePythie","Elsa BRANTS","Global Manga",102,'2013-07-04',3,3);

/*Table Livre Policier*/
INSERT INTO livre VALUES ("1000000000041","  Le Signal  ","Roman Policier!",23.90,"photo_Signal","Maxime Chattam","Albin Michel",150,'2018-10-24',4,1);
INSERT INTO livre VALUES ("1000000000042","Lazarus","Bande dessinnée Policière ",14.95,"photo_Lazarus","Greg Rucka","Glenat",112,'2018-08-19',4,2);
INSERT INTO livre VALUES ("1000000000043","Blue heaven","manga Policier",6.28,"photo_BlueEven","Tsutomu","Panini",192,'2005-03-01',4,3);


/* Table Livre Cuisine */
INSERT INTO livre VALUES ("1000000000050","Gastronogeek","Livre de recette geek!",22.50,"photo_gastronogeek","Thibaud Villanova","Hachette",144,'2016-10-11',5,1);
INSERT INTO livre VALUES ("1000000000051","Dans les cuisines de l'histoire","bd de cuisine",17.95,"photo_Dans_Cuisine","Isabelle Bauthian","Le Lombard",120,'2017-04-14',5,2);
INSERT INTO livre VALUES ("1000000000052","Food War","manga de cuisine!",7.90,"photo_Food_War","Shun Saeki","Delcourt",244,'2014-09-10',5,3);

/* Table Livre Thriller */
INSERT INTO livre VALUES ("1000000000060","Intimidation","Nouveau roman de Coben!",7.90,"photo_inimidation","Harlan Coben","pocket",432,'2017-10-05',6,1);
INSERT INTO livre VALUES ("1000000000061","Prophecy - tome 1","manga thriller",20.90,"photo_Prophecy","Tetsuya Tsutsui","Kioon",218,'2012-06-28',6,3);
INSERT INTO livre VALUES ("1000000000062","Le pouvoir des Innocents","thriller sanglant!",37.90,"photo_Pouvoir_Innocents","Hirn Brunschwig","Delcourt",62,'1992-01-01',6,2);

/* Table Livre Adolescent */
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
