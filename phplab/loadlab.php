<?php

include "connect.php";

$tabsalle=array();
$tabidlab=array();
$tabtel=array();
$tabmail=array();

$requeteSQL = "SELECT * FROM `labo`";
$executequery = mysqli_query($bdd_login, $requeteSQL);


while($donnee= mysqli_fetch_assoc($executequery)){
     $salleLabo=$donnee['salleLabo'];
     array_push($tabsalle, $salleLabo);

     $idLabo=$donnee['idLabo'];
     array_push($tabidlab,$idLabo);

     $telLabo=$donnee['telLabo'];
     array_push($tabtel,$telLabo);

     $courrielLabo=$donnee['courrielLabo'];
     array_push($tabmail,$courrielLabo);     
    }
?>
