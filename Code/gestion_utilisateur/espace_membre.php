<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


          
            <title>Connexion</title>
			
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
        <div class="login-form">
             <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            
            <form action="connexion.php" method="post">
                <h2 class="text-center">Connexion</h2>       
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </div>   
            </form>
            <p class="text-center"> Vous n'avez pas de compte ? <a href="inscription.php">Inscription</a></p>
        </div>
		
		
		</div>
        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }
            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 2px 5px 5px 5px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .login-form h2 {
                margin: 0 0 15px;
            }
            .form-control, .btn {
                min-height: 38px;
                border-radius: 2px;
            }
            .btn {        
                font-size: 15px;
                font-weight: bold;
            }
        </style>
        </body>
</html>
