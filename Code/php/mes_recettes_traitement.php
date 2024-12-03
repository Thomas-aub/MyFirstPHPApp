<?php

    session_start(); // Démarrage session
    require_once 'config.php'; // connexion BD

    if(isset($_POST['mes_recettes-tri'])) // Si infos rentrés
    {
        $tri=$_POST['mes_recettes-tri'];
        
        if($tri == "date"){
            header('Location: ../mes_recettes.php?sort=date'); die();
        } elseif($tri == "rating") {
            header('Location: ../mes_recettes.php?sort=rating'); die();
        } elseif($tri == "commentaire") {
            header('Location: ../mes_recettes.php?sort=commentaire'); die();
        }
    }


?>
