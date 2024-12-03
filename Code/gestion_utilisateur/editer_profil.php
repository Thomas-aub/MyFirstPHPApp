<?php 

session_start();
require_once 'config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if(!isset($_SESSION['user'])){
	header('Location:espace_membre.php');
	die();
}

// On récupere les données de l'utilisateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Editer profil</title>


<link rel="stylesheet" href="./css/style_edit.css">
</head>

<body>
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
                <img src="tartiflette.jpg" alt="">
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
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'newpassword':
                        ?>
                            <div>
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'passwordconfirm':
                        ?>
                            <div>
                                <strong>Erreur</strong> pas le bon mdp
                            </div>
                        <?php
                        break;

                        case 'empty':
                        ?>
                            <div>
                                <strong>Erreur</strong> remplir tte les cases
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
						  rows="6" cols="50"></textarea>
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


	<div class="retour">
			<button class="slide" onclick="window.location.href = 'landing.php';">RETOUR</button>
	</div>
	
	<!--a class="policy" target="popup" onclick="window.open('Privacy_policy_html5templates.html', 'hello', 'width=500, height=500')">Privacy Policy</a>-->
	

</div>
</body>

</html>
