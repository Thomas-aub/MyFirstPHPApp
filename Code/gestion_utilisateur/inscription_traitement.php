<?php 
    require_once 'config.php'; 

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']))
    {

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // verif mail majuscule/minuscule
        
        // Si 0 alors utilisateurs existe pas
        if($row == 0){ 
            if(strlen($pseudo) <= 100){ // pseudo pas trop long
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // verif format email
					if($password === $password_retype){ 

						// hashage mot de passe
						$password = password_hash($password, PASSWORD_DEFAULT);
						
						 

						// Insertion base de donnée
						$insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES(:pseudo, :email, :password)');
						$insert->execute(array(
							'pseudo' => $pseudo,
							'email' => $email,
							'password' => $password,
							//'ip' => $ip,
							//'token' => bin2hex(openssl_random_pseudo_bytes(64))
						));
						// redirection
						header('Location:inscription.php?reg_err=success');
						die();
					}else{ header('Location: inscription.php?reg_err=password'); die();}
				}else{ header('Location: inscription.php?reg_err=email'); die();}
            }else{ header('Location: inscription.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }
?>
