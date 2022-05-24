<?php
include "connexionBDD.php";
echo "page connexion médecin <br>";
if($BDDTrouvee){
	echo "BDD existe";
}
?>

<!doctype html>
<html>
<head>
</head>
<body>
	<form class="formulaireLoginMedecin" method="POST">
		<br /><b>VEUILLEZ VOUS IDENTIFIER A L'ESPACE MEDECIN</b><br />
		Nom: <input type="text" name="nomMedecin" /> <br />
		Prénom: <input type="text" name="prenomMedecin" /> <br />
		Courriel: <input type="email" name="courrielMedecin" /> <br />
		<input type="submit" name="loginEspaceMedecin" value="Se connecter" />
	</form>

<?php
$nom = isset($_POST['nomMedecin']) ? isset($_POST['nomMedecin']) : " "; 
$prenom = isset($_POST['prenomMedecin']) ? isset($_POST['prenomMedecin']) : " "; 
$courriel = isset($_POST['courrielMedecin']) ? isset($_POST['courrielMedecin']) : " "; 
?>

</body>
</html>