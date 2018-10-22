<?php

  include_once("../model/DAO.class.php");



  if(isset($_GET['ISBN'])){
    $ibsn = $_GET['ISBN'];
  }
  else{
    $isbn = $isbn = (string)$dao->firstN(1)[0]->__get("ISBN");
  }

  //livre = $dao->getLivre($isbn);

  $idMagasins = $dao->listeMagDispo($isbn);
  $magasins = array();
  $nbDispo = array();
  foreach ($idMagasins as $value) {
    $magasins[] = $dao->getMaga($value);
    $nbDispo[$value] = $dao->nbExemplaireMag($isbn,$value);
  }


  include_once("../view/disponibilite.view.php");


?>
