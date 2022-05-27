<?php
include "connexionBDD.php";
include "fonctionnalitesMedecin.php";
$requeteSQL = "TRUNCATE `hopital`.`messagerie` ";
$executequery = mysqli_query($bdd_login, $requeteSQL);
?>
