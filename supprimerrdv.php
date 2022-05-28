<?php
include "connexionBDD.php";
include "phprdvpasfini/loadrdv.php";
include "RendezVous.php";

$idCreneau;

if (isset($_POST['bouton'])) {
    $dossierClient = isset($_POST['choixdossierClient']) ? $_POST['choixdossierClient'] : " ";
}

echo $dossierClient;


for ($i = 0; $i < COUNT($tabidrdv); $i++) {
    $dateheure = $tabdaterdv[$i] . " a " . $tabheurerdv[$i];


    if ($dossierClient == $dateheure) {
        $idCreneau = $tabidrdv[$i];
    }
}

echo $idCreneau;

$requeteSQL = "DELETE FROM `creneau` WHERE idCreneau=$idCreneau";
$executequery = mysqli_query($bdd_login, $requeteSQL);

echo "Rdv i=$idCreneau bien supprimé";

