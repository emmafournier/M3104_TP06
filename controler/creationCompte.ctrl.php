<?php

  include("../model/DAO.class.php");
  include_once("../model/ElementPanier.class.php");
  session_start();

  var_dump($_POST);
  $erreur = false;

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

  if(!$erreur){
    $result = $dao->creerUtilisateur($idUtilisateur,$mot_de_passe,$adresse);
    var_dump($result);
    if($result != 0){

      $utilisateur = $dao->getUtilisateurConnexion($idUtilisateur,$mot_de_passe);


      if($utilisateur->__get('idUtilisateur') != null){

        $_SESSION['utilisateur'] = $utilisateur;
        foreach ($_SESSION['panier'] as $elementPanier) {
          $dao->ajouterPanierUtilisateur($idUtilisateur,$elementPanier->_get('ISBN'),$elementPanier->__get('nb_Exemplaires'));
          $_SESSION['panier'] = $dao->getPanierUtilisateur($idUtilisateur);
        }
        include("accueil.ctrl.php");
      }
      else{
        $erreur = true;
      }


    }
    else{
      $erreur = true;
    }
  }




  if($erreur){
    include("../view/creationCompte.view.php");
  }





?>
