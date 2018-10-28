<?php
  include_once("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");

// ici, l'utilisateur est obligatoirement connecté

  // ouverture de la session si aucune session ouverte
  if(!isset($_SESSION)){
    session_start();
  }

  $panier = array();

  // on récupère la panier de l'utilisateur
  if(isset($_SESSION)){
    $panier = $_SESSION['panier'];
  }


// on vide le panier en session et en base de données
   $_SESSION['panier'] = array();
   $dao->viderPanier($_SESSION['utilisateur']->__get('idUtilisateur'));

// on affiche la vue confirmant la commande
  include("../view/commande.view.php");



?>
