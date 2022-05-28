<?php
//source design: https://www.html.am/html-codes/tables/table-background-color.cfm#:~:text=In%20HTML%2C%20table%20background%20color,to%20a%20table%20in%20HTML.
// https://us.niemvuilaptrinh.com/article/36-html-table-css-examples-beautiful

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
<html>
<head>
  <title>CV</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Accueil.css">

</head>
</html>

<?xml version="1.0" encoding ="utf-8"?>
<!DOCTYPE cvs SYSTEM >
<cvs>	<cv id="<?php echo $idMedecin;?>">
		<etatcivil><?php echo"
<style>
table, th, td {
  border:1px solid black;
  background-color: yellow;
  font-size: larger;
  border-color: green;
      border-bottom: 1px solid #dddddd;
border-bottom: 2px solid #009879;
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;

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
