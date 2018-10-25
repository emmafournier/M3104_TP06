<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  <header>
    <h1>Créer un compte</h1>
  </header>
  <body>
<?php if (isset($erreur) && $erreur == true): ?>
  <p>Cet identifiant est déjà pris : réessayez ! </p>
<?php endif; ?>

    <form class="" action="creationCompte.ctrl.php" method="get">
      <label for="idLogin">identifiant : </label>
        <input type="text" name="idUtilisateur" value="votre identifiant" id="idLogin">
        <label for="idMpd">Mot de passe : </label>
        <input type="password" name="mot_de_passe" value="" id="idMpd">
        <label for="idAddr">Adresse : </label>
        <input type="text" name="adresse" value="1 allée du soleil 38000 Grenoble" id="idAddr">
        <input type="submit" name="btnConnextion" value="Créer un compte">

        <?php if (isset($_GET['commande'])): ?>
          <input type="hidden" name="commande" value="true">
        <?php endif; ?>
    </form>
    <section>
      <a href="accueil.ctrl.php"> <input type="button" name="btnRetour" value="Retour"> </a>
    </section>

  </body>
</html>
