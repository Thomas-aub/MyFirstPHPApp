<?php 
    session_start();
    require_once './php/config.php'; // ajout connexion bdd 


    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>Publication</title>

<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/style_edit.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>

  <body>
   <nav>
    <div class="wrapper">
      <div class="logo"><a href="index.php">Cuisine de chez vous</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
		<li>
          <a href="recherche.php" class="desktop-item">Recherche</a>
          <input type="checkbox" id="showMega">
          <label for="showMega" class="mobile-item">Recherche</label>
          <div class="mega-box">
            <div class="content">
			
              <div class="row">
			   <header>Recette du jour</header>
                <img src="img/menu/tartiflette.jpg" alt="">
              </div>
              <div class="row">
                <header>Région du jour</header>
                <ul class="mega-links">
                  <li><a href="#">Bretagne</a></li>
                  <li><a href="#">Alsace</a></li>
                  <li><a href="#">Rhône</a></li>
                  <li><a href="#">Bouche du Rhône</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Plats</header>
                <ul class="mega-links">
				  <li><a href="#">Entrées</a></li>
				  <li><a href="#">Plats</a></li>
				  <li><a href="#">Desserts</a></li>
					<li><a href="#">Boissons</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Spécial</header>
                <ul class="mega-links">
                  <li><a href="#">Végetariens</a></li>
                  <li><a href="#">Sans gluten</a></li>
                  <li><a href="#">Sans lactose</a></li>
                  <li><a href="#">A l'ancienne</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
		
        <li><a href="region.php">La carte</a></li>
		
	    <li><a href="upload.php">Publier Recette</a></li>
	   
        <li><a href="about.php">A propos</a></li>
       
  
	   <li>
		  <a href="landing.php" class="desktop-item">Espace Perso</a>
		  <input type="checkbox" id="showDrop">
		  <label for="showDrop" class="mobile-item">Espace Perso</label>
		  <ul class="drop-menu">
			<li><a href="mes_recettes.php">Mes Recettes</a></li>
			<li><a href="editer_profil.php">Editer Profil</a></li>

			<li><a href="./php/deconnexion.php">Deconnexion</a></li>
		  </ul>
		</li>
	  </ul>
	  <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
	</div>
   </nav>
        
        <div class="test" style="text-align: center; margin-top: 14em;"><a href="upload.php">Ajouter une recette</a></div>

    </body>
</html>
