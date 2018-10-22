<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LaLibrairie</title>
  </head>
  <body>

      <article>
        <a href="magasin.ctrl.php"> <input type="button" name="btnRetour" value="Revenir aux magasins"> </a>
      </article>
      <h2>Disponibilite pour : <?=$magasin->__get('nom')?></h2>
      <p><?=$magasin->__get('adresse')?> <?=$magasin->__get('departement')?> <?=$magasin->__get('ville')?></p>
      <article>
        <?php foreach ($livres as $value): ?>

          <h3><?=$value->__get('titre')?></h3>
          <img src="../view/images/<?=$value->__get('photo')?>" alt="">

          <p><<?=$value->__get('auteur')?>/p>
          <p>Nombre d'exemplaires : <?=$nbDispo[$value->__get('ISBN')]?></p>

          <hr>
        <?php endforeach; ?>

     </article>


  </body>
</html>
