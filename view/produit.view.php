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

    <div id="conteneurBoutonHeader">
			<?php if (isset($utilisateur)): ?>
				<p><?=$utilisateur->__get('idUtilisateur')?></p>
				<!-- si un utilisateur est connecté -->
				<!-- pour gérer les boutons retour en cas de déconnexion -->

				<?php if (isset($idFormatQuery)): ?>
					<a href="produit.ctrl.php?ISBN=<?=$isbn?>&btnDeconnexion=true&idFormat=<?=$livre->__get("idFormat")?>"> <input type="button" name="btnDeconnexion" value="Se déconnecter"> </a>
				<?php elseif (isset($idCatQuery)): ?>
					<a href="produit.ctrl.php?ISBN=<?=$isbn?>&btnDeconnexion=true&idCategorie=<?=$livre->__get("idCategorie")?>"> <input type="button" name="btnDeconnexion" value="Se déconnecter"> </a>
				<?php else: ?>
					<a href="produit.ctrl.php?ISBN=<?=$isbn?>&btnDeconnexion=true"> <input type="button" name="btnDeconnexion" value="Se déconnecter"> </a>
				<?php endif; ?>



			<?php else: ?>
				<!-- si pas d'utilisateur connecté -->


				<a href="connexion.ctrl.php"> <input type="button" name="btnConnexion" value="Se connecter"> </a>


			<?php endif; ?>
			<!-- bouton panier -->
			<a href="panier.ctrl.php"> <input type="button" name="btnPanier" value="Panier"> </a>
    </div>
  </header>

  <body>

		<!-- MENU ----------------------------------------------------------------->
		<div id="conteneurMenu">
			<nav>
       	<ul id="menu_horizontale">
					<!-- accueil -->
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
		</div>

			<!-- FIN MENU ----------------------------------------------------------->
			<!-- ======================== AFFICHAGE DU DETAIL DU LIVRE ===================== -->

			<div id="conteneurProduitInfo">
				<div id="leProduit">
        	<article class="">
						<div id="TitreImage">
            	<h3><?=$livre->__get("titre")?></h3>

            	<img src="../view/images/<?=$livre->__get("photo")?>" alt="<?=$livre->__get("photo")?>">
						</div>

						<div id="Details">
	            <p>Prix : <?=$livre->__get("prix")?> euros</p>
	            <p>Categorie : <?=$catLivre->__get("libelle")?></p>
	            <p>Format : <?=$formatLivre->__get("libelle")?></p>
	            <p>Auteur : <?=$livre->__get("auteur")?></p>
	            <p>Editeur : <?=$livre->__get("editeur")?></p>
	            <p>Nombre de pages : <?=$livre->__get("nb_pages")?></p>
	            <p>Date de parution : <?=$livre->__get("date_parution")?></p>
	            <p>Informations : <?=$livre->__get("comp_info")?></p>
						</div>
					</article>
				</div>

				<div id="achat">
					<!-- ======================== voir les disponibilités d'un livre ===================== -->
					<a href="disponibilite.ctrl.php?ISBN=<?=$livre->__get("ISBN")?>"><input type="button" name="btnPred" value="Voir les disponibilités en magasin : <?=$nbExemplaire?> exemplaires disponibles"></a>
					<br><br>

					<!-- ======================== POUR AJOUTER UN PRODUIT A SON PANIER ===================== -->
					<div id="conteneurFormPanier">
						<form class="" action="produit.ctrl.php" method="get" style="margin-top : 10px">
							<label for="">Nombre d'exemplaires : </label>
							<input type="number" name="nb_Exemplaires" value="1" min="1">
							<input type="hidden" name="ISBN" value="<?=$livre->__get("ISBN")?>">

							<!-- ======================== pour le fonctionnement du bouton retour format si l'utilisateur vient de format ===================== -->
							<?php if (isset($idFormatQuery)): ?>
								<input type="hidden" name="idFormat" value="<?=$livre->__get("idFormat")?>">
							<?php endif; ?>
							<!-- ======================== pour le fonctionnement du bouton retour categorie si l'utilisateur vient de catégorie ===================== -->
							<?php if (isset($idCatQuery)): ?>
								<input type="hidden" name="idCategorie" value="<?=$livre->__get("idCategorie")?>">
							<?php endif; ?>
							<br><br>
							<input type="submit" name="btnPanier" value="Ajouter au panier">
						</form>

						<!-- ======================== mesage de confirmation d'ajout au panier ===================== -->

						<?php if (isset($_GET['btnPanier'])): ?>
							<p>Votre produit a bien été ajouté au panier</p>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div id="btn">
				<!-- ======================== bouton retour ===================== -->
				<a href="<?=$query ?>"><input type="button" name="btnRetour" value="<?=$valBouton?>"></a>

				<!-- ========================retour au magasin si l'utilisateur vient de la page magasin ===================== -->
				<?php if (isset($_GET['idMagasin'])): ?>
						 <a href="livreDispo.ctrl.php?idMagasin=<?=$_GET['idMagasin']?>"><input type="button" name="btnRetour" value="Retour au magasin"></a>
				<?php endif; ?>
    	</div>


    </body>
</html>
