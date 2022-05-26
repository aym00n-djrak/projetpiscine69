<?php
//source design: https://www.html.am/html-codes/tables/table-background-color.cfm#:~:text=In%20HTML%2C%20table%20background%20color,to%20a%20table%20in%20HTML.
include "connexionBDD.php";
$idMedecin = 1; $nomMedecin; $prenomMedecin; $specialiteMedecin;
$courrielMedecin; $telephoneMedecin; $formationsMedecin; $experiencesMedecin;
echo "page cv <br>";
if ($BDDTrouvee) {
    echo "BDD existe<br><br>";


	$requeteAffichage = "SELECT * FROM medecin where idmedecin = '$idMedecin'";
	$commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
	while($donnee = mysqli_fetch_assoc($commandeAffichage)){
	$nomMedecin =  $donnee['nomMedecin'];
	$prenomMedecin =  $donnee['prenomMedecin'];
	$specialiteMedecin =  $donnee['specialiteMedecin'];
	$courrielMedecin =  $donnee['courrielMedecin'];
	$telephoneMedecin =  $donnee['telMedecin'];
	$formationsMedecin =  $donnee['formationCV'];
	$experiencesMedecin =  $donnee['experiencesCV'];
	}
}
?>

<?xml version="1.0" encoding ="utf-8"?>
<!DOCTYPE cvs SYSTEM >
<cvs>
	<cv id="<?php echo $idMedecin;?>">
		<etatcivil>
			<nom><?php echo "<b>Nom: </b>" . $nomMedecin . "<br><br>";?></nom>
			<prenom><?php echo "<b>Prenom: </b>" . $prenomMedecin . "<br><br>";?></prenom>
			<email><?php echo "<b>Courriel: </b>" . $courrielMedecin . "<br><br>";?></email>
		</etatcivil>
		<specialite><?php echo "<b>Specialite: </b>" . $specialiteMedecin . "<br><br>";?></specialite>
		<tel><?php echo "<b>Telephone: </b>" . $telephoneMedecin . "<br><br>";?></tel>
		<formations><?php echo "<b>Formations: </b>" . $formationsMedecin . "<br><br>";?></formations>
		<experiences><?php echo "<b>Experiences: </b>" . $experiencesMedecin . "<br><br>";?></experiences>
	</cv>
</cvs>