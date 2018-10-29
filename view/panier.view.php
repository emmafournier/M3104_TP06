<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Panier</title>
    <link rel="stylesheet" type="text/css" href="../view/LaLibrairie.css" />
  </head>

  <header>
    <!--retour à l'accueil -->
    <h1>Mon panier</h1>
    <a href="accueil.ctrl.php"> <input type="button" name="btnRetour" value="Retour à l'accueil"> </a>
  </header>

  <body>
    <div id="panier">
      <!--si l'utiisateur est connecté -->
      <section>
        <?php if (isset($utilisateur)): ?>
          <p><?=$utilisateur->__get('idUtilisateur')?>, voici votre panier : </p>
        <?php else: ?>
          <!--si l'utiisateur n'est pas connecté -->
          <p>Voici votre panier (attention il faudra vous connecter pour commander!) : </p>
        <?php endif; ?>
      </section>

      <!--affichage des éléments du panier -->
      <div>
        <?php foreach ($panier as $elementPanier): ?>
          <article class="">
              <p><?=$dao->getLivre($elementPanier->__get('ISBN'))->__get('titre')?></p>
              <img src="../view/images/<?=$dao->getLivre($elementPanier->__get('ISBN'))->__get('photo')?>" alt="">
              <p><?=$elementPanier->__get('nb_Exemplaires')?></p>
              <p>Prix : <?=$dao->getLivre($elementPanier->__get('ISBN'))->__get('prix')?></p>
              <a href="panier.ctrl.php?ISBN=<?=$elementPanier->__get('ISBN')?>&enleverPanier=true"> <input type="button" name="btnEnlever" value="Enelever du panier"> </a>
              <hr>
          </article>
        <?php endforeach; ?>
      </div>

    <!--affichage du prix total -->
    <section>
      <h2>Total : <?=$prixTotal?> euros</h2>
    </section>

    <!--affichage du bouton commander si le panier n'est pas vide -->
    <section>

      <?php if (count($panier) > 0): ?>
        <?php if (isset($_SESSION['utilisateur'])): ?>
          <a href="commande.ctrl.php"> <input type="button" name="btnRetour" value="Commander"> </a>
        <?php else: ?>
          <a href="connexion.ctrl.php?commande=true"> <input type="button" name="btnRetour" value="Commander"> </a>
        <?php endif; ?>

      <?php else: ?>
          <p>Votre panier est vide ! </p>
      <?php endif; ?>
    </section>
  </div>

  </body>
</html>
