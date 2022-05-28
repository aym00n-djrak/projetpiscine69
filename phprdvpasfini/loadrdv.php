<?php
include "connect.php";

$tabidrdv=array();
$tabdaterdv=array();
$tabheurerdv=array();

$requeteSQL = "SELECT * FROM `creneau` WHERE `consultationFinie`=0";
$executequery = mysqli_query($bdd_login, $requeteSQL);


while($donnee= mysqli_fetch_assoc($executequery)){
     $idCreneau=$donnee['idCreneau'];
     array_push($tabidrdv, $idCreneau);

     $dateCreneau=$donnee['dateCreneau'];
     array_push($tabdaterdv, $dateCreneau);

     $heureCreneau=$donnee['heureCreneau'];
     array_push($tabheurerdv,$heureCreneau);
    }


    for($i=0;$i<COUNT($tabidrdv);$i++)
    {
        echo $tabidrdv[$i]. "<br>";
    }
?>
