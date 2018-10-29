<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
      <link rel="stylesheet" type="text/css" href="../view/LaLibrairie.css" />
  </head>
  <header>
    <h1>Connexion</h1>
  </header>


  <body>
    <div id="conteneurConnexion">
    <!--si erreur à la connexion -->
    <?php if (isset($erreur) && $erreur): ?>
      <p>Identifiant ou mot de passe erroné : réessayez ! </p>
    <?php endif; ?>

    <!--formulaire de connexion -->
    <form class="" action="connexion.ctrl.php" method="get">
      <label for="idLogin">identifiant : </label>
        <input type="text" name="idUtilisateur" value="" id="idLogin" required placeholder="votre identifiant">
        <label for="idMpd">Mot de passe : </label>
        <input type="password" name="mot_de_passe" value="" id="idMpd" required> <br>
        <input type="submit" name="btnConnection" value="Se connecter">
          <!--si l'utilisateur se connexte pour commander -->
        <?php if (isset($_GET['commande'])): ?>
          <input type="hidden" name="commande" value="true">
        <?php endif; ?>
    </form>
    <br>
    <div>

    <!--si l'utilisateur se connexte pour commander et qu'il doit créer un compte-->
    <?php if (isset($_GET['commande'])): ?>
      <a href="creationCompte.ctrl.php?commande=true"> <input type="button" name="btnCreation" value="Creer un compte"> </a>
    <?php else: ?>
      <a href="creationCompte.ctrl.php"> <input type="button" name="btnCreation" value="Creer un compte"> </a>
    <?php endif; ?>
    <br><br>
    <!--retour à l'accueil -->
    <a href="accueil.ctrl.php"> <input type="button" name="btnRetour" value="Retour"> </a>
  </div>

  </body>
</html>
