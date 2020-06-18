<?php $bdd = new PDO("mysql:host=localhost;dbname=cv;charset=utf8", "root", ""); ?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/project.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <nav class="navbar">
                <div class="leboncoin-nav">
                        <h2><a class="leboncoin" href="annonces.php">Leboncoin</a></h2>
                </div>
                <div>
                        <a class="navbar-droite" href="annonces.php">Acceuil</a>
                        <a class="" href="connexion.php"><button class="connect">Se connecter / S'inscrire</button></a>
                </div>
        </nav>
<section>
        <div class="center">
                <p class="font">Voici les annonces de nos utilisateurs :</p>
        </div>

        <div class="left">

                <?php
                        $result = $bdd->query('SELECT * FROM project');
                while ($dossier = $result->fetch(PDO::FETCH_OBJ)) { ?>

                        <div class="card">
                                <div class="card-body">
                                        <h5 class="card-title"><?php echo $dossier->titre1; ?></h5>
                                        <p><?php echo $dossier->titre2; ?></p>
                                        <p><?php echo $dossier->titre3; ?></p>
                                        <?php 
                                                echo "<div class='img_div'>";
                                                        echo "<img src='images/".$dossier->image."' >";
                                                echo "</div>";
                                        ?>
                                </div>
                        </div>

                <?php } ?>

                
        </div>

</section>

        
</body>
</html>