<?php

$bdd = new PDO("mysql:host=localhost;dbname=cv;charset=utf8", "root", "");

//Enregistrement du nouvelle article
if (!empty($_POST)) {

    // la j'insere mes tables

    $_POST["titre1"] = htmlentities($_POST["titre1"], ENT_QUOTES);
    $_POST["titre2"] = htmlentities($_POST["titre2"], ENT_QUOTES);
    $_POST["titre3"] = htmlentities($_POST["titre3"], ENT_QUOTES);

   // If upload button is clicked ...
   if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];

    // image file directory
    $target = "images/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }

    

    $requeteSQL = "INSERT INTO project (titre1,titre2,titre3, image)";
    $requeteSQL .= " VALUE ('$_POST[titre1]', '$_POST[titre2]','$_POST[titre3]','$image')";
    //donc ici j'execute les requetes sql
    $result = $bdd->exec($requeteSQL);
    echo $result . ' Vos informations ont bien etait enregistrer<br>';
    
}



    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="css/project.css">
</head>
<body class="no-margin">
<nav class="navbar">
      <div class="center">
         <h2><a class="leboncoin1" href="annonces.php">Leboncoin</a></h2>
      </div>
   </nav>
<br>
<br>
<div class="center">
    <form method="POST" action="" enctype='multipart/form-data'>

        <div class="form-group">
            <label for="titre">titre1</label>
            <input class="radius1" type="texte" class="form-control" id="titre1" name="titre1">
        </div>
<br>
        <div class="form-group">
            <label for="titre">titre2</label>
            <input class="radius1" type="texte" class="form-control" id="titre2" name="titre2">
        </div>
<br>
        <div class="form-group">
            <label for="contenu">titre3</label>
            <textarea class="radius" rows="10" class="form-control" id="titre3" name="titre3"></textarea>
        </div>
<br>
        <div>
            <label>Inserez une image</label>
            <input type="file" name="image">
        </div>
<br>
		<button type="submit" name="upload" class="btn btn-primary">Enregistrer les informations</button>

    </form>
<br>
    <a href="annonces2.php">Voir les annonces</a>
</div>

</body>
</html>
