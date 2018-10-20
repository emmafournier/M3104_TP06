<?php

  include_once("../model/DAO.class.php");

  $nbLivres = 5;
  $categories = $dao->getAllCat();
  $formats = $dao->getAllFormat();
  $magasins = $dao->getAllMaga();

  if(isset($_GET['ISBN'])){
    $isbn = $_GET['ISBN'];
  }
  else{
    $isbn = (string)$dao->firstN(1)[0]->__get("ISBN");
  }

  $livres = $dao->getN($isbn,$nbLivres);
  $next = $dao->getN($dao->next(end($livres)->__get("ISBN")),$nbLivres);
  $pred = $dao->prevN($livres[0]->__get("ISBN"),$nbLivres);

  include("../view/acceuil.view.php");

?>
