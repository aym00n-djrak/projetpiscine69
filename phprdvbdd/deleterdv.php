<?php
include "rdv.php";
$requeteSQL = "DELETE FROM `creneau` WHERE `idCreneau`=$idCreneau";
$executequery = mysqli_query($bdd_login, $requeteSQL);

$message="Suppression reussi !";
?>