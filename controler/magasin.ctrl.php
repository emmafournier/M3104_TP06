<?php
include_once("../model/DAO.class.php");
include_once("../model/Utilisateur.class.php");
include_once("../model/ElementPanier.class.php");

if(!isset($_SESSION)){
  session_start();
}


if(isset($_GET['btnDeconnexion'])){
  session_destroy();
  session_start();
  $_SESSION['panier'] = array();
}

$nbLivres = 5;
$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

if (isset($_SESSION['utilisateur'])){
  $utilisateur = $_SESSION['utilisateur'];
}

if(isset($_GET['departement'])){
  $departement = $_GET['departement'];
  $magasins = $dao->getMagaDepartement($departement);
  if(count($magasins) == 0){
    $magasins = $dao->getAllMaga();
    $departement = 0;
  }
}
else{
  $magasins = $dao->getAllMaga();
}



include("../view/magasin.view.php");
?>
