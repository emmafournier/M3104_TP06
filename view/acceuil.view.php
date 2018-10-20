<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title> LaLibrairie </title>
		<link rel="stylesheet" type="text/css" href="LaLibrairie.css" />

	</head>
  <header>
    <img src="./logo-passerelles.png	" alt="Logo_Librairie">
    <h1>La Librairie.com</h1>
  </header>

  <body>
      <nav>
       	<ul id="menu_horizontale">
          <li class="menu_accueil"> <a href="#">Accueil</a></li>



          <li class="menu_categorie"> <a href="#">Catégorie</a>
            <ul class="sous-menu">
              <?php
								// on parcourt la liste des categories
							?>
							<li> <a href="#">Test 1</a> </li>
							<li> <a href="#">Test 2</a> </li>
							<li> <a href="#">Test 3</a> </li>
            </ul>
					</li>


          <li class="menu_format">
						<a href="#">Format</a>
						<ul class="sous-menu">
              <?php
								// on parcourt la liste des formats
							?>
							<li> <a href="#">Test 1</a> </li>
							<li> <a href="#">Test 2</a> </li>
							<li> <a href="#">Test 3</a> </li>
            </ul>
					</li>

          <li class="menu_magasin">
						<a href="#">Nos Magasins</a>
						<ul class="sous-menu">
              <?php
								// on parcourt la liste des magasins
							?>
							<li> <a href="#">Test 1</a> </li>
							<li> <a href="#">Test 2</a> </li>
							<li> <a href="#">Test 3</a> </li>
            </ul>
					</li>

        </ul>
      </nav>

			<section>
				<?php foreach ($livres as $value): ?>
					<article class="">
						<h2><?=$value->__get("titre")?></h2>
						<a href="livre.ctrl.php?ISBN=<?=$value->__get("isbn")?>">
							<img src="<?=$value->__get("image")?>" alt="<?=$value->__get("image")?>">
						</a>
						<p><?=$value->__get("prix")?></p>
					</article>

				<?php endforeach; ?>
			</section>

  </body>
  <footer></footer>
</html>
