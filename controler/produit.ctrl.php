<?php

session_start();
include_once("../model/DAO.class.php");
include_once("../model/ElementPanier.class.php");

$nbLivres = 5;
$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

if (isset($_SESSION['utilisateur'])){
  $utilisateur = $_SESSION['utilisateur'];
}

//-------------CHANGEMENT-------------------------------------------------------


if(isset($_GET['ISBN'])){
 $isbn = $_GET['ISBN'];
}
else{
 $isbn = (string)$dao->firstN(1)[0]->__get("ISBN");
}

if(isset($_GET['idFormat'])){
 $idFormatQuery = $_GET['idFormat'];
 $query = "format.ctrl.php?idFormat=".$idFormatQuery;

 $valBouton = "Retour au format";
}
else if(isset($_GET['idCategorie'])){
 $idCatQuery = $_GET['idCategorie'];
 $query = "categorie.ctrl.php?idCategorie=".$idCatQuery;
 $valBouton = "Retour à la categorie";

}else{
   $query = "accueil.ctrl.php";
   $valBouton = "Retour à l'accueil";
}


$livre = $dao->getLivre($isbn);
$nbExemplaire = $dao->nbDisponibilite($isbn);

$idCatLivre = $livre->__get("idCategorie");
$catLivre = $dao->getCat($idCatLivre);

$idFormatLivre = $livre->__get("idFormat");
$formatLivre = $dao->getFormat($idFormatLivre);

//-----------FIN CHANGEMENT-----------------------------------------------------

if(isset($_GET['btnPanier'])){
  $elementPanier = new ElementPanier($tab = array("ISBN" => $isbn, "nb_Exemplaires" => $_GET['nb_Exemplaires']));
  var_dump($elementPanier);
  $_SESSION['panier'][] = $elementPanier;
  var_dump($_SESSION);
}



include("../view/produit.view.php");
?>
