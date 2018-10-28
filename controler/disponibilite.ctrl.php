<?php

  session_start();
  include_once("../model/DAO.class.php");


// on récupère l'ISBN du produit dont on veut connaître les disponibilités
  if(isset($_GET['ISBN'])){
    $isbn = $_GET['ISBN'];
  }
  else{
    // par défaut, c'est le premier produit de la BD
    $isbn = $isbn = (string)$dao->firstN(1)[0]->__get("ISBN");
  }

// on récupère le produit correspondant
  $livre = $dao->getLivre($isbn);

// on récupère les magasins et le nombre de disponibilite du produit
  $idMagasins = $dao->listeMagDispo($isbn);
  $magasins = array();
  $nbDispo = array();
  foreach ($idMagasins as $value) {
    $magasins[] = $dao->getMaga($value);
    $nbDispo[$value] = $dao->nbExemplaireMag($isbn,$value);
  }

// affichage de la vue correspondante
  include_once("../view/disponibilite.view.php");


?>
