<?php
include "connect.php";

if (isset($_POST['button'])) {
    $iddoc = $_POST["doc"] != "" ? $_POST["doc"] : "doc vide";
    $idlab = $_POST["lab"] != "" ? $_POST["lab"] : "lab vide";
}

//on recup le docteur
$classemed;
$nomDocteur;
$prenomDocteur;

$requeteSQL = "SELECT * FROM `medecin` WHERE idMedecin=$iddoc";
$executequery = mysqli_query($bdd_login, $requeteSQL);

while ($donnee = mysqli_fetch_assoc($executequery)) {
    $classemed= $donnee['specialiteMedecin'];
    $nomDocteur= $donnee['nomMedecin'];
    $prenomDocteur= $donnee['prenomMedecin'];
}


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

$heurecreneau=array();


//Rajouter id LABO + id Medecin

for($i=0;$i<COUNT($jour);$i++)
{
    $requeteSQL = "SELECT heureCreneau, dateCreneau FROM `creneau` WHERE dateCreneau = '$jour[$i]' AND idMedecin=$iddoc AND idLabo=$idlab";
    $executequery = mysqli_query($bdd_login, $requeteSQL);


while($donnee= mysqli_fetch_assoc($executequery)){
     $datebdd=$donnee['dateCreneau'];
     array_push($creneau, $datebdd);

     $heurebdd=$donnee['heureCreneau'];
     array_push($heureres,$heurebdd);

     array_push($heurecreneau,  $datebdd.$heurebdd);

    }
}

for($i=0;$i<COUNT($creneau);$i++)
echo $creneau[$i]."<br>";
for($i=0;$i<COUNT($heureres);$i++)
echo $heureres[$i]."<br>";

for($i=0;$i<COUNT($heurecreneau);$i++)
echo $heurecreneau[$i]."<br>";

include "edtadd.php";

?>