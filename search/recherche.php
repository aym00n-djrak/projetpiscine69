<?php

include "connect.php";

if (isset($_GET['user'])) {
    $user = (string)  trim($_GET['user']);

    $requeteSQL = "SELECT * FROM `medecin`, `labo` WHERE `prenomMedecin` LIKE '$user%' OR `salleLabo` LIKE '$user%' LIMIT 1";
    $executequery = mysqli_query($bdd_login, $requeteSQL);
    
    while ($donnee = mysqli_fetch_assoc($executequery)) {
        echo $donnee['prenomMedecin'] ." ". $donnee['nomMedecin'];
        echo " ".$donnee['salleLabo'];

    }
}
?>