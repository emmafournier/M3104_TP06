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

// si l'utilisateur a saisi un code postal dans le formulaire de la page
if(isset($_GET['departement'])){
  // on récupère les magasins correspodant au code postal
  $departement = $_GET['departement'];
  $magasins = $dao->getMagaDepartement($departement);
  if(count($magasins) == 0){
    $magasins = $dao->getAllMaga();
    $departement = 0;
  }
}
else{
  // ou on récupère tous les magasins
  $magasins = $dao->getAllMaga();
}


//affichage de la vue correspondante
include("../view/magasin.view.php");
?>
