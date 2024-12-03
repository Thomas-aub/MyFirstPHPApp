<?php 
    session_start();
    require_once './php/config.php'; // ajout connexion bdd 


    // On récupere les données de l'utilisateur
    if (isset($_SESSION['user'])){
      $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
      $req->execute(array($_SESSION['user']));
      $data = $req->fetch();
}
   

    
    $reqRandom = $bdd->prepare('SELECT *
    FROM recette 
    ORDER BY RAND() LIMIT 1');
    $reqRandom->execute();
    $recetteRandom = $reqRandom->fetch(); 
   
?>
<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">
<title>Acceuil</title>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">.
<link rel="stylesheet" href="./css/style_edit.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
  <body id="index">
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
          <label href ="recherche.php" for="showMega" class="mobile-item">Recherche</label>
          <div class="mega-box">
            <div class="content">
			
              <div class="row">
			   <header>Recette du jour</header>
         <a href="recipe.php?id=<?php echo $recetteRandom["id"]?>">
            <?php 
              

                echo '<img  src="imgUploads/'.$recetteRandom["imgName"].'"/>';
             ?>
          
              </div>
            </a>
              <div class="row">
                <header>Région Favorites</header>
                <ul class="mega-links">
                  <li><a href="recherche.php?radioSans=none&region=bretagne&categorie=none">Bretagne</a></li>
                  <li><a href="recherche.php?radioSans=none&region=grand-est&categorie=none">Alsace-Lorraine</a></li>
                  <li><a href="recherche.php?radioSans=none&region=martinique&categorie=none">Martinique</a></li>
                  <li><a href="recherche.php?radioSans=none&region=reunion&categorie=none">La réunion</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Plats</header>
                <ul class="mega-links">
				  <li><a href="recherche.php?radioSans=none&region=none&categorie=entree">Entrées</a></li>
				  <li><a href="recherche.php?radioSans=none&region=none&categorie=plat">Plats</a></li>
				  <li><a href="recherche.php?radioSans=none&region=none&categorie=dessert">Desserts</a></li>
					<li><a href="recherche.php?radioSans=none&region=none&categorie=boisson">Boissons</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Spécial</header>
                <ul class="mega-links">
                  <li><a href="recherche.php?radioSans=VG&region=none&categorie=none">Végetariens</a></li>
                  <li><a href="recherche.php?radioSans=ss&region=none&categorie=none">Sans sucre</a></li>
                  <li><a href="#">Sans lactose</a></li>
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
        <?php if (isset($_SESSION['user'])){?>
          <li><a href="mes_recettes.php">Mes Recettes</a></li>
          <li><a href="mes_favoris.php">Mes Favoris</a></li>
          <li><a href="editer_profil.php">Editer Profil</a></li>

          <li><a href="./php/deconnexion.php">Deconnexion</a></li>
        <?php } else { ?>
          <li><a href="espace_membre.php">Connexion</a></li>
          <li><a href="inscription.php">Inscription</a></li>

        <?php } ?>
		  </ul>
		</li>
	  </ul>
	  <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
	</div>
   </nav>
	

<div class="index-title">
    <h1><br> Bienvenue sur Cuisine de chez vous, le site de cuisine française par excellence <br><br></h1>

</div>


<div id="index-type">

          <a href="recherche.php?categorie=entree">
            <div id="index-type-1" class="index-link">Entrées</div>	
          </a>
          
          <a href="recherche.php?categorie=plat">
            <div id="index-type-2" class="index-link">Plats</div>	
          </a>

          <a href="recherche.php?categorie=dessert">
            <div id="index-type-3" class="index-link">Desserts</div>
          </a>

          <a href="recherche.php?categorie=boisson">
            <div id="index-type-4" class="index-link">Boissons</div>
          </a>

    </div>

    <!-- Quote -->
    <div  class="big-quote">
        <div class="quote"><h2>"Parce que le meilleur plat n'est pas le plus cher, mais celui que l'on partage"</h2></div>
    </div>
    <!-- FIN Quote -->


    <div id="index-content">
        <?php 
           $req = $bdd->prepare('SELECT * FROM recette where rating = (select MAX(rating) from recette) ');
           $req->execute();
           $recetteStar = $req->fetch(); 

           $req2 = $bdd->prepare('SELECT * FROM recette where nbrComments = (select MAX(nbrComments) from recette) ');
           $req2->execute();
           $recetteDebat = $req2->fetch();
        ?>

        <a href="recipe.php?id=<?php echo $recetteStar["id"]?>">
            <div class="index-recettes">
                <h2> La recette star ! </h2>
                <?php 
                echo '<img src="imgUploads/'.$recetteStar["imgName"].'"/>';
                ?>
                <h3> <?php echo $recetteStar["title"] ?></h3>
            </div>
        </a>

        <a href="recipe.php?id=<?php echo $recetteDebat["id"]?>">
            <div class="index-recettes">
                <h2> La recette qui fait débat ! </h2>
                <?php 
                echo '<img src="imgUploads/'.$recetteDebat["imgName"].'"/>';
                ?>
                <h3> <?php echo $recetteDebat["title"] ?></h3>
            </div>
        </a>


    </div>
            


</body>
</html>

