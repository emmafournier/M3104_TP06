<?php

include_once("../model/DAO.class.php");

$nbLivres = 5;
$categories = $dao->getAllCat();
$formats = $dao->getAllFormat();

include("../view/categorie.view.php");
?>
