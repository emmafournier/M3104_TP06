<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../view/LaLibrairie.css" />
  </head>

  <header>
    <h1>Créer un compte</h1>
  </header>

  <body>
    <div id="creationCompte">
      <!--si erreur à la création de compye -->
      <?php if (isset($erreur) && $erreur == true): ?>
        <p>Cet identifiant est déjà pris : réessayez ! </p>
      <?php endif; ?>
      <!--formulaire de connexion -->

      <form class="" action="creationCompte.ctrl.php" method="get">
        <label for="idLogin">identifiant : </label>
          <input type="text" name="idUtilisateur" value="" id="idLogin" required placeholder="votre identifiant">
          <label for="idMpd">Mot de passe : </label>
          <input type="password" name="mot_de_passe" value="" id="idMpd" required>
          <label for="idAddr">Adresse : </label>
          <input type="text" name="adresse" value="" id="idAddr" placeholder="1 allée du soleil 38000 Grenoble">
          <input type="submit" name="btnConnextion" value="Créer un compte">
          <!--si l'utilisateur doit créer un compte pour commander -->

          <?php if (isset($_GET['commande'])): ?>
            <input type="hidden" name="commande" value="true">
          <?php endif; ?>
      </form>
      <!--retour à l'accueil -->
      <br>
      <section>
        <a href="accueil.ctrl.php"> <input type="button" name="btnRetour" value="Retour"> </a>
      </section>
    </div>

  </body>
</html>
