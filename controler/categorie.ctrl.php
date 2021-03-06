<?php


include_once("../model/DAO.class.php");
include_once("../model/Utilisateur.class.php");
include_once("../model/ElementPanier.class.php");

// ouverture de la session si aucune session ouverte
if(!isset($_SESSION)){
  session_start();
}

// si l'utilisateur clique sur le bouton déconnexion : fermeture et ouverture d'une nouvelle session

if(isset($_GET['btnDeconnexion'])){
  session_destroy();
  session_start();
  $_SESSION['panier'] = array();
}

// listes de toutes les catégories et de tous les formats pour le menu
$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

// si un utilisateur est connecté, on récupère ces informations
if (isset($_SESSION['utilisateur'])){
  $utilisateur = $_SESSION['utilisateur'];
}

// on récupère la catégorie de produits à afficher
if (isset($_GET['idCategorie'])) {

  $idCategorie = $_GET['idCategorie'];

}
else{
  // par défaut c'est la catégorie 1
  $idCategorie = 1;
}

// ISBN du premier produit affiché

if(isset($_GET['ISBN'])){
 $isbn = $_GET['ISBN'];
}
else{
 $isbn = $dao->firstNCateg(1,$idCategorie)[0]->__get('ISBN');
}

//définition du nombre de produits à afficher sur la page (via une liste déroulante)

if(isset($_GET['listeNbLibre'])){
  if($_GET['listeNbLibre'] == 0){
    // affichage de tous les produits de la catégorie

    $nbLivres =  $dao->getNBLivreCat($idCategorie);
    $total = true;
  }
  else{
    $nbLivres = $_GET['listeNbLibre'];
    $total = false;
  }
}
else{
  // par défaut 5 produits

  $nbLivres = 5;
  $total = false;
}


// on récupère les livres à afficher et la catégorie correspondante
$categorie = $dao->getCat($idCategorie);
$livres = $dao->getNCateg($isbn,$nbLivres,$idCategorie);
//on récupère les livres de la page suivante s'il y en a
if($dao->next(end($livres)->__get("ISBN")) > 0){
  $next = $dao->getNCateg($dao->next(end($livres)->__get("ISBN")),$nbLivres,$idCategorie);
}
else{
  $next = array();
}
//on récupère les livres de la page précédentes
$pred = $dao->prevNCateg($livres[0]->__get("ISBN"),$nbLivres,$idCategorie);

// affichage de la vue correspondante
include("../view/categorie.view.php");
?>
