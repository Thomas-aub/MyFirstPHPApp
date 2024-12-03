<?php
  session_start();
  require_once 'config.php'; // ajout connexion bdd 


 
$pict = NULL;

if (isset($_GET["titre"]))  {

  

  if (isset($_FILES['fichier']) &&  // On commence par vérifier que ce soit le bon type de fichier
      $_FILES['fichier']['error'] == 0 &&
      $_FILES['fichier']['size'] <= 1 * 1024 * 1024) //Méga bytes
  {
    
    $infosfichier = pathinfo($_FILES['fichier']['name']);
    $ext_upload = $infosfichier['extension'];
    if (in_array($ext_upload, array('jpg', 'gif', 'png', 'jpeg')))
    {
      move_uploaded_file(                   // ICI on ajoute au dossier uploads l'image séléctionnée
        $_FILES['fichier']['tmp_name'],
        '../imgUploads/'.basename($_FILES['fichier']['name']));
      $pict = $_FILES['fichier']['name'];
      
    }
  }


  $title = $_GET["titre"];
  $categorie = $_GET["categorie"];
  $cookTime = $_GET["cookTime"];
  $restTime = $_GET["restTime"]; 
  $prepTime = $_GET["prepTime"];
  $servings = $_GET["port"];
  $cuiss = $_GET["cuiss"];
  $difficulty = $_GET["dif"];
  $cost = $_GET["cost"];

  $history = $_GET["histoire"];
  $region = $_GET["region"];


  $user = $_SESSION['user'];
  $userquery = $bdd->prepare("SELECT id FROM utilisateurs WHERE pseudo = ? ");
  $userquery->execute(array($user));
  
  foreach($userquery as $key => $user){
    $iduser = $user['id'];
}

  


  
  $query = $bdd -> prepare("INSERT INTO recette (title, categorie, cookTime, restTime, prepTime, servings, cuiss, difficulty, cost, history, region, userID, imgName) 
                            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $query -> execute(array($title, $categorie, $cookTime, $restTime, $prepTime, $servings, $cuiss, $difficulty, $cost, $history, $region, $iduser, $pict));

  $ing = $_GET["ing"];
  $recipeID = $bdd -> lastInsertId();
  echo $ing;
 $i =1;
 $j = 1;

  for ($i; $i <= $ing; $i++) {
    $name = $_GET['ingredient'.$i];
    $amount = $_GET['quantite'. $i];
    $measure = $_GET['unite'. $i];
    $ingquery = $bdd -> prepare('INSERT INTO recipe_ingredients (name, amount, measure, recipeID) VALUES(?, ?, ?, ?)');
    $ingquery -> execute(array($name, $amount, $measure, $recipeID));
    
    
  }
  

  $step = $_GET["step"];
  for ($j; $j <= $step; $j++) {
    $stepNbr = $j;
    $stepDesc= $_GET['step'.$j];

  
    $stepquery = $bdd -> prepare('INSERT INTO steps (recipeID, stepNbr, stepDesc) VALUES(?, ?, ?)');
    $stepquery -> execute(array($recipeID, $stepNbr, $stepDesc ));
 
  }


  $optquery = $bdd -> prepare("SELECT * FROM option");
  $optquery -> execute();

  foreach ($optquery as $key => $option){
    if(filter_has_var(INPUT_GET,$option["name"])){
      $tempo = $_GET[$option["name"]];
      echo $recipeID;
      echo $tempo;
      $ptnquery = $bdd -> prepare ('INSERT INTO optionjoin (recipeID, opt) VALUES (?, ?)');
      $ptnquery -> execute(array($recipeID, $tempo));
    }
  };


  header("Location: ../index.php ", 302);


}

?>