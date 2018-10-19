
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
INSERT INTO livre VALUES ("1000000000011","Fondation","La base de la SF!",7.25,"photo_fondation","Isaac Asimov","Gallimard",256,'1957-01-01',1,1);
INSERT INTO livre VALUES ("1000000000012","Felicidad","Ce roman va vous surprendre !",7.25,"photo_felicidad","Jean Molas","Gallimard",100,'1999-01-01',1,1);


INSERT INTO livre VALUES ("1000000000014","Le Transperceneige","bd de SF",25.00,"photo_Transperceneige","Jacques Lob","casterman",100,'1990-01-01',1,2);
INSERT INTO livre VALUES ("1000000000015","CyberWar Tome 1","bd de SF",14.50,"photo_CyberWar","CyberWar","Delcourt",48,'2018-10-17',1,2);
INSERT INTO livre VALUES ("1000000000016","Renaissance Tome 1","bd de SF",14.00,"photo_Renaissance","Fred Duval","Dargaud",100,'2018-10-05',1,2);

INSERT INTO livre VALUES ("1000000000017","Gunnm","manga de SF",7.90,"photo_Gunnm","Yukito Kishiro","Glénat",100,'1990-01-01',1,3);
INSERT INTO livre VALUES ("1000000000018","Akira","manga de SF",13.25,"photo_Akira","Otomo Katsuhiro","Glénat",106,'1982-01-01',1,3);
INSERT INTO livre VALUES ("1000000000019","Pluto","manga de SF",8.00,"photo_Pluto","Tezuka Osamu","Kana",128,'2004-01-01',1,3);




/*Table Livre Fantastique*/
INSERT INTO livre VALUES ("1000000000021","Les fiancés de l'hivers","Le meilleur roman fantastique de l'histoire!",18.0,"photo_FinancesDeLHivers","Christelle Dabos","Gallimard",528,'2013-06-06',2,1);
INSERT INTO livre VALUES ("1000000000022","Harry Potter et la pierre philosophale","L'incontournable'",18.0,"photo_HP","JK Rowling","Gallimard",220,'1999-01-01',2,1);
INSERT INTO livre VALUES ("1000000000023","Percy Jackson Tome 1","Le classique",14.90,"photo_PErcyJackson","Rick Riordan","Albin Michel",432,'2013-07-03',2,1);

INSERT INTO livre VALUES ("1000000000024","Les naufragés d'Ythaq Tome 1","Bande dessinnée fanastique ",14.50,"photo_NaufragesYthaq","Christophe Arleston","Soleil",62,'2005-07-01',2,2);
INSERT INTO livre VALUES ("1000000000025","Océane, La fée des houles Tome 1","Bande dessinnée fanastique ",14.90,"photo_Oceane","Eric Le Berre","GUYMIC",102,'2018-10-19',2,2);
INSERT INTO livre VALUES ("1000000000026","Brocéliande Tome 1","Bande dessinnée fanastique ",14.95,"photo_Broceliande","Olivier Peru","Soleil",62,'2017-06-07',2,2);

INSERT INTO livre VALUES ("1000000000027","Radiant Tome 1","manga fantastique",7.16,"photo_Radiant","Tony Valente","Ankama",174,'2013-07-04',2,3);
INSERT INTO livre VALUES ("1000000000028","Fairy Tail Tome 1","manga fantastique",6.95,"photo_FairyTail","Hiro Mashima","Pika",136,'2006-01-01',2,3);
INSERT INTO livre VALUES ("1000000000029","Seven deadly sins Tome 1","manga fantastique",6.95,"photo_Nanatsu","Suzuki Nakaba","Pika",143,'2012-01-01',2,3);


/*Table Livre Histoire*/
INSERT INTO livre VALUES ("1000000000031"," Tous les secrets du IIIe Reich ","Roman historique!",25.0,"photo_SecretReichIII","François Kersaudy","Perrin",480,'2017-01-20',3,1);
INSERT INTO livre VALUES ("1000000000032","Azteca","Roman historique!",10.0,"photo_Azteca","Garry Jennings","Le Livre de Poche",1050,'1991-01-01',3,1);
INSERT INTO livre VALUES ("1000000000033","La guerre et la paix ","Roman historique!",9.40,"photo_GuerreEtPaix","Leon Tolstoi","Gallimard",800,'2002-07-01',3,1);

INSERT INTO livre VALUES ("1000000000034","Alix Senator Tome 1","Bande dessinnée historique ",13.95,"photo_AlixSenator","Valérie Mangin","Casterman",148,'2018-11-21',3,2);
INSERT INTO livre VALUES ("1000000000035","Alix Senator Tome 1","Bande dessinnée historique ",13.95,"photo_AlixSenator","Valérie Mangin","Casterman",148,'2018-11-21',3,2);
INSERT INTO livre VALUES ("1000000000036","Alix Senator Tome 1","Bande dessinnée historique ",13.95,"photo_AlixSenator","Valérie Mangin","Casterman",148,'2018-11-21',3,2);

INSERT INTO livre VALUES ("1000000000037","Save me pythie Tome 1","manga historique",7.16,"photo_SaveMePythie","Elsa BRANTS","Global Manga",102,'2013-07-04',3,3);
INSERT INTO livre VALUES ("1000000000038","Innocent Tome 1","manga historique",7.99,"photo_Innocent","Sakamoto Shinichi","Delcourt",156,'2013-01-04',3,3);
INSERT INTO livre VALUES ("1000000000039","Innocent Rouge Tome 1","manga historique",7.99,"photo_InnocentRouge","Sakamoto Shinichi","Delcourt",176,'2015-01-04',3,3);


/*Table Livre Policier*/
INSERT INTO livre VALUES ("1000000000041","  Le Signal  ","Roman Policier!",23.90,"photo_Signal","Maxime Chattam","Albin Michel",150,'2018-10-24',4,1);
INSERT INTO livre VALUES ("1000000000042","Lazarus","Bande dessinnée Policière ",14.95,"photo_Lazarus","Greg Rucka","Glenat",112,'2018-08-19',4,2);
INSERT INTO livre VALUES ("1000000000043","Blue heaven","manga Policier",6.28,"photo_BlueEven","Tsutomu","Panini",192,'2005-03-01',4,3);

INSERT INTO livre VALUES ("1000000000044","Le crime de l'Orient Express","Un classique de la litterature policière",8.50,"photo_Crime_Orient","Agatha Christie","Pocket",243,'1974-03-21',4,1);
INSERT INTO livre VALUES ("1000000000045","Le chien des Baskerville","Une aventure de Sherlock Holmes!",6.20,"photo_Chien","Arthur Conan Doyle","Poche",270,'1895-06-09',4,1);
INSERT INTO livre VALUES ("1000000000046","Detective Conan","On suit Conan, le petit détective!",7.90,"photo_Conan","Gyosho Aoyama","Kana",150,'1994-03-01',4,3);
INSERT INTO livre VALUES ("1000000000047","Border","manga Policier ! ",7.90,"photo_Border","Yua Tokegawa","Kana",184,'2013-08-02',4,3);
INSERT INTO livre VALUES ("1000000000048","Chateau Bordeaux","BD Policiere",13.50,"photo_Bordeau","Corbeyan","Glénat",96,'2018-09-26',4,2);
INSERT INTO livre VALUES ("1000000000049","L'art du crime","BD Policiere tres bien",13.90,"photo_Art_Crime","Olivier Berlion","Glénat",82,'2018-05-30',4,2);


/* Table Livre Cuisine */
INSERT INTO livre VALUES ("1000000000050","Gastronogeek","Livre de recette geek!",24.50,"photo_gastronogeek","Thibaud Villanova","Hachette",144,'2016-10-11',5,1);
INSERT INTO livre VALUES ("1000000000051","Dans les cuisines de l'histoire","bd de cuisine",17.95,"photo_Dans_Cuisine","Isabelle Bauthian","Le Lombard",120,'2017-04-14',5,2);
INSERT INTO livre VALUES ("1000000000052","Food War","manga de cuisine!",7.99,"photo_Food_War","Shun Saeki","Delcourt",244,'2014-09-10',5,3);

INSERT INTO livre VALUES ("1000000000053","La cuisine des Sorciers","Livre de recette pour sorciers",22.50,"photo_cuisine_sorcier","Aurelia Beaupommier","Solar",144,'2015-10-11',5,1);
INSERT INTO livre VALUES ("1000000000054","Geek & pastry","recette de patisseries geek!",24.90,"photo_Geek_Pastry","Thibaud Villanova","Hachette",120,'2017-12-14',5,1);
INSERT INTO livre VALUES ("1000000000055","Artiste : un chef d'exception","On suit l'histoire d'un chef de cuisine",7.90,"photo_Artiste","Taro Sadoemo","Glénat",134,'2007-09-10',5,3);
INSERT INTO livre VALUES ("1000000000056","Toriko","Toriko le chef! ",7.80,"photo_Toriko","Mitsutoki Shimabukuro","Karé",143,'2005-10-11',5,3);
INSERT INTO livre VALUES ("1000000000057","La cuisine de Mamette","bd de cuisine avec Mamette",15.95,"photo_Mamette","Nob","Glénat",128,'2017-04-14',5,2);
INSERT INTO livre VALUES ("1000000000058","Comment nourir un régiment","bd de cuisine ",17.90,"photo_Regiment","Etienne Gendrin","Casterman",204,'2012-09-10',5,2);

/* Table Livre Thriller */
INSERT INTO livre VALUES ("1000000000060","Intimidation","Nouveau roman de Coben!",7.90,"photo_inimidation","Harlan Coben","pocket",432,'2017-10-05',6,1);
INSERT INTO livre VALUES ("1000000000061","La fille du train","Un voyage effrayant !",7.90,"photo_train","Paula Hawkins","pocket",245,'2013-10-05',6,1);
INSERT INTO livre VALUES ("1000000000062","Millénium - Les hommes qui n'aiment pas les femmes","Un pour délice!",15.90,"photo_millenium1","Stieg Larson","Albin Michel",432,'2005-10-05',6,1);

INSERT INTO livre VALUES ("1000000000063","Prophecy - tome 1","manga thriller",20.90,"photo_Prophecy1","Tetsuya Tsutsui","Kioon",218,'2012-06-28',6,3);
INSERT INTO livre VALUES ("1000000000064","Prophecy - tome 2","manga thriller",20.90,"photo_Prophecy2","Tetsuya Tsutsui","Kioon",218,'2013-06-28',6,3);
INSERT INTO livre VALUES ("1000000000065","Prophecy - tome 3","manga thriller",20.90,"photo_Prophecy3","Tetsuya Tsutsui","Kioon",218,'2014-06-28',6,3);

INSERT INTO livre VALUES ("1000000000066","Le pouvoir des Innocents","thriller sanglant!",37.90,"photo_Pouvoir_Innocents","Hirn Brunschwig","Delcourt",62,'1992-01-01',6,2);
INSERT INTO livre VALUES ("1000000000067","Le pouvoir des innocents - Tome 2 - Amy","Palpitant !",12.90,"photo_amy","Luc Brunchwig","Delcourt",30,'1994-10-05',6,2);
INSERT INTO livre VALUES ("1000000000068","Le pouvoir des innocents - Tome 1 - Joshua","Palpitant !",12.90,"photo_joshuan","Luc Brunchwig","Delcourt",31,'1992-10-05',6,2);



/* Table Livre Adolescent */
INSERT INTO livre VALUES ("1000000000070","Hunger Games - Tome 1","Best-seller! ",7.90,"photo_Hunger_Games1","Suzanne Colins","Pocket Jeunesse",432,'2015-06-04',7,1);
INSERT INTO livre VALUES ("1000000000071","Hunger Games - Tome 2 - L'embrasement","Best-seller! ",7.90,"photo_Hunger_Games2","Suzanne Colins","Pocket Jeunesse",456,'2016-06-04',7,1);
INSERT INTO livre VALUES ("1000000000072","Hunger Games - Tome 3 - La révolte","Best-seller! ",7.90,"photo_Hunger_Games3","Suzanne Colins","Pocket Jeunesse",500,'2017-06-04',7,1);


INSERT INTO livre VALUES ("1000000000073","Tom-Tom et Nana - Subliiiimes","petite BD pour enfant",9.95,"photo_Tomtom_Nana","Catherine Viansson Ponte","Bayard Jeunesse",90,'2017-03-08',7,2);
INSERT INTO livre VALUES ("1000000000074","Seuls - Tome 1 - La disparition","une BD parfaite pour votre ado !",9.95,"photo_seuls1","Fabien Vehlmann","Bayard Jeunesse",90,'2010-03-08',7,2);

INSERT INTO livre VALUES ("1000000000075","Seuls - Tome 2 - Le Maitre des couteaux","une BD parfaite pour votre ado !",9.95,"photo_seuls2","Fabien Vehlmann","Bayard Jeunesse",90,'2010-03-08',7,2);


INSERT INTO livre VALUES ("1000000000076","Chocola et Vanilla - Tome 1","Un shojo adorable",6.60,"photo_Chocola_Vanilla1","Moyoco Anno","Kurokawa",208,'2007-04-01',7,3);
INSERT INTO livre VALUES ("1000000000077","Chocola et Vanilla - Tome 2","Un shojo adorable",6.60,"photo_Chocola_Vanilla2","Moyoco Anno","Kurokawa",208,'2008-04-01',7,3);
INSERT INTO livre VALUES ("1000000000078","Chocola et Vanilla - Tome 3","Un shojo adorable",6.60,"photo_Chocola_Vanilla3","Moyoco Anno","Kurokawa",208,'2009-04-01',7,3);


/*Table Livre */
INSERT INTO magasin VALUES (1,"La Librairie","1 allée des tilleuls","38240","Saint Martin d'Hères");
INSERT INTO magasin VALUES (2,"La Librairie","91 rue du Coteau","38000","Grenoble");
INSERT INTO magasin VALUES (3,"La Librairie","18 route de Monestier","73000","Chambery");
INSERT INTO magasin VALUES (4,"La Librairie","12 rue Hector Berlioz","73100","Aix-les-bains");
INSERT INTO magasin VALUES (5,"La Librairie","11 rue Jean Marietta","69000","Lyon");
INSERT INTO magasin VALUES (6,"La Librairie","30 route de Savoie","69100","Villeurbanne");
INSERT INTO magasin VALUES (7,"La Librairie","72 rue Jean Jaures","38130","Echirolles");
INSERT INTO magasin VALUES (8,"La Librairie","12 rue des champs","73100","Aix-les-bains");
INSERT INTO magasin VALUES (9,"La Librairie","14 rue du théatre","38000","Grenoble");
INSERT INTO magasin VALUES (10,"La Librairie","5 rue de l'amitié","69000","Lyon");

/*Table disponibilite */

INSERT INTO disponibilite VALUES (1,"1000000000011",4);
INSERT INTO disponibilite VALUES (2,"1000000000011",3);
INSERT INTO disponibilite VALUES (3,"1000000000012",4);
INSERT INTO disponibilite VALUES (4,"1000000000012",3);
INSERT INTO disponibilite VALUES (5,"1000000000014",4);
INSERT INTO disponibilite VALUES (6,"1000000000014",3);
INSERT INTO disponibilite VALUES (7,"1000000000015",4);
INSERT INTO disponibilite VALUES (8,"1000000000015",3);
INSERT INTO disponibilite VALUES (9,"1000000000016",4);

INSERT INTO disponibilite VALUES (1,"1000000000016",4);
INSERT INTO disponibilite VALUES (2,"1000000000017",3);
INSERT INTO disponibilite VALUES (3,"1000000000017",4);
INSERT INTO disponibilite VALUES (4,"1000000000018",3);
INSERT INTO disponibilite VALUES (5,"1000000000018",4);
INSERT INTO disponibilite VALUES (6,"1000000000019",3);
INSERT INTO disponibilite VALUES (7,"1000000000019",4);
INSERT INTO disponibilite VALUES (8,"1000000000021",3);
INSERT INTO disponibilite VALUES (9,"1000000000021",3);

INSERT INTO disponibilite VALUES (1,"1000000000022",4);
INSERT INTO disponibilite VALUES (2,"1000000000022",3);
INSERT INTO disponibilite VALUES (3,"1000000000023",4);
INSERT INTO disponibilite VALUES (4,"1000000000023",3);
INSERT INTO disponibilite VALUES (5,"1000000000024",4);
INSERT INTO disponibilite VALUES (6,"1000000000024",3);
INSERT INTO disponibilite VALUES (7,"1000000000025",4);
INSERT INTO disponibilite VALUES (8,"1000000000025",3);
INSERT INTO disponibilite VALUES (9,"1000000000026",3);

INSERT INTO disponibilite VALUES (1,"1000000000026",4);
INSERT INTO disponibilite VALUES (2,"1000000000027",3);
INSERT INTO disponibilite VALUES (3,"1000000000027",4);
INSERT INTO disponibilite VALUES (4,"1000000000028",3);
INSERT INTO disponibilite VALUES (5,"1000000000028",4);
INSERT INTO disponibilite VALUES (6,"1000000000029",3);
INSERT INTO disponibilite VALUES (7,"1000000000029",4);
INSERT INTO disponibilite VALUES (8,"1000000000031",3);
INSERT INTO disponibilite VALUES (9,"1000000000031",3);

INSERT INTO disponibilite VALUES (1,"1000000000032",4);
INSERT INTO disponibilite VALUES (2,"1000000000032",3);
INSERT INTO disponibilite VALUES (3,"1000000000033",4);
INSERT INTO disponibilite VALUES (4,"1000000000033",3);
INSERT INTO disponibilite VALUES (5,"1000000000034",4);
INSERT INTO disponibilite VALUES (6,"1000000000034",3);
INSERT INTO disponibilite VALUES (7,"1000000000035",4);
INSERT INTO disponibilite VALUES (8,"1000000000035",3);
INSERT INTO disponibilite VALUES (9,"1000000000036",3);

INSERT INTO disponibilite VALUES (1,"1000000000036",4);
INSERT INTO disponibilite VALUES (2,"1000000000037",3);
INSERT INTO disponibilite VALUES (3,"1000000000037",4);
INSERT INTO disponibilite VALUES (4,"1000000000038",3);
INSERT INTO disponibilite VALUES (5,"1000000000038",4);
INSERT INTO disponibilite VALUES (6,"1000000000039",3);
INSERT INTO disponibilite VALUES (7,"1000000000039",4);
INSERT INTO disponibilite VALUES (8,"1000000000041",3);
INSERT INTO disponibilite VALUES (9,"1000000000041",3);

INSERT INTO disponibilite VALUES (1,"1000000000042",4);
INSERT INTO disponibilite VALUES (2,"1000000000042",3);
INSERT INTO disponibilite VALUES (3,"1000000000043",4);
INSERT INTO disponibilite VALUES (4,"1000000000043",3);
INSERT INTO disponibilite VALUES (5,"1000000000044",4);
INSERT INTO disponibilite VALUES (6,"1000000000044",3);
INSERT INTO disponibilite VALUES (7,"1000000000045",4);
INSERT INTO disponibilite VALUES (8,"1000000000045",3);
INSERT INTO disponibilite VALUES (9,"1000000000046",3);

INSERT INTO disponibilite VALUES (1,"1000000000046",4);
INSERT INTO disponibilite VALUES (2,"1000000000047",3);
INSERT INTO disponibilite VALUES (3,"1000000000047",4);
INSERT INTO disponibilite VALUES (4,"1000000000048",3);
INSERT INTO disponibilite VALUES (5,"1000000000048",4);
INSERT INTO disponibilite VALUES (6,"1000000000049",3);
INSERT INTO disponibilite VALUES (7,"1000000000049",4);
INSERT INTO disponibilite VALUES (8,"1000000000050",3);
INSERT INTO disponibilite VALUES (9,"1000000000050",3);

INSERT INTO disponibilite VALUES (1,"1000000000051",4);
INSERT INTO disponibilite VALUES (2,"1000000000051",3);
INSERT INTO disponibilite VALUES (3,"1000000000052",4);
INSERT INTO disponibilite VALUES (4,"1000000000052",3);
INSERT INTO disponibilite VALUES (5,"1000000000053",4);
INSERT INTO disponibilite VALUES (6,"1000000000053",3);
INSERT INTO disponibilite VALUES (7,"1000000000054",4);
INSERT INTO disponibilite VALUES (8,"1000000000054",3);
INSERT INTO disponibilite VALUES (9,"1000000000055",3);

INSERT INTO disponibilite VALUES (1,"1000000000055",4);
INSERT INTO disponibilite VALUES (2,"1000000000056",3);
INSERT INTO disponibilite VALUES (3,"1000000000056",4);
INSERT INTO disponibilite VALUES (4,"1000000000057",3);
INSERT INTO disponibilite VALUES (5,"1000000000057",4);
INSERT INTO disponibilite VALUES (6,"1000000000058",3);
INSERT INTO disponibilite VALUES (7,"1000000000058",4);
INSERT INTO disponibilite VALUES (8,"1000000000060",3);
INSERT INTO disponibilite VALUES (9,"1000000000060",3);

INSERT INTO disponibilite VALUES (1,"1000000000061",4);
INSERT INTO disponibilite VALUES (2,"1000000000061",3);
INSERT INTO disponibilite VALUES (3,"1000000000062",4);
INSERT INTO disponibilite VALUES (4,"1000000000062",3);
INSERT INTO disponibilite VALUES (5,"1000000000063",4);
INSERT INTO disponibilite VALUES (6,"1000000000063",3);
INSERT INTO disponibilite VALUES (7,"1000000000064",4);
INSERT INTO disponibilite VALUES (8,"1000000000064",3);
INSERT INTO disponibilite VALUES (9,"1000000000065",3);

INSERT INTO disponibilite VALUES (1,"1000000000065",4);
INSERT INTO disponibilite VALUES (2,"1000000000066",3);
INSERT INTO disponibilite VALUES (3,"1000000000066",4);
INSERT INTO disponibilite VALUES (4,"1000000000067",3);
INSERT INTO disponibilite VALUES (5,"1000000000067",4);
INSERT INTO disponibilite VALUES (6,"1000000000068",3);
INSERT INTO disponibilite VALUES (7,"1000000000068",4);
INSERT INTO disponibilite VALUES (8,"1000000000070",3);
INSERT INTO disponibilite VALUES (9,"1000000000070",3);

INSERT INTO disponibilite VALUES (1,"1000000000071",4);
INSERT INTO disponibilite VALUES (2,"1000000000071",3);
INSERT INTO disponibilite VALUES (3,"1000000000072",4);
INSERT INTO disponibilite VALUES (4,"1000000000073",3);
INSERT INTO disponibilite VALUES (5,"1000000000073",4);
INSERT INTO disponibilite VALUES (6,"1000000000074",3);
INSERT INTO disponibilite VALUES (7,"1000000000074",4);
INSERT INTO disponibilite VALUES (8,"1000000000075",3);
INSERT INTO disponibilite VALUES (9,"1000000000075",3);

INSERT INTO disponibilite VALUES (1,"1000000000076",4);
INSERT INTO disponibilite VALUES (2,"1000000000076",3);
INSERT INTO disponibilite VALUES (3,"1000000000077",4);
INSERT INTO disponibilite VALUES (4,"1000000000077",3);
INSERT INTO disponibilite VALUES (5,"1000000000078",4);
INSERT INTO disponibilite VALUES (6,"1000000000078",3);
