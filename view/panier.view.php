<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Panier</title>
  </head>
  <header>
    <h1>Mon panier</h1>
  </header>
  <body>

    <?php foreach ($panier as $elementPanier): ?>
      <article class="">
          <p><?=$dao->getLivre($elementPanier->__get('ISBN'))->__get('titre')?></p>
          <img src="../view/images/<?=$dao->getLivre($elementPanier->__get('ISBN'))->__get('photo')?>" alt="">
          <p><?=$elementPanier->__get('nb_Exemplaires')?></p>
          <hr>
      </article>

    <?php endforeach; ?>

  </body>
</html>
