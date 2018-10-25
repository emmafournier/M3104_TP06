<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  <header>
    <h1>Connexion</h1>
  </header>
  <body>
<?php if (isset($erreur) && $erreur): ?>
  <p>identifiant ou mot de passe erroné : réessayez ! </p>
<?php endif; ?>

    <form class="" action="connexion.ctrl.php" method="get">
      <label for="idLogin">identifiant : </label>
        <input type="text" name="idUtilisateur" value="votre identifiant" id="idLogin">
        <label for="idMpd">Mot de passe : </label>
        <input type="password" name="mot_de_passe" value="" id="idMpd">
        <input type="submit" name="btnConnection" value="Se connecter">
    </form>
    <section>
    <a href="creationCompte.ctrl.php"> <input type="button" name="btnCreation" value="Creer un compte"> </a>
    <a href="accueil.ctrl.php"> <input type="button" name="btnRetour" value="Retour"> </a>
    </section>

  </body>
</html>