<?php 
include "connexionBDD.php";
echo "page ajout medecin <br>";

$idAdminActuel = 1;

$nom = isset($_POST['nomMedecin']) ? $_POST['nomMedecin'] : "0";
$prenom = isset($_POST['prenomMedecin']) ? $_POST['prenomMedecin'] : "0";
$specialite = isset($_POST['specialite']) ? $_POST['specialite'] : "0";
$bureau = isset($_POST['bureauMedecin']) ? $_POST['bureauMedecin'] : "0";
$tel = isset($_POST['telMedecin']) ? $_POST['telMedecin'] : "0";
$courriel = isset($_POST['courrielMedecin']) ? $_POST['courrielMedecin'] : "0";
$formations = isset($_POST['formationsCVMedecin']) ? $_POST['formationsCVMedecin'] : "0";
$experiences = isset($_POST['experiencesCVMedecin']) ? $_POST['experiencesCVMedecin'] : "0";
if($BDDTrouvee){
	echo "BDD existe<br>";

	$requete = "INSERT INTO `hopital`.`medecin` (`idMedecin`, `nomMedecin`, `prenomMedecin`, `specialiteMedecin`, `bureauMedecin`, `telMedecin`, `courrielMedecin`, `formationCV`, `experiencesCV`, `idAdmin`) VALUES (NULL, '$nom', '$prenom', '$specialite', '$bureau', '$tel', '$courriel', '$formations', '$experiences', '$idAdminActuel');";
	$commande = mysqli_query($loginBDD, $requete);
	echo "Ajout medecin OK<br><br>";

	$requeteAffichage = "SELECT * FROM medecin";
	$commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
	while($donnee = mysqli_fetch_assoc($commandeAffichage)){
	echo "idMedecin: " . $donnee['idMedecin'] . '<br>';
	echo "nomMedecin: " . $donnee['nomMedecin'] . '<br>';
	echo "prenomMedecin: " . $donnee['prenomMedecin'] . '<br>';
	echo "specialiteMedecin: " . $donnee['specialiteMedecin'] . '<br>';
	echo "bureauMedecin: " . $donnee['bureauMedecin'] . '<br>';
	echo "telMedecin: " . $donnee['telMedecin'] . '<br>';
	echo "courrielMedecin: " . $donnee['courrielMedecin'] . '<br>';
	echo "formationCV: " . $donnee['formationCV'] . '<br>';
	echo "experiencesCV: " . $donnee['experiencesCV'] . '<br>';
	echo "idAdmin: " . $donnee['idAdmin'] . '<br>' . '<br>';
	}
}
