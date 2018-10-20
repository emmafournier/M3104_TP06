<?php

  include_once("../model/DAO.class.php");

  $nbLivres = 5;

  if(isset($_GET['ISBN'])){
    $isbn = $_GET['ISBN'];
  }
  else{
    $isbn = $dao->firstN(1)[0]->__get("isbn");
  }

  $livres = $dao->getN($isbn,$nbLivres);

  include("../view/accueil.view.php");

?>
