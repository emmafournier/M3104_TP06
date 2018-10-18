CREATE TABLE livre
(
  ISBN char(13) primary key,
  titre varchar,
  comp_info varchar,
  prix numeric,
  photo varchar,
  auteur varchar,
  editeur varchar,
  nb_pages integer,
  date_parution date

)

CREATE TABLE categorie
(
  idCategorie integer,
  libelle varchar()

)

CREATE TABLE format
