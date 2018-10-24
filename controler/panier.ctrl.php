<?php
  include_once("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");


  session_start();
  $panier = array();


  if(isset($_SESSION)){
    $panier = $_SESSION['panier'];
  }


  include("../view/panier.view.php");



?>
