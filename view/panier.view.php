<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Panier</title>
  </head>
  <header>
    <h1>Mon panier</h1>
    <a href="accueil.ctrl.php"> <input type="button" name="btnRetour" value="Retour à l'accueil"> </a>
  </header>
  <body>

    <section>
      <?php if (isset($utilisateur)): ?>
        <p><?=$utilisateur->__get('idUtilisateur')?>, voici votre panier : </p>
      <?php else: ?>
        <p>Voici votre panier (attention il faudra vous connecter pour commander!) : </p>
      <?php endif; ?>
    </section>


    <section>
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
    </section>
    <section>
      <h2>Total : <?=$prixTotal?> euros</h2>
    </section>

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



  </body>
</html>
