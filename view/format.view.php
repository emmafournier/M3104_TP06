<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title> LaLibrairie </title>
		<link rel="stylesheet" type="text/css" href="../view/LaLibrairie.css" />

	</head>
	<!-- ======================== HEADER ===================================== -->

	<header>
		<div id="conteneurLogo">
			<img src="../view/logo-passerelles.png	" alt="Logo_Librairie">
			<h1>La Librairie.com</h1>
		</div>
		<!-- si un utilisateur est connecté -->

     <div id="conteneurBoutonHeader">
			<?php if (isset($utilisateur)): ?>
				<p><?=$utilisateur->__get('idUtilisateur')?></p>
				<a href="format.ctrl.php?btnDeconnexion=true&idFormat=<?=$idFormat?>&ISBN=<?=$livres[0]->__get("ISBN")?>"> <input type="button" name="btnDeconnexion" value="Se déconnecter"> </a>
			<?php else: ?>
				<!-- si pas d'utilisateur connecté -->

				<a href="connexion.ctrl.php"> <input type="button" name="btnConnexion" value="Se connecter"> </a>
			<?php endif; ?>
			<!-- bouton panier -->

			<a href="panier.ctrl.php"> <input type="button" name="btnPanier" value="Panier"> </a>
    </div>
  </header>

  <body>
		<!-- ======================== MENU ===================================== -->

		<div id="conteneurMenu">
      <nav>
				<!-- accueil -->

       	<ul id="menu_horizontale">
          <li class="menu_acceuil"> <a href="accueil.ctrl.php">Accueil</a></li>


					<!-- catégorie -->

          <li class="menu_categorie"> <a href="#">Catégorie</a>
            <ul class="sous-menu">
							<?php foreach ($categories as $value): ?>
								<li> <a href="categorie.ctrl.php?idCategorie=<?=$value->__get('idCategorie')?>"><?=$value->__get('libelle')?></a> </li>
							<?php endforeach; ?>

            </ul>
					</li>

					<!-- format -->

          <li class="menu_format">
						<a href="#">Format</a>
						<ul class="sous-menu">
							<?php foreach ($formats as $value): ?>
								<li> <a href="format.ctrl.php?idFormat=<?=$value->__get('idFormat')?>"><?=$value->__get('libelle')?></a> </li>
							<?php endforeach; ?>
            </ul>
					</li>
					<!-- magasin -->

          <li class="menu_magasin">
						<a href="magasin.ctrl.php">Nos Magasins</a>
					</li>

        </ul>
      </nav>
			<!-- ======================== FIN MENU ================================= -->

  </div>

	<!-- ======================== AFFICHAGE DES LIVRES ===================== -->

	<div id="conteneurProduit">
      <h2><?=$format->libelle?></h2>
      <section>
        <?php foreach ($livres as $value): ?>
          <article class="livres">
            <h3><?=$value->__get("titre")?></h3>
            <a href="produit.ctrl.php?ISBN=<?=$value->__get("ISBN")?>&idFormat=<?=$value->__get("idFormat")?>">
              <img src="../view/images/<?=$value->__get("photo")?>" alt="<?=$value->__get("photo")?>">
            </a>
            <p><?=$value->__get("prix")?></p>
          </article>

        <?php endforeach; ?>
      </section>
			<!-- ==================== FIN AFFICHAGE DES LIVRES ===================== -->

			<!-- ==================== AFFICHAGE FLECHES SUIVANT / PRECEDENT ============================= -->

		</div>
      <section>
				<?php if ($total==false): ?>
					<?php if (count($pred) > 0): ?>
						<a href="?idFormat=<?=$idFormat?>&ISBN=<?=$pred[0]->__get("ISBN")?>&listeNbLibre=<?=$nbLivres?>"><input type="button" name="btnPred" value="<="></a>
					<?php endif; ?>
					<?php if (count($next) > 0): ?>
						<a href="?idFormat=<?=$idFormat?>&ISBN=<?=$next[0]->__get("ISBN")?>&listeNbLibre=<?=$nbLivres?>"><input type="button" name="btnSuiv" value="=>"></a>
					<?php endif; ?>
				<?php endif; ?>


			</section>

			<!-- ==================== formulaire pour le nombre de produits par page ============================= -->

	<div id="conteneurFleche">
			<form class="" action="format.ctrl.php" method="get">
				<label for="idListe">Nombre de produits par page :</label>
				<select class="" name="listeNbLibre">
					<option value="5" selected>5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="0">Tout afficher</option>
				</select>
				<input type="hidden" name="idFormat" value="<?=$idFormat?>">
				<input type="submit" name="btnValider" value="Valider">
			</form>
	</div>

  </body>
</html>
