<?php
include "connect.php";

$tabidrdvfini=array();
$tabdaterdvfini=array();
$tabheurerdvfini=array();

$requeteSQL = "SELECT * FROM `creneau` WHERE `consultationFinie`=1";
$executequery = mysqli_query($bdd_login, $requeteSQL);


while($donnee= mysqli_fetch_assoc($executequery)){
     $idCreneau=$donnee['idCreneau'];
     array_push($tabidrdvfini, $idCreneau);

     $dateCreneau=$donnee['dateCreneau'];
     array_push($tabdaterdvfini, $dateCreneau);

     $heureCreneau=$donnee['heureCreneau'];
     array_push($tabheurerdvfini,$heureCreneau);
    }

?>
