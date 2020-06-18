<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cv', 'root', '');
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
$msg = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ?');
$msg->execute(array($_SESSION['id']));
$msg_nbr = $msg->rowCount();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Document</title>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="css/project.css">
</head>
<body>
<nav class="navbar">
      <div class="center">
         <h2><a class="leboncoin1" href="annonces.php">Leboncoin</a></h2>
      </div>
   </nav>
   <a href="envoi.php">Nouveau message</a><br /><br /><br />
   <h3>Votre boîte de réception:</h3>
   <?php
   if($msg_nbr == 0) { echo "Vous n'avez aucun message..."; }
   while($m = $msg->fetch()) {
      $p_exp = $bdd->prepare('SELECT pseudo FROM membres WHERE id = ?');
      $p_exp->execute(array($m['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['pseudo'];
   ?>
   <b><?= $p_exp ?></b> vous a envoyé: <br />
   <?= nl2br($m['message']) ?><br />
   -------------------------------------<br/>
   <?php } ?>
</body>
</html>
<?php } ?>