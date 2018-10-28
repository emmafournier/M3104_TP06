<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LaLibrairie</title>
  </head>
  <body>
    <!--retour au magasin -->
      <article>
        <a href="magasin.ctrl.php"> <input type="button" name="btnRetour" value="Revenir aux magasins"> </a>
      </article>
      <h2>Disponibilite pour : <?=$magasin->__get('nom')?></h2>
      <p><?=$magasin->__get('adresse')?> <?=$magasin->__get('departement')?> <?=$magasin->__get('ville')?></p>
      <article>

        <!--affichage des livres disponibles pour le magasin choisi -->
        <?php foreach ($livres as $value): ?>

          <h3><?=$value->__get('titre')?></h3>
          <a href="produit.ctrl.php?ISBN=<?=$value->__get('ISBN')?>&idMagasin=<?=$magasin->__get('idMagasin')?>"><img src="../view/images/<?=$value->__get('photo')?>" alt=""></a>
          <p><<?=$value->__get('auteur')?>/p>
          <p>Nombre d'exemplaires : <?=$nbDispo[$value->__get('ISBN')]?></p>

          <hr>
        <?php endforeach; ?>

     </article>


  </body>
</html>
