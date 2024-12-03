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
<title>Editer profil</title>


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
	
<!--<div class="all>-->
<div class="all">
<div class="box">
	<h2>Modification du mot de passe</h2>
	<form action="editer_profil_traitement.php" method="POST">
		<input type="password" name="current_password" placeholder="mot de passe" required="required">
		<input type="password" name="new_password" placeholder="Nouveau mot de passe" required="required">
		<input type="password" name="new_password_confirm" placeholder="Confirmation Nouveau mot de passe" required="required">
		<button type="submit">Modifier</button>
	</form>
	<?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div>
                                <strong>Succès</strong> Modification réussie !
                            </div>
                        <?php
                        break;

                        case 'passwordconfirm':
                        ?>
                            <div>
                                <strong>Erreur</strong> Confirmation différentes !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div>
                                <strong>Erreur</strong> Mauvais mot de passe !
                            </div>
                        <?php
                        break;

                        case 'empty':
                        ?>
                            <div>
                                <strong>Erreur</strong> Cases vides !
                            </div>
                        <?php 
                 

                    }
                }
                ?>

</div>

<div class="box">
	<h2>Complétez votre profil</h2>
	<form action="editer_profil.php" method="POST">
		<h3> date de naissance : </h3>
		<input type="date" name="date_naiss" placeholder="date de naissance">
		<label><h3>Sexe : </h3><input type="radio" name="sex" value="H" checked> Homme <input type="radio" name="sex" value="F"> Femme </label>
		<h3> Qui êtes-vous ? </h3>
		<!--<input type="text" name="description" placeholder="Décrivez-vous..." class="desc">-->

				<textarea id="description" name="description"
						 cols="30" rows="6"></textarea>
		<button type="submit">Valider</button>
	</form>

<?php
	
	   if(!empty($_POST['date_naiss'])){
        // XSS 
        $date_naiss = htmlspecialchars($_POST['date_naiss']);



		// On met à jour la table utiisateurs
		$update = $bdd->prepare('UPDATE utilisateurs SET date_naiss = :date_naiss WHERE pseudo = :pseudo');
		$update->execute(array(
			"date_naiss" => $date_naiss,
			"pseudo" => $_SESSION['user']
		));

		}
        


   

	
	if(!empty($_POST['sex'])){
		
		if($_POST['sex'] == 'H'){
			
			$sexe = 'Homme';
			
		} else {
			$sexe = 'Femme';
		}
		$update1 = $bdd->prepare('UPDATE utilisateurs SET sexe = :sex WHERE pseudo = :pseudo');
		$update1->execute(array(
			"sex" => $sexe,
			"pseudo" => $_SESSION['user']
		));

		}
        


   

	
	if(!empty($_POST['description'])){
		
		$desc = htmlspecialchars($_POST['description']);
		
		
		$update2 = $bdd->prepare('UPDATE utilisateurs SET description = :description WHERE pseudo = :pseudo');
		$update2->execute(array(
			"description" => $desc,
			"pseudo" => $_SESSION['user']
		));

		}
        


   

		
		
	
	

	
	?>
</div>


	<div class="retour red-button">
			<button class="slide" onclick="window.location.href = 'landing.php';">RETOUR</button>
	</div>
	
	<!--a class="policy" target="popup" onclick="window.open('Privacy_policy_html5templates.html', 'hello', 'width=500, height=500')">Privacy Policy</a>-->
	

</div>
</body>

</html>
