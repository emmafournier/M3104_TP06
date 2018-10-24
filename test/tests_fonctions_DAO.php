<?php
  include_once("../model/DAO.class.php");

//==============================================================================
// tests Livre
//==============================================================================

// ---------- test n°1 : firstN(int $nb) : array -------------------------------
// fonction qui prend en paramètre n , un entier
// la fonction est censé rendre un array contenant les n premiers livres
// classés dans l'ordre des ISBN

// résultat de la BD pour $n = 3 :
  //  resultat[0]->titre = "Fondation" ;
  //  resultat[1]->titre = "Felicidad" ;
  //  resultat[2]->titre = "La zone du Dehors" ;

// affichage attendu :
  // valeur du titre : Fondation
  // valeur du titre : Felicidad
  // valeur du titre : La zone du Dehors

$resultat = $dao->firstN(3);
foreach ($resultat as $livre) {
  echo "valeur du titre : ".$livre->get("titre")."\n";
}

// ---------- test n°2 : getN(string $isbn,int $n) : array ---------------------
// la fonction prend en paramètre un entier n , et une chaine ISBN
// elle est censé rendre un array contenant les n premiers livres
// classés dans l'ordre des ISBN après une certaine valeur ISBN $isbn

// résultat de la BD pour $n = 3 et $isbn = "1000000000023" (Percy Jackson)
  //  resultat[0]->titre = "Les naufragés d'Ythaq Tome 1" ;
  //  resultat[1]->titre = "Océane, La fée des houles Tome 1" ;
  //  resultat[2]->titre = "Brocéliande Tome 1" ;

  // affichage attendu :
    // valeur du titre : Les naufragés d'Ythaq Tome 1
    // valeur du titre : Océane, La fée des houles Tome 1
    // valeur du titre : Brocéliande Tome 1

    $resultat = $dao->getN("1000000000023",3);
    foreach ($resultat as $livre) {
      echo "valeur du titre : ".$livre->get("titre")."\n";
    }

// ---------- test n°3 : next(string $isbn) : string ---------------------------
// la fonction prend en paramètre une chaine ISNB $isbn et renvoie une chaine ISBN

// résultat de la BD pour $isbn="1000000000044" (Le crime de l'Orient Express)
  //  resultat = "1000000000045" ; (Le chien des Baskerville)

// affichage attendu :
  // valeur de l'isbn du livre suivant : 1000000000045

    $resultat = $dao->next("1000000000044");
    echo "valeur de l'isbn du livre suivant :".$resultat."\n";

// ---------- test n°4 : prevN(string $isbn,int $n) : array --------------------
// la fonction prend en paramètre un ISBN $isbn et un nb le livre $n et
// renvoie un array des n livres qui précèdent de $n l'isbn $isbn dans l'ordre des isbn

// résultat de la BD pour $isbn="1000000000044" (Le crime de l'Orient Express) et $n = 3
  //  resultat[0]->titre = "Blue heaven" ;
  //  resultat[1]->titre = "Lazarus" ;
  //  resultat[2]->titre = "  Le Signal  " ;

// affichage attendu :
  // valeur du titre : Blue heaven
  // valeur du titre : Lazarus
  // valeur du titre :   Le Signal

  $resultat = $dao->prevN("1000000000044",3);
  foreach ($resultat as $livre) {
    echo "valeur du titre : ".$livre->get("titre")."\n";
  }

// ---------- test n°5 :  getLivre(string $isbn) : Livre -----------------------
// la fonction prend en paramètre une chaine ISNB $isbn
// et renvoie l'objet Livre correspondant à l'ISBN, NULL sinon

// résultat de la BD pour $isbn="1000000000044" (Le crime de l'Orient Express)
  //  resultat = Livre("1000000000044","Le crime de l'Orient Express","Un classique de la litterature policière",8.50,"photo_Crime_Orient","Agatha Christie","Pocket",243,'1974-03-21',4,1);

// affichage attendu :
  // valeur du titre pour l'isbn choisie : Le crime de l'Orient Express

$resultat = $dao->getLivre("1000000000044");
echo "valeur du titre pour l'isbn choisie : ".$resultat->get("titre")."\n";


// ---------- test n°6 : getNBLivre() : int  -----------------------------------
// la fonction renvoie le nombre total de livre contenu dans la base de donnée

// résultat de la BD
  //  resultat = 63 (nombre total de livre)

// affichage attendu :
  // nombre total de livre sur le site : 63

  $resultat = $dao->getNBLivre();
  echo "nombre total de livre sur le site : ".$resultat."\n";

  //==============================================================================
  // tests Catégorie
  //==============================================================================

  // ---------- test n°1 : getAllCat() : array ---------------------------------
  // la fonction renvoie tout les Objet Catégorie de la base de donnée

  // résultat de la BD
    //  resultat[0]->libelle = "Science-Fiction"
    //  resultat[1]->libelle = "Fantastique"
    //  resultat[2]->libelle = "Histoire"
    //  resultat[3]->libelle = "Policier"
    //  resultat[4]->libelle = "Cuisine"
    //  resultat[5]->libelle = "Thriller"
    //  resultat[6]->libelle = "Adolescent"


  // affichage attendu :
    // libelle d'une categorie : Science-Fiction
    // libelle d'une categorie : Fantastique
    // libelle d'une categorie : Histoire
    // libelle d'une categorie : Policier
    // libelle d'une categorie : Cuisine
    // libelle d'une categorie : Thriller
    // libelle d'une categorie : Adolescent

    $resultat = $dao->getAllCat();
    foreach ($resultat as $cat) {
      echo "libelle d'une categorie : ".$cat->get("libelle")."\n";
    }

  // ---------- test n°2 : getCat(int $n) : Categorie --------------------------
  // la fonction prend en paramètre $n, l'identifiant d'une catégorie
  // et renvoie l'Objet Categorie correspondant à cette identifiant

  // résultat de la BD pour $n="4" (Policier)
    //  resultat->libelle = "Policier"

  // affichage attendu :
    // libellé de la catégorie choisie : Policier

    $resultat = $dao->getCat(4);
    echo "libellé de la catégorie choisie : ".$resultat->get("libelle")."\n";

  // ---------- test n°3 : getNCateg(string $isbn,int $n,int $categorie) : array
  // la fonction prend en paramètre une chaine ISBN $isbn, un nombre de livre $n
  // et un identifiant de catégorie $categorie
  // elle renvoie un array contenant les $n premiers livres dans l'ordre des ISBN
  // suivant $isbn et de la catégorie correspondant à $categorie

  // résultat de la BD pour $isbn="1000000000044" (Le crime de l'Orient Express) et $n = 3
  // et $categorie = 4
    //  resultat[0]->titre = "Le chien des Baskerville" ;
    //  resultat[1]->titre = "Detective Conan" ;
    //  resultat[2]->titre = "Border" ;

  // affichage attendu :
    // valeur du titre : Le chien des Baskerville
    // valeur du titre : Detective Conan
    // valeur du titre : Border

    $resultat = $dao->getNCateg("1000000000044",3,4);
    foreach ($resultat as $livre) {
      echo "valeur du titre : ".$livre->get("titre")."\n";
    }

  // ---------- test n°4 : firstNCateg(int $n, int $idCategorie) : array -------
    // la fonction prend en paramètre un nombre de livre $n et un identifiant
    // de catégorie $idCategorie
    // Elle renvoie un array des $n premiers livres d'une certaines catégorie $idCategorie

    // résultat de la BD pour $n=3 et $idCategorie=3
      //  resultat[0]->titre = " Tous les secrets du IIIe Reich " ;
      //  resultat[1]->titre = "Azteca" ;
      //  resultat[2]->titre = "La guerre et la paix" ;

    // affichage attendu :
      // valeur du titre :  Tous les secrets du IIIe Reich
      // valeur du titre : Azteca
      // valeur du titre : La guerre et la paix

      $resultat = $dao->firstNCateg(,3,3);
      foreach ($resultat as $livre) {
        echo "valeur du titre : ".$livre->get("titre")."\n";
      }

  // ---------- test n°5 :nextCateg(string $isbn,int $idCategorie) : string ----
    // la fonction prend en paramètre une chaine ISBN $isbn et un identifiant
    // de catégorie $idCategorie
    // elle renvoie l'ISBN du livre juste après le livre $isbn, appartenant
    // à la categorie de $idCategorie

    // résultat de la BD pour $isbn="1000000000044" (Le crime de l'Orient Express)
      //  resultat = "1000000000045" (Le chien des Baskerville)

    // affichage attendu :
      // ISBN du livre suivant de la même catégorie : 1000000000045

      $resultat = $dao->nextCateg("1000000000044");
      echo "ISBN du livre suivant de la même catégorie : ".$resultat."\n";

  // ---------- test n°6 :prevNCateg(string $isbn,int $n,int $idCategorie): array
    // la fonction prend en paramètre une chaine ISBN $isbn, un nombre de livre $n
    // et un identifiant de catégorie $idCategorie
    // elle renvoie un array de $n livres de la catégorie de l' $idCategorie précédant
    // le livre d'ISBN $isbn

    // résultat de la BD pour $isbn="1000000000064" (Prophecy - tome 2) et $n = 3
    // et $idCategorie = 6
      //  resultat[0]->titre = "Prophecy - tome 1" ;
      //  resultat[1]->titre = "Millénium - Les hommes qui n'aiment pas les femmes" ;
      //  resultat[2]->titre = "La fille du train" ;

    // affichage attendu :
      // valeur du titre : Prophecy - tome 1
      // valeur du titre : Millénium - Les hommes qui n'aiment pas les femmes
      // valeur du titre : La fille du train

      $resultat = $dao->prevNCateg("1000000000064",3,6);
      foreach ($resultat as $livre) {
        echo "valeur du titre : ".$livre->get("titre")."\n";
      }

  // ---------- test n°7 : getNBLivreCat(int $idCategorie) : int ---------------
    // la fonction prend en paramètre un identifiant de categorie $idCategorie
    // et renvoie le nombre de livres totaux de cette categorie

    // résultat de la BD pour $n="4" (Policier)
      //  resultat = 9

    // affichage attendu :
      // Nombre de livre dans cette catégorie : 9

      $resultat = $dao->getNBLivreCat(4);
      echo "Nombre de livre dans cette catégorie : ".$resultat."\n";


//==============================================================================
// tests Format
//==============================================================================
  // ---------- test n°1 : getAllFormat() : array ------------------------------

  // la fonction renvoie tout les Objet Format de la base de donnée

  // résultat de la BD
    //  resultat[0]->libelle = "Romans"
    //  resultat[1]->libelle = "Bandes-dessinées"
    //  resultat[2]->libelle = "Mangas"

  // affichage attendu :
    // libelle d'un format : Romans
    // libelle d'un format : Bandes-dessinées
    // libelle d'un format : Mangas


    $resultat = $dao->getAllFormat();
    foreach ($resultat as $format) {
      echo "valeur d'un format : ".$format->get("libelle")."\n";
    }

  // ---------- test n°2 : getFormat(int $id): Format --------------------------
    // la fonction prend en paramètre un identifiant de formay $id et
    // renvoie le format correspondant

    // résultat de la BD pour $id="3" (Mangas)
      //  resultat->get("libelle") = "Mangas"

    // affichage attendu :
      // Libelle du Format : Mangas

      $resultat = $dao->getFormat(4);
      echo "Libelle du Format : ".$resultat->get("libelle")."\n";

  // ---------- test n°3 :getNFormat(string $isbn,int $n,int $idFormat) : array-
    // la fonction prend en paramètre une chaine isbn $isbn, un nombre de livre $n
    // et un identifiant de format $idFormat
    // elle renvoie un array de $n livres du format correspondant à $idFormat et
    // suivant l'isbn $isbn

    // résultat de la BD de $n=3 , $isbn="1000000000025" (Océane, La fée des houles Tome 1)
    // et $idFormat = 2 (Bandes-dessinées)
      //  resultat[0]->titre = "Brocéliande Tome 1"
      //  resultat[1]->titre = "Alix Senator Tome 1"
      //  resultat[2]->titre = "14-18 La lune en héritage"

    // affichage attendu :
      // valeur du titre :  Brocéliande Tome 1
      // valeur du titre :  Alix Senator Tome 1
      // valeur du titre : 14-18 La lune en héritage

      $resultat = $dao->getNFormat("1000000000025",3,2);
      foreach ($resultat as $livre) {
        echo "valeur du titre : ".$livre->get("titre")."\n";
      }

  // ---------- test n°4 :firstNFormat(int $n, int $idFormat) : array-----------
    // la fonction prend en paramètre un nombre de livre $n et un identifiant de
    // format $idFormat
    // elle renvoie les $n premiers livres du format $idFormat


    // résultat de la BD de $n=4 et $idFormat = 1 (Bandes-dessinées)
      //  resultat[0]->titre = "Fondation"
      //  resultat[1]->titre = "Felicidad"
      //  resultat[2]->titre = "La zone du Dehors"
      //  resultat[3]->titre = "Les fiancés de l'hivers"

    // affichage attendu :
      // valeur du titre :  Fondation
      // valeur du titre :  Felicidad
      // valeur du titre : La zone du Dehors
      // valeur du titre : Les fiancés de l'hivers

      $resultat = $dao->firstNFormat(4,1);
      foreach ($resultat as $livre) {
        echo "valeur du titre : ".$livre->get("titre")."\n";
      }

  // ---------- test n°5 : nextFormat(string $isbn,int $idFormat) : string -----
    // la fonction prend en paramètre la chaine ISBN $isbn et l'identifiant de Format
    // $idFormat
    // elle renvoie l'isbn du livre suivant le livre $isbn appartenant au format
    // de $idFormat

    // résultat de la BD pour $isbn="1000000000039" (Innocent Rouge Tome 1) et
    // $idFormat = 3
      //  resultat = "1000000000047" (Border)

    // affichage attendu :
      // ISBN du livre suivant de même format : 1000000000047

    $resultat = $dao->nextFormat("1000000000047",3)
    echo "ISBN du livre suivant de même format : ".$resultat."\n";

  // ---------- test n°5 :getNBLivreFormat(int $idFormat) : int ----------------
    // la fonction prend en paramètre un identifiant de Format $idFormat
    // elle renvoie le nombre total de livre du format de $idFormat

    // résultat de la BD pour $idFormat=1 (Romans)
      //  resultat = 21

    // affichage attendu :
      // Nombre de livre dans ce format : 21

      $resultat = $dao->getNBLivreFormat(1);
      echo "Nombre de livre dans ce format : ".$resultat."\n";


//==============================================================================
// tests Magasin
//==============================================================================
    // ---------- test n°1 : getAllMaga() : array ------------------------------
    // la fonction renvoie tout les magasins de la base de donnée

    // résultat de la BD
      //  resultat[0]->idMagasin = 1
      //  resultat[1]->idMagasin = 2
      //  resultat[2]->idMagasin = 3
      // ...
      //  resultat[9]->id = 10

    // affichage attendu :
      // id du magasin : 1
      // id du magasin : 2
      // id du magasin : 3
      // ....
      // id du magasin : 10

      $resultat = $dao->getAllMaga;
      foreach ($resultat as $maga) {
        echo "valeur du titre : ".$maga->get("idMagasin")."\n";
      }

  // ---------- test n°2 : getMaga(string $id) : Magasin -----------------------
    // la fonction prend en paramètre un identifiant de magasin $id et
    // renvoie l'objet Magasin correspondant à cet $id

    // résultat de la BD pour $idMagasin = 5
      //  resultat->get("ville") = "Lyon"

    // affichage attendu :
      // Magasin à cet identifiant : Lyon

      $resultat = $dao->getMaga(5);
      echo "Magasin à cet identifiant : ".$resultat."\n";

// ---------- test n°3 : getMagaDepartement(string $departement) : array -------
  // la fonction prend en paramètre un code postale $departement et
  // renvoie tout les objets Magasins correspondant à ce code postale

  // résultat de la BD pour $departement="73100" (Aix-les-bains)
    //  resultat[0]->idMagasin = 4
    //  resultat[1]->idMagasin = 8

  // affichage attendu :
    // id du magasin de ce code postale : 4
    // id du magasin de ce code postale : 8

    $resultat = $dao->getMagaDepartement("73100");
    foreach ($resultat as $maga) {
      echo "valeur du titre : ".$maga->get("idMagasin")."\n";
    }


//==============================================================================
// tests Disponibilite
//==============================================================================
  // ---------- test n°1 : nbDisponibilite(string $isbn) : int------------------
    // la fonction prend en paramètre un ISBN $isbn et renvoie
    // le nombre de disponibilite du dit livre

  // résultat de la BD pour $isbn="1000000000044" (Le crime de l'Orient Express)
    //  resultat = 7

  // affichage attendu :
    // nombre d'exemplaire disponible : 7

    $resultat = $dao->nbDisponibilite("1000000000044");
    echo "nombre d'exemplaire disponible : ".$resultat."\n";

// ---------- test n°2 : listeMagDispo(string $isbn) : array--------------------
  // la fonction prend en paramètre un ISBN $isbn et renvoie
  // un array de Magasin possédant le livre de l'$isbn

  // résultat de la BD pour $isbn="1000000000044" (Le crime de l'Orient Express)
    //  resultat[0]->idMagasin = 5
    //  resultat[1]->idMagasin = 6

  // affichage attendu :
    // id du magasin ou le livre est disponible : 5
    // id du magasin ou le livre est disponible : 6

    $resultat = $dao->listeMagDispo("1000000000044");
    foreach ($resultat as $maga) {
      echo "valeur du titre : ".$maga->get("idMagasin")."\n";
    }valeur du titre : 

// ---------- test n°3 : nbExemplaireMag(string $isbn, int $idMag) : int--------
  // la fonctin prend en paramètre un ISBN $isbn et un identifiant de Magasin
  // $idMag . Elle renvoie
  // le nombre de livre d'isbn $isbn disponible dans le magasin $idMag

  // résultat de la BD pour $isbn="1000000000044" (Le crime de l'Orient Express)
  // et pour $idMag = 5
    //  resultat = 4

  // affichage attendu :
    // nombre d'exemplaire du livre disponible dans le magasin : 4

    $resultat = $dao->nbExemplaireMag("1000000000044",5);
    echo "nombre d'exemplaire du livre disponible dans le magasin : ".$resultat."\n";

// ---------- test n°4 : listeLivreDispo(string $idMagasin) : array-------------
  // la fonction prend en paramètre un identifiant de Magasin $idMagasin
  // et renvoie un array d'objet livre qui sont disponible dans le magasin $idMagasin

  // résultat de la BD pour $idMag = 5
    //  resultat[0]->get("ISBN") = "1000000000014"
    //  resultat[1]->get("ISBN") = "1000000000018"
    //  resultat[2]->get("ISBN") = "1000000000024"
    // ....
    //  resultat[12]->get("ISBN")= "1000000000078"

  // affichage attendu :
    // isbn du livre disponible dans le magasin : 1000000000014
    // isbn du livre disponible dans le magasin : 1000000000018
    // isbn du livre disponible dans le magasin : 1000000000024
    // ....
    // isbn du livre disponible dans le magasin : 1000000000078

    $resultat = $dao->listeLivreDispo(5);
    foreach ($resultat as $livre) {
      echo "isbn du livre disponible dans le magasin : ".$livre->get("ISBN")."\n";
    }




    ?>
