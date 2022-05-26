<?php
include "connect.php";

//Mettre un idClient dynamique
$idClient="1";
$idLabo;
$idMedecin;
$idCreneau;
$nomMedecin;
$dateRdv;
$heureRdv;
$salleLabo;
$courrielLabo;

$message="";

$requeteSQL = "SELECT * FROM `creneau` WHERE `idClient`=$idClient";
$executequery = mysqli_query($bdd_login, $requeteSQL);

while ($donnee = mysqli_fetch_assoc($executequery)) {
     $heureRdv = $donnee['heureCreneau'];
     $dateRdv = $donnee['dateCreneau'];
     $idMedecin = $donnee['idMedecin'];
     $idLabo = $donnee['idLabo'];
     $idCreneau = $donnee['idCreneau'];
}

$requeteSQL = "SELECT * FROM `labo` WHERE `idLabo`=$idLabo";
$executequery = mysqli_query($bdd_login, $requeteSQL);

while ($donnee = mysqli_fetch_assoc($executequery)) {
     $salleLabo = $donnee['salleLabo'];
     $courrielLabo = $donnee['courrielLabo'];

}

$requeteSQL = "SELECT * FROM `medecin` WHERE `idMedecin`=$idMedecin";
$executequery = mysqli_query($bdd_login, $requeteSQL);

while ($donnee = mysqli_fetch_assoc($executequery)) {
     $nomMedecin= $donnee['nomMedecin'];
}


if(empty($idLabo)){
     $message="Utilisateur non connecté";
     $idLabo=$message;
}
if(empty($idMedecin)){
     $message="Utilisateur non connecté";
     $idMedecin=$message;
}
if(empty($idCreneau)){
     $message="Utilisateur non connecté";
     $idCreneau=$message;
}
if(empty($nomMedecin)){
     $message="Utilisateur non connecté";
     $nomMedecin=$message;
}
if(empty($dateRdv)){
     $message="Utilisateur non connecté";
     $dateRdv=$message;
}
if(empty($heureRdv)){
     $message="Utilisateur non connecté";
     $heureRdv=$message;
}
if(empty($salleLabo)){
     $message="Utilisateur non connecté";
     $salleLabo=$message;
}
if(empty($courrielLabo)){
     $message="Utilisateur non connecté";
     $courrielLabo=$message;
}

