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
    <!--si erreur à la connexion -->

<?php if (isset($erreur) && $erreur): ?>
  <p>Identifiant ou mot de passe erroné : réessayez ! </p>
<?php endif; ?>
    <!--formulaire de connexion -->
    <form class="" action="connexion.ctrl.php" method="get">
      <label for="idLogin">identifiant : </label>
        <input type="text" name="idUtilisateur" value="" id="idLogin" required placeholder="votre identifiant">
        <label for="idMpd">Mot de passe : </label>
        <input type="password" name="mot_de_passe" value="" id="idMpd" required>
        <input type="submit" name="btnConnection" value="Se connecter">
          <!--si l'utilisateur se connexte pour commander -->
        <?php if (isset($_GET['commande'])): ?>
          <input type="hidden" name="commande" value="true">
        <?php endif; ?>
    </form>
    <section>

    <!--si l'utilisateur se connexte pour commander et qu'il doit créer un compte-->
    <?php if (isset($_GET['commande'])): ?>
      <a href="creationCompte.ctrl.php?commande=true"> <input type="button" name="btnCreation" value="Creer un compte"> </a>
    <?php else: ?>
      <a href="creationCompte.ctrl.php"> <input type="button" name="btnCreation" value="Creer un compte"> </a>
    <?php endif; ?>
<!--retour à l'accueil -->
    <a href="accueil.ctrl.php"> <input type="button" name="btnRetour" value="Retour"> </a>
    </section>

  </body>
</html>
