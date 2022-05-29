<?php
//source design: https://www.html.am/html-codes/tables/table-background-color.cfm#:~:text=In%20HTML%2C%20table%20background%20color,to%20a%20table%20in%20HTML.
// https://us.niemvuilaptrinh.com/article/36-html-table-css-examples-beautiful

include "connexionBDD.php";
$idMedecin = 1; $nomMedecin; $prenomMedecin; $specialiteMedecin;
$courrielMedecin; $telephoneMedecin; $formationsMedecin; $experiencesMedecin;
echo "page cv <br>";
if ($BDDTrouvee) {
//recuperation des informations liees au medecin pour affichage de son cv

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
<html>
<head>
  <title>CV</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Accueil.css">

</head>
</html>
		<!-- lien avec un fichier xml avec extension php pour recuperer les informations de la base de donnees -->

<?xml version="1.0" encoding ="utf-8"?>
<!DOCTYPE cvs SYSTEM >
<cvs>	<cv id="<?php echo $idMedecin;?>">
		<!-- effet de style pour le visuel du cv -->

		<etatcivil><?php echo"
<style>
table, th, td {
  border:1px solid midnightblue;
  background-color: dodgerblue;
  font-size: larger;
  border-color: midnightblue;
      border-bottom: 1px solid midnightblue;
border-bottom: 2px solid midnightblue;
  box-shadow: midnightblue -1px 1px, midnightblue -2px 2px, midnightblue -3px 3px;

}
</style>"?>

<table >
  <tr>
    <td><b>Nom</b></td>
    <td>			<nom><?php echo $nomMedecin;?></nom>
</td>
  </tr>
    <tr>
    <td><b>Prenom</b></td>
    <td>			<prenom><?php echo $prenomMedecin;?></prenom>
</td>
  </tr>
  <tr>
    <td><b>Courriel</b></td>
    <td>			<email><?php echo $courrielMedecin;?></email>
</td>
  </tr>
  <tr>
    <td><b>Specialite</b></td>
    <td>		<specialite><?php echo $specialiteMedecin;?></specialite>
</td>
  </tr>
    <tr>
    <td><b>Telephone</b></td>
    <td>		<tel><?php echo $telephoneMedecin;?></tel>

</td>
  </tr>
  <tr>
    <td><b>Formations</b></td>
    <td>		<formations><?php echo $formationsMedecin;?></formations>
</td>
  </tr>
  <tr>
    <td><b>Experiences</b></td>
    <td>		<experiences><?php echo $experiencesMedecin;?></experiences>
</td>
  </tr>
</table>


</body>
</html>
	</cv>
</cvs>
