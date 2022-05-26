<?php

include "connect.php";

$tabdoc=array();
$tabiddoc=array();
$tabbureau=array();
$tabtel=array();
$tabmail=array();

$requeteSQL = "SELECT * FROM `medecin`";
$executequery = mysqli_query($bdd_login, $requeteSQL);


while($donnee= mysqli_fetch_assoc($executequery)){
     $nomMedecin=$donnee['nomMedecin'];
     array_push($tabdoc, $nomMedecin);

     $idMedecin=$donnee['idMedecin'];
     array_push($tabiddoc,$idMedecin);

     $bureauMedecin=$donnee['bureauMedecin'];
     array_push($tabbureau,$bureauMedecin);

     $telMedecin=$donnee['telMedecin'];
     array_push($tabtel,$telMedecin);

     $courrielMedecin=$donnee['courrielMedecin'];
     array_push($tabmail,$courrielMedecin);     
    }

/*
    for($i=0; $i<COUNT($tabdoc);$i++)
    {
        echo $tabdoc[$i];
        echo $tabiddoc[$i];
        echo $tabbureau[$i];
        echo $tabtel[$i];
        echo $tabmail[$i];
    }
    */?>
