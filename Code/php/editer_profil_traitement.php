<?php 

session_start();
require_once 'config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if(!isset($_SESSION['user'])){
	header('Location:../espace_membre.php');
	die();
}

// On récupere les données de l'utilisateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

if(!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['new_password_confirm'])){
        // XSS 
        $current_password = htmlspecialchars($_POST['current_password']);
        $new_password = htmlspecialchars($_POST['new_password']);
        $new_password_confirm = htmlspecialchars($_POST['new_password_confirm']);

        // On récupère les infos de l'utilisateur
        $check_password  = $bdd->prepare('SELECT password FROM utilisateurs WHERE pseudo = :pseudo');
        $check_password->execute(array(
            "pseudo" => $_SESSION['user']
        ));
        $data_password = $check_password->fetch();

        // Si le mot de passe est le bon
        if(password_verify($current_password, $data_password['password']))
        {
            // Si le mot de passe tapé est bon
            if($new_password === $new_password_confirm){

                // On chiffre le mot de passe
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                // On met à jour la table utiisateurs
                $update = $bdd->prepare('UPDATE utilisateurs SET password = :password WHERE pseudo = :pseudo');
                $update->execute(array(
                    "password" => $new_password,
                    "pseudo" => $_SESSION['user']
                ));
				header('Location:../inscription.php?reg_err=success');
				die();
            }else{header('Location: ../landing.php?reg_err=passwordconfirm'); die();}
        }else{header('Location: ../landing.php?reg_err=password'); die();}
	}else{header('Location: ../landing.php?reg_err=empty'); die();}

?>