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
$nbLivres = 5;
$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

// si un utilisateur est connecté, on récupère ces informations
if (isset($_SESSION['utilisateur'])){
  $utilisateur = $_SESSION['utilisateur'];
}


// on récupère l'ISBN du produit à afficher
if(isset($_GET['ISBN'])){
 $isbn = $_GET['ISBN'];
}
else{
  // par défaut c'est le premier produit de la BD
 $isbn = (string)$dao->firstN(1)[0]->__get("ISBN");
}


// CONFIGURATION DU BOUTON RETOUR
// si l'utilisateur vient de la page format : bouton retour sur format
if(isset($_GET['idFormat'])){
 $idFormatQuery = $_GET['idFormat'];
 $query = "format.ctrl.php?idFormat=".$idFormatQuery;

 $valBouton = "Retour au format";
}
// si l'utilisateur vient de la page catégorie : bouton retour sur catégorie

else if(isset($_GET['idCategorie'])){
 $idCatQuery = $_GET['idCategorie'];
 $query = "categorie.ctrl.php?idCategorie=".$idCatQuery;
 $valBouton = "Retour à la categorie";

}else{
  // sinon bouton retour sur l'accueil
   $query = "accueil.ctrl.php";
   $valBouton = "Retour à l'accueil";
}

// on récupère le livre à aficher
$livre = $dao->getLivre($isbn);
// on récupère le nb d'exemplaires disponibles pour ce lire (tous magasins confondus)
$nbExemplaire = $dao->nbDisponibilite($isbn);

// on récupère sa catégorie
$idCatLivre = $livre->__get("idCategorie");
$catLivre = $dao->getCat($idCatLivre);

// on récupère son format
$idFormatLivre = $livre->__get("idFormat");
$formatLivre = $dao->getFormat($idFormatLivre);


// si l'utilisateur a cliqué sur le bouton " ajouter au panier"
if(isset($_GET['btnPanier'])){
  // on ajoute un objet element Panier au panier en session
  $elementPanier = new ElementPanier($tab = array("ISBN" => $isbn, "nb_Exemplaires" => $_GET['nb_Exemplaires']));

  $_SESSION['panier'][] = $elementPanier;

// si un utilisateur est connecté, on enregistre le produit en BD
  if(isset($_SESSION['utilisateur'])){
    $dao->ajouterPanierUtilisateur($utilisateur->__get('idUtilisateur'),$isbn,$_GET['nb_Exemplaires']);
  }

}

// affichage de la vue correspondante

include("../view/produit.view.php");
?>
