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

      <section>
        <article class="">
            <h3><?=$livre->__get("titre")?></h3>

            <img src="../view/images/<?=$livre->__get("photo")?>" alt="<?=$livre->__get("photo")?>">

            <p>Prix : <?=$livre->__get("prix")?></p>
            <p>Categorie : <?=$catLivre->__get("libelle")?></p>
            <p>Format : <?=$formatLivre->__get("libelle")?></p>
            <p>Auteur : <?=$livre->__get("auteur")?></p>
            <p>Editeur : <?=$livre->__get("editeur")?></p>
            <p>Nombre de pages : <?=$livre->__get("nb_pages")?></p>
            <p>Date de parution : <?=$livre->__get("date_parution")?></p>
            <p>Informations : <?=$livre->__get("comp_info")?></p>

            <a href="disponibilite.ctrl.php?ISBN=<?=$livre->__get("ISBN")?>"><input type="button" name="btnPred" value="Voir les disponibilités : <?=$nbExemplaire?> exemplaires disponibles"></a>



          </article>

          <a href="<?=$query ?>"><input type="button" name="btnRetour" value="<?=$valBouton?>"></a>

    	</section>

    </body>
</html>
