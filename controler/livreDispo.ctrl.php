<?php


  include_once("../model/DAO.class.php");

  // ouverture de la session si aucune session ouverte
  if(!isset($_SESSION)){
    session_start();
  }

// on récupère le magasin dont on veut afficher les livres qu'il possède
  if(isset($_GET['idMagasin'])){
    $idMagasin = $_GET['idMagasin'];
  }
  else{
    $idMagasin = 1;
  }

// on récupère le magasin en BD
  $magasin = $dao->getMaga($idMagasin);

// on récupère les produits qu'ils possèdent
  $ISBNLivres = $dao->listeLivreDispo($idMagasin);

  $livres = array();
  $nbDispo = array();
  foreach ($ISBNLivres as $value) {
    $livres[] = $dao->getLivre($value);
    $nbDispo[$value] = $dao->nbExemplaireMag($value,$idMagasin);
  }

// affichage de la vue correspondante
  include_once("../view/livreDispo.view.php");


?>
