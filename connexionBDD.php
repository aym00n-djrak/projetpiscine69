<?php 
//connexion initiale a la base de donnees
$nomBDD = "hopital"; $loginBDD = mysqli_connect('localhost', 'root', '');
$BDDTrouvee = mysqli_select_db($loginBDD, $nomBDD);
?>