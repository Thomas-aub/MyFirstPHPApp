<?php require_once './php/config.php'; ?>
<?php include_once './css/stylecss.php';?>
<?php include_once './css/allcss.php';?>

<?php

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

  
		$bdd=connectDB();
        $id = $_GET["id"];
		$query=$bdd->prepare('SELECT * from recette where id=?');
		$query -> execute(array($id));
		$resultat = $query->fetchAll();
		
		foreach($resultat as $recette){
			$nom=$recette['title'];
			$dif=$recette['difficulty'];
			$prep= explode(":",$recette['prepTime']);
			$cook=explode(":",$recette['cookTime']);
			$rest=explode(":",$recette['restTime']);
			$nbrEtapes=$recette['steps'];
			$cout=$recette['cost'];
			$nbrP=$recette['servings'];
			$nbrCom=$recette['nbrComments'];
            $img = $recette["imgName"];
          
            $histoire = $recette["history"];
		}
		$query2=$bdd->prepare('SELECT * from recipe_ingredients where recipeID=?');
		$query2 -> execute(array($id));
		$resultat2 = $query2->fetchAll();
		
		$query3=$bdd->prepare('SELECT * from steps where recipeID=?');
		$query3 -> execute(array($id));
		$resultat3 = $query3->fetchAll();

        $query4=$bdd->prepare('SELECT pseudo,date,cDesc from comments c inner join utilisateurs u 
                                on c.userId=u.id where recipeID=?');
		$query4 -> execute(array($id));
		$resultat4 = $query4->fetchAll();

        //formatage du temps de cuisson/repos/preparation

        function format($tab){
            if($tab[0]!="00"){
                if($tab[1]!="00"){
                    if($tab[2]!="00"){
                       $tabClean= $tab[0].'h'.$tab[1].'m'.$tab[2].'s';
                    }
                }else{
                    if($tab[2]!="00"){
                        $tabClean= $tab[0].'h'.$tab[2].'s';
                    }else{
                        $tabClean= $tab[0].'h';
                    }
                }
            }
            else{
                if($tab[1]!="00"){
                    if($tab[2]!="00"){
                        $tabClean=$tab[1].'m'.$tab[2].'s';
                    }else{
                        $tabClean=$tab[1].'m';
                    }
                }else{
                    if($tab[2]!="00"){
                        $tabClean=$tab[2].'s';
                    }else{
                        $tabClean='Aucun';
                    }
                }
            }
            return $tabClean;
        }
        $prepa=format($prep);
        $cooking=format($cook);
        $resting=format($rest)
        

	?>

<head>
<meta charset="utf-8">
<title>Accueil</title>

<link rel="stylesheet" href=".\css\style.css">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="./css/style_edit.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>

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


    <div id="page">
        <div id="header">
            <!--<h1>Header</h1>-->
            
        </div>
        <div id="Contenu">
            <div id="Contenu-milieu">
                <div id="Recette">
                    <div class="presentation">
                        <div class="presentation-haut">
                            <div class="titre">
                                <h1><?php echo $nom;?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="photo">
                        <?php echo "<img class='picture' src='./imgUploads/" .$img. "'>";?>
                    </div>
                    <div class="presentation-bas">
                        <div class="recette_info">
                            <div class="recette_info_gauche">
                                <div class="info">
                                    <img class="info_img" src="./asset/toque-et-cuillere.png">
                                    <span class="info_txt"><b><?php echo $dif;?></b></span>
                                </div>
                                <div class="info">
                                    <img class="info_img" src="./asset/minuterie-de-cuisine.png">
                                    <span class="info_txt"><b><?php echo $prepa;?></b></span>
                                </div>
                                <div class="info">
                                    <img class="info_img" src="./asset/euro.png">
                                    <span class="info_txt"><b><?php echo $cout;?></b></span>
                                </div>
                            </div>
                            <div class="notation"> 
                                <div class="etoile">
                                    <span class="note_recette">4,8</span>
                                    <span class="note_recette_max">/5</span>
                                    <i class="star"><img class="img_etoile" src="./asset/etoile_pleine.png"></i>
                                </div>
                                <div class="avis">
                                    <span class="nbr_notes">700 notes</span>
                                </div>
                            </div>
                            <div class="recette_info_droite">
                                <div class="info">
                                        <button class="bouton_sauvegarde">
                                            <img src="./asset/coeur.png">
                                        </button>
                                </div>
                                <div class="info">
                                        <button onclick="makePDF()" id="pdf">
                                            <img src="./asset/fichier-pdf.png">
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conteneur_ingredients">
                            <h2 class="titre_secondaire">INGRÉDIENTS : <?php echo $nbrP ?> personnes</h2>
                            <div class="ingredients_contenu">
                                <div class="ingredients">
                                    <?php foreach($resultat2 as $recette):?>
											<?='- '.$recette['amount'].' '.$recette['measure'].' '.$recette['name'].'<br>'?>
									<?php endforeach ?>
                                </div>
                            </div>       
                    </div>
                    <div class="conteneur_preparation">
                        <div class="cont_titre_temps">
                            <div class="cont_titre">
                                <h2 class="titre_secondaire">PRÉPARATION :</h2>              
                            </div>
                            <div class="rappel_temps_recette">
                                <div class="preparation">
                                    <span class="preparation_titre">Préparation :</span>
                                    <span class="preparation_temps"><?php echo $prepa ?></span>
                                </div>
                                <div class="repos">
                                    <span class="preparation_titre">Repos :</span>
                                    <span class="preparation_temps"><?php echo $resting ?></span>
                                </div>
                                <div class="cuisson">
                                    <span class="preparation_titre">Cuisson :</span>
                                    <span class="preparation_temps"><?php echo $cooking ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="etape_de_la_recette">
                                  <?php foreach($resultat3 as $recette):?>
                                    <div class="conteneur_etape">
											<div class="nbrEtape"><h1><?='<b>'.$recette['stepNbr'].'.<br><br></b>'?></h1></div>
											<div class="intituleEtape"><?=$recette['stepDesc'].'<br><br>'?></div>
                                    </div>	
								    <?php endforeach?>
                        </div>
                    </div>
                    
                    <div class="conteneur_histoire">
                        <h2 class="titre_histoire">HISTOIRE :</h2>
                        <div class="histoire">
                                    <?php if ($histoire != ""): ?>
                                        <?= $histoire ?>
                                    <?php else: ?>
                                        <?= "Aucune histoire n'est renseignée pour cette recette"?>
                                    <?php endif?>
                        </div>
                    </div>

                    <div class="conteneur_commentaires">
                        <div class="conteneur_titre_nbr_de_com">
                            <h2 class="titre_secondaire">COMMENTAIRES</h2>
                            <span class="nbr_de_com">(<?php echo $nbrCom?>) :</span>
                        </div>
                        <div class="commentaires">
                
                                    <?php foreach($resultat4 as $recette): ?>
                                        <?php $originalDate =$recette['date'];
                                              $timestamp = strtotime($originalDate);
                                              $newDate = date("d-m-Y",$timestamp);
                                        ?>
                                        <div class="commentaires_infos">
                                            <div class="profil_user">
                                                <div class="enfant">
                                                    <?= $recette['pseudo']?>
                                                </div>
                                            </div>
                                            <div class="com_desc">
                                                <?=$newDate.'<br>'?>
                                                <?=$recette['cDesc']?>
                                                <div class="commentaires_reaction">
                                                        <button class="bouton_aimer">
                                                            <img class="bouton_aimer_img" src="./asset/pouces-vers-le-haut.png">
                                                            <span class="bouton_aimer_nbr">25</span>
                                                        </button>
                                                        <button class="bouton_pas_ouf" >
                                                            <img class="bouton_pas_ouf_img" src="./asset/ne-pas-aimer.png">
                                                            <span class="bouton_pas_ouf_nbr">2</span>
                                                        </button>
                                                </div>
                                            </div>		
                                        </div>	
                                <?php endforeach?>	
                                	
                        </div>
                    </div>
                </div>
            </div>
            <div id="Contenu-droite">
                
            </div>
        </div>
        <div id="pagePDF">
            <div id="conteneur_pdf">
                <div class="nomMarque">
                    <h2>Cuisine de chez vous </h2>
                </div>
                <div class="cont_pdf">
                    <div class="pdf_gauche">
                        <div class="conteneur_ingredients">
                                <h3 class="titre_secondaire">INGRÉDIENTS : <?php echo $nbrP ?> personnes</h3>
                                <div class="ingredients_contenu">
                                    <div class="ingredients">
                                        <?php foreach($resultat2 as $recette):?>
                                                <?='- '.$recette['amount'].' '.$recette['measure'].' '.$recette['name'].'<br>'?>
                                        <?php endforeach ?>
                                    </div>
                                </div>       
                    </div>
                    <div class="pdf_droite">
                            <div class="titre_recette">
                                <h3><?php echo $nom;?></h3>
                            </div>
                            <div class="conteneur_preparation">
                                <div class="cont_titre_temps">
                                    <div class="cont_titre">
                                        <h3 class="titre_secondaire">PRÉPARATION :</h3>              
                                    </div>
                                    <div class="rappel_temps_recette">
                                        <div class="preparation">
                                            <span class="preparation_titre">Préparation :</span>
                                            <span class="preparation_temps"><?php echo $prepa ?></span>
                                        </div>
                                        <div class="repos">
                                            <span class="preparation_titre">Repos :</span>
                                            <span class="preparation_temps"><?php echo $resting ?></span>
                                        </div>
                                        <div class="cuisson">
                                            <span class="preparation_titre">Cuisson :</span>
                                            <span class="preparation_temps"><?php echo $cooking ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="etape_de_la_recette">
                                        <?php foreach($resultat3 as $recette):?>
                                            <div class="conteneur_etape">
                                                    <div class="nbrEtape"><h1><?='<b>'.$recette['stepNbr'].'.<br><br></b>'?></h1></div>
                                                    <div class="intituleEtape"><?=$recette['stepDesc'].'<br><br>'?></div>
                                            </div>	
                                            <?php endforeach?>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>                     
            </div>
        </div>
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        function makePDF(){
            var pdf = new jsPDF("p","px",[500,842]);
            window.html2canvas = html2canvas;
            var contenu = document.getElementById("pagePDF");
            contenu.style.display = "flex";
            contenu.style.opacity="1";
            pdf.html(contenu,{
                callback: function (pdf) {
                    contenu.style.display ="none";
                    contenu.style.opacity ="0";
                    pdf.save('test.pdf');
                }
            })
        }
    </script>
</body>