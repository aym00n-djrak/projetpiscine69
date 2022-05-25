<?php
include "connect.php";
include "edtadd.php";

if(isset($_POST['button'])){
     $heure = $_POST["heure"] != "" ? $_POST["heure"] : "heure vide";
     $creneauheure = $_POST["creneauheure"] != "" ? $_POST["creneauheure"] : "creneauheure vide";
     }
$reserveOuPas = 1;
$consultationFinie = 0;
//echo "creneauheure ".$creneauheure."<br>";
$creneau = substr($creneauheure, 0, strpos($creneauheure, $heure));
echo "creneau ".$creneau."<br>";
echo "heure ".$heure."<br>";
echo "reserveOuPas ".$reserveOuPas."<br>";
echo "consultationFinie ".$consultationFinie."<br>";
echo "idClient ".$idClient."<br>";
echo "idMedecin ".$idMedecin."<br>";
echo "idLabo ".$idLabo."<br>";

$requeteSQL = "INSERT INTO `creneau`(`dateCreneau`, `heureCreneau`, `reserveOuPas`, `consultationFinie`, `idClient`, `idMedecin`, `idLabo`) VALUES ('$creneau','$heure',$reserveOuPas,$consultationFinie,$idClient,$idMedecin,$idLabo)";
$executequery = mysqli_query($bdd_login, $requeteSQL);

echo "Insertion Reussie !"
?>