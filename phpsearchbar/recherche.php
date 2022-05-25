<?php

include "connect.php";

if (isset($_GET['user'])) {
    $user = (string)  trim($_GET['user']);

    $requeteSQL = "SELECT * FROM `medecin`, `labo` WHERE `prenomMedecin` LIKE '$user%' OR `salleLabo` LIKE '$user%'";
    $executequery = mysqli_query($bdd_login, $requeteSQL);

    while ($donnee = mysqli_fetch_assoc($executequery)) {
        if (strpos($donnee['prenomMedecin'],$user) !== false) {
            echo $donnee['prenomMedecin'] . " " . $donnee['nomMedecin']. " Spécialité: " . $donnee['specialiteMedecin']."<br>";
        } else if(strpos($donnee['salleLabo'],$user) !== false) {
            echo " " . $donnee['salleLabo']. " Téléphone: ".$donnee['telLabo']."<br>";
        }
    }
}
