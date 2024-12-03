<?php 
    session_start(); // demarrage de la session
    session_destroy(); // destruction session
    header('Location:../index.php'); // redirection
?>