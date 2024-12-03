<?php 
    session_start(); // Démarrage session
    require_once 'config.php'; // connexion BD

    if(!empty($_POST['email']) && !empty($_POST['password'])) // Si infos rentrés
    {
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); // verif email
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // SVerif utilisateur exite
        if($row > 0)
        {
            // Verif mail
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                // Verif mdp
                if(password_verify($password, $data['password']))
                {
                    $_SESSION['user'] = $data['pseudo'];
                    header('Location: ../landing.php');
                    die();
                }else{ header('Location: ../espace_membre.php?login_err=password'); die(); }
            }else{ header('Location: ../espace_membre.php?login_err=email'); die(); }
        }else{ header('Location: ../espace_membre.php?login_err=already'); die(); }
    }else{ header('Location: ../espace_membre.php'); die();} // si pas de données
?>