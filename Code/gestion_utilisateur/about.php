<?php 
    session_start();
    require_once 'config.php'; // ajout connexion bdd 


    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>A propos</title>


<link rel="stylesheet" href="./css/style_edit.css">
</head>
  <body id="about">
   <nav>
    <div class="wrapper">
      <div class="logo"><a href="index.html">Cuisine de chez vous</a></div>
      <input type="radio" name="slider" id="menu-btn">
      <input type="radio" name="slider" id="close-btn">
      <ul class="nav-links">
        <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
		<li>
          <a href="recherche.html" class="desktop-item">Recherche</a>
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
		
        <li><a href="region.html">La carte</a></li>
		
	    <li><a href="#">Publier Recette</a></li>
	   
        <li><a href="about.php">A propos</a></li>
       
  
	   <li>
		  <a href="landing.php" class="desktop-item">Espace Perso</a>
		  <input type="checkbox" id="showDrop">
		  <label for="showDrop" class="mobile-item">Espace Perso</label>
		  <ul class="drop-menu">
			<li><a href="mes_recettes.php">Mes Recettes</a></li>
			<li><a href="editer_profil.php">Editer Profil</a></li>

			<li><a href="deconnexion.php">Deconnexion</a></li>
		  </ul>
		</li>
	  </ul>
	  <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
	</div>
   </nav>
	
  <div id="about-info">
	<h1 id="about-title"> Cuisine de chez vous, qu'est-ce que c'est ?</h1> 

		<div class="about-block text"><p> Cuisine de chez vous est un site web de recettes de cuisine prônant le partage, la tradition et le savoir-faire français. Retrouver de nombreuses recettes revisitées que vous conaissez déjà, découvrez en de nouvelles et partagez les vôtre et vos avis. Cherchez, Péparez, Mangez !</p>
		</div>
		<div class="about-block image">
		<img src="img/about/carte_france.gif" alt="">
		</div>
  </div>

  <div class="about-creator">
      <h1 id="about-title"> Qui sommes nous ?</h1>
      <div class=" "><p> Ce site web à été réalisé par 6 étudiants du DUT informatique appartenant à l'Université Lyon 1 : ODIN Gabin, AUBOURG Thomas, LUISETTI Flavien, PICHARD David, MOHAMMAD Ayyan et Olivier dans le cadre du Projet Tuteuré.</p>
      </div>
      <div class="">
      <img src="img/about/logo_iut.png" alt="">
  </div>


	 
</body>

</html>
