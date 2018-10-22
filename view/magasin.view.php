<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title> LaLibrairie </title>
		<link rel="stylesheet" type="text/css" href="../view/LaLibrairie.css" />

	</head>
  <header>
    <img src="../view/logo-passerelles.png	" alt="Logo_Librairie">
    <h1>La Librairie.com</h1>
  </header>

  <body>
      <nav>
       	<ul id="menu_horizontale">
          <li class="menu_acceuil"> <a href="accueil.ctrl.php">Accueil</a></li>



          <li class="menu_categorie"> <a href="#">Catégorie</a>
            <ul class="sous-menu">
							<?php foreach ($categories as $value): ?>
								<li> <a href="categorie.ctrl.php?idCategorie=<?=$value->__get('idCategorie')?>"><?=$value->__get('libelle')?></a> </li>
							<?php endforeach; ?>

            </ul>
					</li>


          <li class="menu_format">
						<a href="#">Format</a>
						<ul class="sous-menu">
							<?php foreach ($formats as $value): ?>
								<li> <a href="format.ctrl.php?idFormat=<?=$value->__get('idFormat')?>"><?=$value->__get('libelle')?></a> </li>
							<?php endforeach; ?>
            </ul>
					</li>

          <li class="menu_magasin">
						<a href="magasin.ctrl.php">Nos Magasins</a>
					</li>

        </ul>
      </nav>
      <h2>Nos Magasins</h2>
      <article>
        <?php foreach ($magasins as $value): ?>
          <p>
            <h3><?=$value->__get('nom')?></h3>
            <p><?=$value->__get('adresse')?> <?=$value->__get('departement')?> <?=$value->__get('ville')?></p>

          </p>
          <hr>
        <?php endforeach; ?>
      </article>

  </body>
</html>
