<?php 
    session_start(); // demarrage de la session
    session_destroy(); // destruction session
    header('Location:espace_membre.php'); // redirection
?>