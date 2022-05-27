<?php
include "connexionBDD.php";
include "phprdvpasfini/loadrdv.php";
include "phprdvfini/loadrdv.php";
include "phpclient/loadclient.php";
include "fonctionnalitesMedecin.php";

if (isset($_POST['boutonfin'])) {
    $dossierClientfini = isset($_POST['choixdossierClientfini']) ? $_POST['choixdossierClientfini'] : " ";
    $daterdv = isset($_POST['choixdossierClient']) ? $_POST['choixdossierClient'] : " ";
    $idCreneau = isset($_POST['idrdv']) ? $_POST['idrdv'] : " ";
    $patient = isset($_POST['choixPatient']) ? $_POST['choixPatient'] : " ";
}


for ($i = 0; $i < COUNT($tabidrdv); $i++) {
    $dateheure = $tabdaterdv[$i] . " a " . $tabheurerdv[$i];

    if ($daterdv == $dateheure) {
        $idCreneau = $tabidrdv[$i];
    }
}


$requeteSQL = "UPDATE `creneau` SET `consultationFinie`=1 WHERE `idCreneau`=$idCreneau";
$executequery = mysqli_query($bdd_login, $requeteSQL);


echo "Le creneau pour le patient: $patient a bien été terminé !";
