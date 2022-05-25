<?php
include "connect.php";

date_default_timezone_set('Europe/Paris');

$today = new datetime();
$today0 = $today->format('Y-m-d');
$today1 = $today->modify('+1 days')->format('Y-m-d');
$today2 = $today->modify('+1 days')->format('Y-m-d');
$today3 = $today->modify('+1 days')->format('Y-m-d');
$today4 = $today->modify('+1 days')->format('Y-m-d');
$today5 = $today->modify('+1 days')->format('Y-m-d');
$today6 = $today->modify('+1 days')->format('Y-m-d');

$jour = array("$today0", "$today1", "$today2","$today3","$today4","$today5","$today6");
//$jour = array("$today0", "$today1");
$creneau=array();
$heureres=array();


for($i=0;$i<COUNT($jour);$i++)
{
$requeteSQL = "SELECT heureCreneau, dateCreneau FROM `creneau` WHERE dateCreneau = '$jour[$i]'";
$executequery = mysqli_query($bdd_login, $requeteSQL);


while($donnee= mysqli_fetch_assoc($executequery)){
     $datebdd=$donnee['dateCreneau'];
     array_push($creneau, $datebdd);

     $heurebdd=$donnee['heureCreneau'];
     array_push($heureres,$heurebdd);
    }
}

for($i=0;$i<COUNT($creneau);$i++)
echo $creneau[$i]."<br>";
for($i=0;$i<COUNT($heureres);$i++)
echo $heureres[$i]."<br>";


?>