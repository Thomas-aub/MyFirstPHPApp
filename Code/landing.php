<?php 
    session_start();
    require_once './php/config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:espace_membre.php');
        die();
    }

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
<title>Espace membre</title>


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
	
  
  <div class="all">
        


		<div class="text-center">
				<h1>Bonjour <?php echo $data['pseudo']; ?> !</h1>
		</div>
        
    <div id="user-info">
		  <h2> Mes informations </h2>
			<p> Je suis né le <?php echo $data['date_naiss']; ?></p>
			<p> <?php echo $data['description']; ?></p>
    </div>
  </div>

    
        <div id="user-content">
          <a href="mes_recettes.php">
            <div id="user-content-left" class="user-link"><h2> Mes recettes</h2></div>	
          </a>
          
          <a href="mes_favoris.php">
            <div id="user-content-middle" class="user-link"><h2> Mes favoris</h2></div>	
          </a>

          <a href="editer_profil.php">
            <div id="user-content-right" class="user-link"><h2>editer profil </h2></div>
          </a>


        
        
        
        
        
        
        
        
          </div>   
      
    <div class="button-deco">
      <form action="./php/deconnexion.php" >
        <button type="submit" class="exit">DECONNEXION</button>
      </form>
  </div>
  
	  
	  

    




        

        

    
    
  </body>
</html>
