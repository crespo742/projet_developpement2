<?php

$bdd = new PDO("mysql:host=localhost;dbname=cv;charset=utf8", "root", "");
if ($bdd == true) {
    echo "ça marche";
}
?>