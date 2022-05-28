<?php

include "connect.php";

if (isset($_GET['user'])) {
    $user = (string)  trim($_GET['user']);

    $requeteSQL = "SELECT distinct prenommedecin, nommedecin, bureaumedecin, specialitemedecin FROM `medecin`, `labo` WHERE `prenomMedecin` LIKE '$user%' OR `salleLabo` LIKE '$user%'";
    $executequery = mysqli_query($bdd_login, $requeteSQL);

    while ($donnee = mysqli_fetch_assoc($executequery)) {
        if (strpos($donnee['prenommedecin'],$user) !== false) {
            echo $donnee['prenommedecin'] . " " . $donnee['nommedecin']. " <b>Spécialité:</b> " . $donnee['specialitemedecin']."<br>";
        } else if(strpos($donnee['salleLabo'],$user) !== false) {
            echo " " . $donnee['salleLabo']. " <b>Téléphone:</b> ".$donnee['telLabo']."<br>";
        }
    }
}
