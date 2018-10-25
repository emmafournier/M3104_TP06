<?php
  include_once("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");


  if(!isset($_SESSION)){
    session_start();
  }
  $panier = array();


  if(isset($_SESSION)){
    $panier = $_SESSION['panier'];
  }

   $_SESSION['panier'] = array();
   $dao->viderPanier($_SESSION['utilisateur']->__get('idUtilisateur'));


  include("../view/commande.view.php");



?>
