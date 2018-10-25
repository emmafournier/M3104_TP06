<?php
  include_once("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");


  session_start();
  $panier = array();
  $prixTotal = 0;


  if(isset($_SESSION)){
    $panier = $_SESSION['panier'];
    if(isset($_SESSION['utilisateur'])){
      $utilisateur = $_SESSION['utilisateur'];
    }
  }


  if(isset($_GET['enleverPanier']) && isset($_GET['ISBN'])){
    if(isset($_SESSION['utilisateur'])){
      $dao->enleverPanier($_SESSION['utilisateur']->__get('idUtilisateur'),$_GET['ISBN']);
    }


    $i = 0;
    foreach ($_SESSION['panier'] as $key => $value) {
      if($value->__get('ISBN') == $_GET['ISBN']){
        $i = $key;
      }
    }
    unset($_SESSION['panier'][$i]);
    $panier = $_SESSION['panier'];

  }

  foreach ($panier as $value) {
    $produit = $dao->getLivre($value->__get('ISBN'));
    $prixTotal = $prixTotal + $produit->__get('prix')*$value->__get('nb_Exemplaires');
  }




  include("../view/panier.view.php");



?>
