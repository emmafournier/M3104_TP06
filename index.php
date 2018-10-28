<?php

// controleur par défaut de notre site
  header('Location: '.'controler/accueil.ctrl.php');
  session_start();
  $_SESSION['panier'] = array();

?>
