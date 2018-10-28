<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LaLibrairie</title>
  </head>
  <body>
    <!--retour à l'accueil -->

      <article>
        <a href="produit.ctrl.php?ISBN=<?=$livre->__get('ISBN')?>"> <input type="button" name="btnRetour" value="Revenir au livre"> </a>
      </article>
      <h2>Disponibilite pour : <?=$livre->__get('titre')?></h2>
      <article>
        <!--affichage des magasins où le produit est disponible -->

        <?php foreach ($magasins as $value): ?>

          <h3><?=$value->__get('nom')?></h3>
          <p><?=$value->__get('adresse')?> <?=$value->__get('departement')?> <?=$value->__get('ville')?></p>
          <p>Nombre d'exemplaires : <?=$nbDispo[$value->__get('idMagasin')]?></p>

          <hr>
        <?php endforeach; ?>

     </article>


  </body>
</html>
