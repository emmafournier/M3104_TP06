<?php

  include("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");

  // ouverture de la session si aucune session ouverte
  if(!isset($_SESSION)){
    session_start();
  }

  // variables pour le bon affichage des vues
  $erreur = false;
  $firstCo = false;

  // si l'utilisateur clique sur le bouton connexion du formulaire de connexion : on vérifié qu'il a bien saisi tous les champs
  // sinon erreur
  if(isset($_GET['btnConnextion'])){
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

    if(isset($_GET['adresse'])){

      $adresse = $_GET['adresse'];
    }
    else{
      $erreur = true;
    }
  }
  else{
    // si l'utilisateur n'a pas cliqué sur connexion : c'est qu'il vient d'une autre page
    $firstCo = true;
  }



  if(!$erreur && !$firstCo){
    // création de l'utilisateur en base de données
    $result = $dao->creerUtilisateur($idUtilisateur,$mot_de_passe,$adresse);

    // si l'identifiant est disponible (la création s'est bien passée)
    if($result != 0){
      // on récupère l'utilisateur nouvellement créé
      $utilisateur = $dao->getUtilisateurConnexion($idUtilisateur,$mot_de_passe);

      // si l'utilisateur existe
      if($utilisateur->__get('idUtilisateur') != null){
        // on enregistre l'utilisateur en session
        $_SESSION['utilisateur'] = $utilisateur;
        // on récupère son panier et on enregistre les nouveaux produits
        foreach ($_SESSION['panier'] as $elementPanier) {
          $dao->ajouterPanierUtilisateur($idUtilisateur,$elementPanier->__get('ISBN'),$elementPanier->__get('nb_Exemplaires'));
          $_SESSION['panier'] = $dao->getPanierUtilisateur($idUtilisateur);
        }
        // si création compte pour commande
        if(isset($_GET['commande'])){
          include("panier.ctrl.php");
        }
        else{
          // si connexion hors commande
          include("accueil.ctrl.php");
        }

      }
      else{
        $erreur = true;
      }

    }
    else{
      // si la création du compte n'a pas pu être effectuée
      $erreur = true;
    }
  }



  // s'il y a eu une erreur : affichage de la même vue mais avec un message d'erreur
  // si premier connexion : affichage normal
  if($erreur || $firstCo){

    include("../view/creationCompte.view.php");
  }





?>
