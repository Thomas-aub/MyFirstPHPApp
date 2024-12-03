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






<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>A propos</title>

        <link rel="stylesheet" href=".\css\style.css">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/style_edit.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href=".\css\recherche.css">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>



    <div id="about">
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
	
    </div>
        <!-- BARRE DE RECHERCHE -->
    <div id="barreRecherche">
        <div class="barre1">
            <form id="recherche"> 
                <input class="input-recherche" type="search" name="recette" placeholder="Indiquez votre recherche" required >
                <button class="loupe" type="submit" value="Rechercher"><img class="search " src="asset/loupe.png" alt="BarreDeRecherche"></button>
            </form>
        </div>
    </div>
        <div class="center">
        <div class="bar">
            <form id="trie">
            <?php
                $optquery = $bdd -> prepare("SELECT * FROM option");
                $optquery -> execute(); ?>
                <select class='radioSans' name='radioSans' style="width:80%; margin:10%; margin-bottom:0; padding: 1.5%; font-family:'Lobster';font-size: 1.1em; ">
                <option selected value='none'>Attribut de la recherche</option><?php
                foreach ($optquery as $key => $option){
                   
                    echo "<option value='".$option["name"]."'>".$option["option"]."</option>";
                };  
                echo '</select>'
            ?> 

            <select class="region" name="region" style="width:80%; margin:10%; margin-bottom:0; padding: 1.5%; font-family:'Lobster';font-size: 1.1em;">
                <option selected value="none">Choisir une région</option>
                <option value="auvergne-rhone-alpes">Auvergne-Rhône-Alpes</option>
                <option value="bourgogne-franche-compté">Bourgogne-Franche-Compté</option>
                <option value="bretagne">Bretagne</option>
                <option value="centre-val-de-loire">Centre-Val de loire</option>
                <option value="corse">Corse</option>
                <option value="grand-est">Grand Est</option>
                <option value="hauts-de-france">Hauts-de-France</option>
                <option value="ile-de-france">Ile-de-France</option>
                <option value="normandie">Normandie</option>
                <option value="nouvelle-aquitaine">Nouvelle-Aquitaine</option>
                <option value="occitanie">Occitanie</option>
                <option value="pays-de-la-loire">Pays de la Loire</option>
                <option value="provence-alpes-cote-d-azur">Provence-Alpes-Côte d’Azur</option>
                <option value="guadeloupe">Guadeloupe</option>
                <option value="martinique">Martinique</option>
                <option value="mayotte">Mayotte</option>
                <option value="guyane">Guyane</option>
                <option value="reunion">La Réunion</option>
            </select>


            <select class="categorie" name="categorie"  style="width:80%; margin:10%; margin-bottom:0; padding: 1.5%; font-family:'Lobster';font-size: 1.1em; ">
                <option selected value="none">Catégorie</option>
                <option value="entree">Entrée</option>
                <option value="plat">Plat principal</option>
                <option value="dessert">Dessert</option>
                <option value="accompagnement">Accompagnement</option>
                <option value="boisson">Boisson</option>
                <option value="confiserie">Confiserie</option>
                <option value="sauce">Sauce</option>
            </select>
            <button class="trie" type="submit" value="trie" style="width:80%; margin:10%; margin-bottom:0; padding: 1.5%; background-color: rgb(223,227,227); font-size: 1.3em; font-family: Garamond, serif; font-weight: bold; border-radius: 10px;">Trier la recherche</button>

            </form>
        </div>
        
    
    


    <div class="middle">
        <div class="recette-box">
            <?php

            if (isset($_GET["recette"])){
                $test = strtolower($_GET["recette"]);
                $recquery = $bdd -> query('SELECT * FROM recette WHERE title LIKE "%'.$test.'%"');


                
            }elseif(isset($_GET["region"])){
            
            
                if(strcmp($_GET["region"], "none") == 0){
            
                    if (isset($_GET["radioSans"])){
                        $sans = $_GET["radioSans"];
                        if (strcmp($sans, "none") == 0){
            
                            if( (isset($_GET["categorie"])) && (strcmp($_GET["categorie"], "none") != 0) ){
            
                                    $recquery = $bdd -> prepare("SELECT * FROM recette WHERE categorie LIKE ?");
                                    $recquery -> execute(array($_GET["categorie"]));
                                
                            }else {
                                $recquery = $bdd -> prepare("SELECT * FROM recette");
                                $recquery -> execute();
                            }
                        }else{
                            if(isset($_GET["categorie"])){
            
                                if (strcmp($_GET["categorie"], "none") == 0){
                                    $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ?");
                                    $recquery -> execute(array($sans)); 
                                }else{
                                    $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ? AND recette.categorie LIKE ?");
                                    $recquery -> execute(array($sans, $_GET["categorie"])); 
                                }
                            }else {
                                $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ?");
                                $recquery -> execute(array($sans)); 
                            }
                        }
                    }else{
                        if(isset($_GET["categorie"])){
            
                            if (strcmp($_GET["categorie"], "none") == 0){
                                $recquery = $bdd -> prepare("SELECT * FROM recette");
                                $recquery -> execute();
                            }else{
                                $recquery = $bdd -> prepare("SELECT * FROM recette WHERE categorie LIKE ?");
                                $recquery -> execute(array($_GET["categorie"]));
                            }
                        }else {
                            $recquery = $bdd -> prepare("SELECT * FROM recette");
                            $recquery -> execute();
                        }
                    }
                } else {
            
                    if (isset($_GET["radioSans"])){
                        //SANS CHECKED
                        $sans = $_GET["radioSans"];
                
                            if (strcmp($sans, "none") == 0){
                            //SANS = none && region != none
                                if( (isset($_GET["categorie"])) && (strcmp($_GET["categorie"], "none") != 0) ){
                                //Catégorie CHECKED
                                    $recquery = $bdd -> prepare("SELECT * FROM recette WHERE region LIKE ? AND categorie LIKE ?");
                                    $recquery -> execute(array($_GET["region"], $_GET["categorie"]));
                
                                
                                }else {
                                    $recquery = $bdd -> prepare("SELECT * FROM recette WHERE region LIKE ?");
                                    $recquery -> execute(array($_GET["region"]));
                                // SANS = None && region != none
                                    
                                }
                            }else{
            
                                if( (isset($_GET["categorie"])) && (strcmp($_GET["categorie"], "none") != 0) ){
                                    //Catégorie CHECKED
                                    $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE region LIKE ? AND categorie LIKE ? AND optionjoin.opt LIKE ?");
                                    $recquery -> execute(array($_GET["region"], $_GET["categorie"], $sans));
                    
                                    
                                }else {
                                    // SANS = None && region != none
                                    $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE region LIKE ? AND optionjoin.opt LIKE ?");
                                    $recquery -> execute(array($_GET["region"], $sans));
                                    
                                        
                                }
                            }
                        }else{
                            
                            if( (isset($_GET["categorie"])) && (strcmp($_GET["categorie"], "none") != 0) ){
                            //Catégorie CHECKED
                                $recquery = $bdd -> prepare("SELECT * FROM recette WHERE region LIKE ? AND categorie LIKE ?");
                                $recquery -> execute(array($_GET["region"], $_GET["categorie"]));
            
                            
                            }else {
                                $recquery = $bdd -> prepare("SELECT * FROM recette WHERE region LIKE ?");
                                $recquery -> execute(array($_GET["region"]));
                            // SANS = None && region != none
                                
                            }
                        }
            
            
                }
            
            
            } else {
                if (isset($_GET["radioSans"])){
                    $sans = $_GET["radioSans"];
                    if (strcmp($sans, "none") == 0){
            
                        if(isset($_GET["categorie"])){
            
                            if (strcmp($_GET["categorie"], "none") == 0){
                                $recquery = $bdd -> prepare("SELECT * FROM recette");
                                $recquery -> execute();
                            }else{
                                $recquery = $bdd -> prepare("SELECT * FROM recette WHERE categorie LIKE ?");
                                $recquery -> execute(array($_GET["categorie"]));
                            }
                        }else {
                            $recquery = $bdd -> prepare("SELECT * FROM recette");
                            $recquery -> execute();
                        }
                    }else{
                        if(isset($_GET["categorie"])){
            
                            if (strcmp($_GET["categorie"], "none") == 0){
                                $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ?");
                                $recquery -> execute(array($sans)); 
                            }else{
                                $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ? AND recette.categorie LIKE ?");
                                $recquery -> execute(array($sans, $_GET["categorie"])); 
                            }
                        }else {
                            $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ?");
                            $recquery -> execute(array($sans)); 
                        }
                    }
                }else{
                    if(isset($_GET["categorie"])){
            
                        if (strcmp($_GET["categorie"], "none") == 0){
                            $recquery = $bdd -> prepare("SELECT * FROM recette");
                            $recquery -> execute();
                        }else{
                            $recquery = $bdd -> prepare("SELECT * FROM recette WHERE categorie LIKE ?");
                            $recquery -> execute(array($_GET["categorie"]));
                        }
                    }else {
                        $recquery = $bdd -> prepare("SELECT * FROM recette");
                        $recquery -> execute();
                    }
                }
            }
        






            // }elseif (isset($_GET["radioSans"])){
            //     $sans = $_GET["radioSans"];

            //     if (strcmp($sans, "none") == 0){

            //         if(isset($_GET["categorie"])){

            //             if (strcmp($_GET["categorie"], "none") == 0){
            //                 $recquery = $bdd -> prepare("SELECT * FROM recette");
            //                 $recquery -> execute();
            //             }else{
            //                 $recquery = $bdd -> prepare("SELECT * FROM recette WHERE categorie LIKE ?");
            //                 $recquery -> execute(array($_GET["categorie"]));
            //             }
            //         }else {
            //             $recquery = $bdd -> prepare("SELECT * FROM recette");
            //             $recquery -> execute();
            //         }
            //     }else{
            //         if(isset($_GET["categorie"])){

            //             if (strcmp($_GET["categorie"], "none") == 0){
            //                 $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ?");
            //                 $recquery -> execute(array($sans)); 
            //             }else{
            //                 $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ? AND recette.categorie LIKE ?");
            //                 $recquery -> execute(array($sans, $_GET["categorie"])); 
            //             }
            //         }else {
            //             $recquery = $bdd -> prepare("SELECT * FROM recette INNER JOIN optionjoin ON recette.id=optionjoin.recipeID WHERE optionjoin.opt LIKE ?");
            //             $recquery -> execute(array($sans)); 
            //         }
            //     }
            // }else{
            //     if(isset($_GET["categorie"])){

            //         if (strcmp($_GET["categorie"], "none") == 0){
            //             $recquery = $bdd -> prepare("SELECT * FROM recette");
            //             $recquery -> execute();
            //         }else{
            //             $recquery = $bdd -> prepare("SELECT * FROM recette WHERE categorie LIKE ?");
            //             $recquery -> execute(array($_GET["categorie"]));
            //         }
            //     }else {
            //         $recquery = $bdd -> prepare("SELECT * FROM recette");
            //         $recquery -> execute();
            //     }
            // }
            
            
            foreach ($recquery as $key => $recette){
                echo "<a href='./recipe.php?id=".$recette["id"]."'>";
                    echo "<div class='recette-container' data-aos='fade-right'>";
                        echo"<div class='recette-img'>";
                            echo "<img class='recette-img-shape' src='./imgUploads/". $recette["imgName"] ."' alt='' />";
                        echo"</div>";

                        echo "<div class='recette-info'>";
                            echo "<div class='recette-title'>";
                                echo $recette["title"];
                            echo "</div>";
                            echo "<div class='recette-desc'>";
                                echo $recette["history"];
                            echo "</div>";
                            echo "<div class='recette-stick'>";
                                echo strtoupper($recette["region"]);
                            echo"</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</a>";
            }
            ?>
        </div>
    </div>
    </div>
    <script src="js/main.js"></script>
        <!-- FIN BARRE DE RECHERCHE -->
        
    </body>
</html>

<script>
  AOS.init();
</script>