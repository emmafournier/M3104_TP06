<?php

  include("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");
  include_once("../model/Utilisateur.class.php");

  // ouverture de la session si aucune session ouverte
  if(!isset($_SESSION)){
    session_start();
  }

// variables pour le bon affichage des vues
  $erreur = false;
  $firstCo = false;

// si l'utilisateur clique sur le bouton connexion du formulaire de connexion : on vérifié qu'il a bien saisi tous les champs
// sinon erreur
if(isset($_GET['btnConnection'])){
  if(isset($_GET['idUtilisateur'])){

    $idUtilisateur = $_GET['idUtilisateur'];
  }
  else{
    $erreur = true;
  }

  if(isset($_GET['mot_de_passe'])){

    $mot_de_passe = $_GET['mot_de_passe'];
  }
  else{
    $erreur = true;
  }
}
else{
  // si l'utilisateur n'a pas cliqué sur connexion : c'est qu'il vient d'une autre page
  $firstCo = true;
}


//si pas d'erreur et qu'il a cliqué sur le bouton connexion du formulaire

  if(!$erreur && !$firstCo){
    // on récupère l'utilisateur en bases de données
    $utilisateur = $dao->getUtilisateurConnexion($idUtilisateur,$mot_de_passe);

    // si l'utilisateur existe
    if($utilisateur->__get('idUtilisateur') != null){
      // on enregistre l'utilisateur en session
      $_SESSION['utilisateur'] = $utilisateur;
      // on récupère son panier et on enregistre les nouveaux produits
      foreach ($_SESSION['panier'] as $elementPanier) {
        $dao->ajouterPanierUtilisateur($idUtilisateur,$elementPanier->__get('ISBN'),$elementPanier->__get('nb_Exemplaires'));

      }
      $_SESSION['panier'] = $dao->getPanierUtilisateur($idUtilisateur);

      // si connexion pour commande
      if(isset($_GET['commande'])){
        include("panier.ctrl.php");
      }
      else{
        // si connexion hors commande
        include("accueil.ctrl.php");
      }


    }
    else{
      // si l'utilisateur n'a pas été trouvé
      $erreur = true;
    }
  }

// s'il y a eu une erreur : affichage de la même vue mais avec un message d'erreur
// si première connexion : affichage normal
  if($erreur || $firstCo){
    include("../view/connexion.view.php");
  }





?>
