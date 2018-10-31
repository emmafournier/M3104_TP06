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

//------------------------------ RECCUP FORMAT ---------------------------------
// on récupère le format de produits à afficher
if (isset($_GET['idFormat'])) {

    $idFormat = $_GET['idFormat'];

 }
 else{
   // par défaut c'est le format 1
    $idFormat = 1;
 }

 //------------------------------ RECCUP ISBN  ---------------------------------
 // ISBN du premier produit affiché
 if(isset($_GET['ISBN'])){
   $isbn = $_GET['ISBN'];
 }
 else{
   $isbn = $dao->firstNFormat(1,$idFormat)[0]->__get('ISBN');
 }

 //définition du nombre de produits à afficher sur la page (via une liste déroulante)
 if(isset($_GET['listeNbLibre'])){
   if($_GET['listeNbLibre'] == 0){
     // affichage de tous les produits du format

     $nbLivres = $dao->getNBLivreFormat($idFormat);
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


 // on récupère les livres à afficher et le format correspondant

 $format = $dao->getFormat($idFormat);
 $livres = $dao->getNFormat($isbn,$nbLivres,$idFormat);
 //on récupère les livres de la page suivante s'il y en a
 if($dao->next(end($livres)->__get("ISBN")) > 0){
   $next = $dao->getNFormat($dao->next(end($livres)->__get("ISBN")),$nbLivres,$idFormat);
 }
 else{
   $next = array();
 }
 //on récupère les livres de la page précédentes
 $pred = $dao->prevNFormat($livres[0]->__get("ISBN"),$nbLivres,$idFormat);


 // affichage de la vue correspondante
 include("../view/format.view.php");

?>
