<?php
//connexion principale a la base de donnee
$bdd="hopital"; //reconnaissance du nom de la bdd renseignee
$bdd_login=mysqli_connect('localhost', 'root', ''); //reconnaissance de l'id et du mot de passe de la base de donnees
$bdd_trouvee= mysqli_select_db($bdd_login,$bdd); //recherche de base de donnees avec ces informations
?>