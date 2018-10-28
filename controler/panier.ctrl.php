<?php
  include_once("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");


// ouverture de la session si aucune session ouverte
if(!isset($_SESSION)){
    session_start();
  }
  $panier = array();
  // pour l'affichage du prix total du panier
  $prixTotal = 0;

// on récupère le panier en session
  if(isset($_SESSION)){
    $panier = $_SESSION['panier'];
    if(isset($_SESSION['utilisateur'])){
      $utilisateur = $_SESSION['utilisateur'];
    }
  }

// dans le cas où l'utilisateur souhaite enlever un produit de son panier
  if(isset($_GET['enleverPanier']) && isset($_GET['ISBN'])){
    if(isset($_SESSION['utilisateur'])){
      $dao->enleverPanier($_SESSION['utilisateur']->__get('idUtilisateur'),$_GET['ISBN']);
    }

// on cherche le produit à enlever dans le panier et on le met à null
    $i = 0;
    foreach ($_SESSION['panier'] as $key => $value) {
      if($value->__get('ISBN') == $_GET['ISBN']){
        $i = $key;
      }
    }
    unset($_SESSION['panier'][$i]);
    $panier = $_SESSION['panier'];

  }

// on calcule le prix total du panier
  foreach ($panier as $value) {
    $produit = $dao->getLivre($value->__get('ISBN'));
    $prixTotal = $prixTotal + $produit->__get('prix')*$value->__get('nb_Exemplaires');
  }



// affichage de la vue correspondante
  include("../view/panier.view.php");



?>
