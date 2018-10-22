<?php

  include_once("../model/DAO.class.php");



  if(isset($_GET['idMagasin'])){
    $idMagasin = $_GET['idMagasin'];
  }
  else{
    $idMagasin = 1;
  }

  $magasin = $dao->getMaga($idMagasin);

  $ISBNLivres = $dao->listeLivreDispo($idMagasin);

  $livres = array();
  $nbDispo = array();
  foreach ($ISBNLivres as $value) {
    $livres[] = $dao->getLivre($value);
    $nbDispo[$value] = $dao->nbExemplaireMag($value,$idMagasin);
  }


  include_once("../view/livreDispo.view.php");


?>
