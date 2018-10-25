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

//------------------------------ RECCUP FORMAT ---------------------------------
  if (isset($_GET['idFormat'])) {

    $idFormat = $_GET['idFormat'];

 }
 else{
    $idFormat = 1;
 }

 //------------------------------ RECCUP ISBN  ---------------------------------

 if(isset($_GET['ISBN'])){
   $isbn = $_GET['ISBN'];
 }
 else{
   $isbn = $dao->firstNFormat(1,$idFormat)[0]->__get('ISBN');
 }

 //------------------------------ RECCUP TOTAL ---------------------------------
 if(isset($_GET['listeNbLibre'])){
   if($_GET['listeNbLibre'] == 0){
     $nbLivres = $dao->getNBLivreFormat($idFormat);
     $total = true;
   }
   else{
     $nbLivres = $_GET['listeNbLibre'];
     $total = false;
   }
 }
 else{
   $nbLivres = 5;
   $total = false;
 }



 $format = $dao->getFormat($idFormat);
 $livres = $dao->getNFormat($isbn,$nbLivres,$idFormat);

 $next = $dao->getNFormat($dao->next(end($livres)->__get("ISBN")),$nbLivres,$idFormat);
 $pred = $dao->prevNFormat($livres[0]->__get("ISBN"),$nbLivres,$idFormat);

 include("../view/format.view.php");

?>
