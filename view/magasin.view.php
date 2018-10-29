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
		 <!-- si un utilisateur est connecté -->
			<?php if (isset($utilisateur)): ?>
				<p><?=$utilisateur->__get('idUtilisateur')?></p>
				<a href="magasin.ctrl.php?btnDeconnexion=true"> <input type="button" name="btnDeconnexion" value="Se déconnecter"> </a>
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

		<!-- ======================== AFFICHAGE DES MAGASINS ===================== -->
		<div id="lesMagasins">
      <h2>Nos Magasins</h2>
      <form class="" action="magasin.ctrl.php" method="get">
        <label for="idDep">Choisir un code postal : </label>
        <input type="text" name="departement" value="" id="idDep" placeholder="38000">
        <input type="submit" name="btnVal" value="Valider">
      </form>
      <article>
				<?php if (isset($departement) && $departement == 0): ?>
					<p>Code postal non trouvé : tous nos magasins sont affichés</p>
				<?php endif; ?>
        <?php foreach ($magasins as $value): ?>
          <p>
            <h3><?=$value->__get('nom')?></h3>
            <p><?=$value->__get('adresse')?> <?=$value->__get('departement')?> <?=$value->__get('ville')?></p>
						<p> <a href="livreDispo.ctrl.php?idMagasin=<?=$value->__get('idMagasin')?>"><input type="button" name="btnDispo" value="Voir les livres disponibles"></a> </p>

          </p>
          <hr>
        <?php endforeach; ?>
      </article>
		</div>

  </body>
</html>
