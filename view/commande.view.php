<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Commande</title>
  </head>
  <header>
    <h1>Votre commande</h1>
  </header>
  <body>
    <h2>Aujourd'hui c'est gratuit ! Merci pour votre commande :) </h2>
    <section>
      <!--affichage du panier= -->

      <?php foreach ($panier as $elementPanier): ?>
        <article class="">
            <p><?=$dao->getLivre($elementPanier->__get('ISBN'))->__get('titre')?></p>
            <img src="../view/images/<?=$dao->getLivre($elementPanier->__get('ISBN'))->__get('photo')?>" alt="">
            <p><?=$elementPanier->__get('nb_Exemplaires')?></p>
            <hr>
        </article>

      <?php endforeach; ?>
    </section>
  <!-- retour à l'accueil -->
    <section>
        <a href="accueil.ctrl.php"> <input type="button" name="btnRetour" value="Retour à l'accueil"> </a>
    </section>

  </body>
</html>
