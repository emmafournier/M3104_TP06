CREATE TABLE categorie(
  idCategorie integer primary key,
  libelle varchar

);

CREATE TABLE format(
  idFormat integer primary key,
  libelle varchar
);

CREATE TABLE livre(
  ISBN char(13) primary key,
  titre varchar,
  comp_info varchar,
  prix numeric,
  photo varchar,
  auteur varchar,
  editeur varchar,
  nb_pages integer,
  date_parution date,
  idCategorie integer references categorie(idCategorie),
  idFormat integer references format(idFormat)

);

CREATE TABLE magasin(
  idMagasin integer primary key,
  nom varchar,
  adresse varchar,
  departement varchar(5),
  ville varchar
);

CREATE TABLE disponibilite(
  idMagasin integer references magasin(idMagasin),
  ISBN varchar(13) references livre(ISBN),
  nbExemplaires integer default 0,
  primary key(idMagasin,ISBN)

);

CREATE TABLE utilisateur(
  idUtilisateur varchar primary key,
  mot_de_passe varchar,
  adresse varchar
);

CREATE TABLE elementPanier(
  idUtilisateur varchar references utilisateur(idUtilisateur),
  ISBN char(13) references Livre(ISBN),
  nb_Exemplaires integer,
  primary key(idUtilisateur,ISBN)
);
