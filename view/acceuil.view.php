<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title> LaLibrairie </title>
		<link rel="stylesheet" type="text/css" href="../view/LaLibrairie.css" />

	</head>
  <header>
		<div class="">
			<img src="../view/logo-passerelles.png	" alt="Logo_Librairie">
			<h1>La Librairie.com</h1>
		</div>
    <div class="">
			<?php if (isset($utilisateur)): ?>
				<p><?=$utilisateur->__get('idUtilisateur')?></p>
			<?php else: ?>
				<a href="connexion.ctrl.php"> <input type="button" name="btnConnexion" value="Se connecter"> </a>
			<?php endif; ?>
			<a href="panier.ctrl.php"> <input type="button" name="btnPanier" value="Panier"> </a>
    </div>
  </header>

  <body>
		<!-- ======================== MENU ===================================== -->
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

		<!-- ======================== FIN MENU ================================= -->

		<!-- ======================== AFFICHAGE DES LIVRES ===================== -->

			<section>
				<?php foreach ($livres as $value): ?>
					<article class="livres">
						<h3><?=$value->__get("titre")?></h3>
						<a href="produit.ctrl.php?ISBN=<?=$value->__get("ISBN")?>">
							<img src="../view/images/<?=$value->__get("photo")?>" alt="<?=$value->__get("photo")?>">
						</a>
						<p><?=$value->__get("prix")?></p>
					</article>

				<?php endforeach; ?>
			</section>

		<!-- ==================== FIN AFFICHAGE DES LIVRES ===================== -->

		<!-- ==================== AFFICHAGE FLECHES============================= -->
			<section>

				<?php if ($total==false){ ?>
					<?php if (count($pred) > 0): ?>
					<a href="?ISBN=<?=$pred[0]->__get("ISBN")?>&listeNbLibre=<?=$nbLivres?>"><input type="button" name="btnPred" value="<="></a>
					<?php endif; ?>
					<?php if (count($next) > 0): ?>
					<a href="?ISBN=<?=$next[0]->__get("ISBN")?>&listeNbLibre=<?=$nbLivres?>"><input type="button" name="btnSuiv" value="=>"></a>
					<?php endif;
				}?>


			</section>



		<form class="" action="accueil.ctrl.php" method="get">
			<label for="idListe">Nombre de produits par page :</label>
			<select class="" name="listeNbLibre">
				<option value="5" selected>5</option>
				<option value="10">10</option>
				<option value="15">15</option>
				<option value="20">20</option>
				<option value="0">Tout afficher</option>
			</select>

			<input type="submit" name="btnValider" value="Valider">
		</form>



  </body>
  <footer></footer>
</html>
