<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2><?php echo "$format->libelle\n";?></h2>
    <?php
    foreach ($livres as $obj) {
    ?>
    <article>
      <h2><?php echo "$obj->titre\n";?></h2> <br>
      <a href="?isbn=<?php echo $isbn;?>&format=<?php echo $obj->idFormat?>">
          <img src="<?php echo "$obj->photo" ?>" alt="">
      </a>
      <p><?php echo "$obj->prix\n"; ?></p> 
        </article>
    <?php } ?>
  </body>
</html>
