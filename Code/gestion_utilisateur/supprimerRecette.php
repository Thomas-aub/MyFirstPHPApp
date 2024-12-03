<?php
require_once 'config.php';


$recette_a_supp = $_GET['suppID'];


$req = $bdd ->prepare("DELETE FROM recette WHERE id = :id ");
$req->execute(array("id" => $recette_a_supp));
header('Location:mes_recettes.php');
die();
?>
