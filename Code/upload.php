<?php 
    session_start();
    require_once './php/config.php'; // ajout connexion bdd 

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



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>

    <link rel="stylesheet" href="css/upload.css">
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
			   <h2>Recette du jour</h2>
         <a href="recipe.php?id=<?php echo $recetteRandom["id"]?>">
            <?php 
              

                echo '<img  src="imgUploads/'.$recetteRandom["imgName"].'"/>';
             ?>
          
              </div>
            </a>
              <div class="row">
                <h2>Région Favorites</h2>
                <ul class="mega-links">
                  <li><a href="recherche.php?radioSans=none&region=bretagne&categorie=none">Bretagne</a></li>
                  <li><a href="recherche.php?radioSans=none&region=grand-est&categorie=none">Alsace-Lorraine</a></li>
                  <li><a href="recherche.php?radioSans=none&region=martinique&categorie=none">Martinique</a></li>
                  <li><a href="recherche.php?radioSans=none&region=reunion&categorie=none">La réunion</a></li>
                </ul>
              </div>
              <div class="row">
                <h2>Plats</h2>
                <ul class="mega-links">
				  <li><a href="recherche.php?radioSans=none&region=none&categorie=entree">Entrées</a></li>
				  <li><a href="recherche.php?radioSans=none&region=none&categorie=plat">Plats</a></li>
				  <li><a href="recherche.php?radioSans=none&region=none&categorie=dessert">Desserts</a></li>
					<li><a href="recherche.php?radioSans=none&region=none&categorie=boisson">Boissons</a></li>
                </ul>
              </div>
              <div class="row">
                <h2>Spécial</h2>
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
    









    <main>
        <header>
        </header>
        <div class="test">
            <form action="./php/upload-back.php" method="get" enctype="multipart/form-data">
                <div class="page" id="page1">
                    <h1>Titre</h1>
                    <div>
                        <label for="titre">Rentrez un titre :</label>
                        <input type="text" id="titre" name="titre" required>
                    </div>

                    <div class="img-upload">
                      <label for="upload-img">Chosissez une photo pour votre recette: (1 Mo max)</label>
                      <input type="hidden"  name="MAX_FILE_SIZE" value="10048576" />
                      <input type="file" name="fichier" id="upload-img"/>
                    </div>
                    <button class="next" type="button">Suivant</button>
                </div>


                <!---  Page n°2 -->
                <div class="page" id="page2">
                    <h>Informations de la recette</h>
                    <div class="all2">
                        <div>
                            <select class="categorie" name="categorie">
                                <option selected>Catégorie</option>
                                <option value="entree">Entrée</option>
                                <option value="plat">Plat principal</option>
                                <option value="dessert">Dessert</option>
                                <option value="accompagnement">Accompagnement</option>
                                <option value="boisson">Boisson</option>
                                <option value="confiserie">Confiserie</option>
                                <option value="sauce">Sauce</option>
                            </select>
                        </div>

                        <div>
                            <label for="port"> Pour combien de personnes :</label>
                            <input type = "number" name="port"/>
                        </div>

                        <div>
                            <p>Temps de préparations :</p>
                            <label for="prepTime"> Heures :</label>
                            <input type = "time" name="prepTime"/>
                        </div>

                        <div>
                            <p>Temps de cuisson :</p>
                            <label for="cookTime"> Heures :</label>
                            <input type = "time" name="cookTime"/>
                        </div>

                        <div>
                            <p>Temps de repos :</p>
                            <label for="restTime"> Heures :</label>
                            <input type = "time" name="restTime"/>
                        </div>

                        <select class="cuiss" name="cuiss">
                                <option selected>Type de cuisson</option>
                                <option value="Four">Four</option>
                                <option value="Plaques">Plaques</option>
                                <option value="Sans cuisson">Sans cuisson</option>
                                <option value="Autres">Autres</option>
                        </select>

                        <select class="cost" name="cost">
                                <option selected>Prix</option>
                                <option value="Très peu cher">Très peu cher</option>
                                <option value="Abordable">Abordable</option>
                                <option value="Cher">Cher</option>
                                <option value="Très chère">Très chère</option>
                        </select>

                        <select class="dif" name="dif">
                                <option selected>Difficulté</option>
                                <option value="Débutant">Débutant</option>
                                <option value="Amateur">Amateur</option>
                                <option value="Complexe">Complexe</option>
                                <option value="Cordon bleu">Cordon bleu</option>
                        </select>
                    
                        
                    </div>
                    
                    <button class="prev" type="button">Précédent</button>
                    <button class="next" type="button">Suivant</button>
                </div>




                <div class="page" id="page3">
                    <h1>Ingédients</h1>

                    <div>
                        <p>Listez les ingrédients, avec les quantiés</p>
                        <div class="ing">
                            <input type="text"name="ingredient1" placeholder="Nom de l'ingrédient"/>
                            <input type="number" name="quantite1"placeholder="Quantité"/>
                            <input type="text" name="unite1"placeholder="Unité de mesure"/>
                        </div>
                        <button id="new-ing-btn" class="new" type="button" onclick="addIngredient()">Ajouter un autre ingrédient</button>

                    </div>

                    <input id="ing" type="hidden" value="1" name="ing" />


                  <div class="check">
                    <?php
                    $optquery = $bdd -> prepare("SELECT * FROM option");
                    $optquery -> execute();
                    foreach ($optquery as $key => $option){
                      echo "<div class='tamere'>";
                        echo "<input class='checkbox' type='checkbox' id='". $option["name"]."' name='" . $option["name"]. "' value='". $option["name"]. "'>" ;
                        echo "<label class='check-name' for='". $option["name"]. "'>". $option["option"]. "</label>";
                        echo "</div>";
                      };
                    ?>
                  </div>
                    <button class="prev" type="button">Précédent</button>
                    <button class="next" type="button">Suivant</button>
                </div>

                <div class="page" id="page4">
                    <h1>Etapes</h1>

                    <div>
                      <p>Listez les étapes</p>
                      <div class="step">
                      <input type="text"name="step1" placeholder="Etape n°1: "/>
                      </div>
                      <button id="new-step-btn" class="new" type="button" onclick="addStep()">Ajouter une autre étape</button> 

                    </div>

                    <input id="step" type="hidden" value="1" name="step" />

                    <button class="prev" type="button">Précédent</button>
                    <button class="next" type="button">Suivant</button>
                </div>




                <div class="page" id="page5">
                    <h1>Contexte</h1>
                    <div>
                        <label for="histoire">Histoire de la recette :</label>
                        <textarea id="histoire" name="histoire" rows="15" cols="70" placeholder="Ecrire l'histoire de la recette ..."></textarea>
                    </div>
                    <div>
                      <select class="region" name="region">
                        <option selected>Région</option>
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
                    </div>
                    
                    <button class="prev" type="button">Précédent</button>
                    <button>Terminer</button>
                </div>
            </form>
        </div>
    </main>
    
    <script src="./js/upload.js"></script>
</body>
</html>

