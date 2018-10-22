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

		<!-- MENU ----------------------------------------------------------------->
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

			<!-- FIN MENU ----------------------------------------------------------->

			<!-- VUE PAR CATEGORIE -------------------------------------------------->

			<h2><?=$categorie->libelle?></h2>
			<section>
				<?php foreach ($livres as $value): ?>
<<<<<<< HEAD
					<article class="">
						<h3><?=$value->__get("titre")?></h3>
						<a href="livre.ctrl.php?ISBN=<?=$value->__get("ISBN")?>">
							<img src="<?=$value->__get("photo")?>" alt="<?=$value->__get("photo")?>">
=======
					<article class="livres">
						<h3><?=$value->__get("titre")?></h3>
						<a href="produit.ctrl.php?ISBN=<?=$value->__get("ISBN")?>&idCategorie=<?=$value->__get("idCategorie")?>">
							<img src="../view/images/<?=$value->__get("photo")?>" alt="<?=$value->__get("photo")?>">
>>>>>>> 4e4c4b939c254269f9b7fea2237c477acea30d2e
						</a>
						<p><?=$value->__get("prix")?></p>
					</article>

				<?php endforeach; ?>
			</section>
			<section>
				<?php if (count($pred) > 0): ?>
					<a href="?idCategorie=<?=$idCategorie?>&ISBN=<?=$pred[0]->__get("ISBN")?>"><input type="button" name="btnPred" value="<="></a>
				<?php endif; ?>
				<?php if (count($next) > 0): ?>
					<a href="?idCategorie=<?=$idCategorie?>&ISBN=<?=$next[0]->__get("ISBN")?>"><input type="button" name="btnSuiv" value="=>"></a>
				<?php endif; ?>

			</section>

			<!-- FIN VUE PAR CATEGORIE ---------------------------------------------->

<<<<<<< HEAD
=======
			<!-- ==================== AFFICHAGE Total=============================== -->
				<section>

						<a href="?total=true"><input type="button" name="btnTotalCat" value="Tout Afficher"></a>

				</section>

			<!-- ================ FIN AFFICHAGE Total ============================== -->

>>>>>>> 4e4c4b939c254269f9b7fea2237c477acea30d2e
  </body>
</html>
