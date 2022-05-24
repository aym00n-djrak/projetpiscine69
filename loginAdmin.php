<?php
include "connexionBDD.php";
echo "page connexion admin <br>";
if($BDDTrouvee){
	echo "BDD existe";
}
?>

<!doctype html>
<html>
<head>
</head>
<body>
	<form class="formulaireLoginAdmin" method="POST">
		<br /><b>VEUILLEZ VOUS IDENTIFIER A L'ESPACE ADMINISTRATEUR</b><br />
		Nom: <input type="text" name="nomAdmin" /> <br />
		Prénom: <input type="text" name="prenomAdmin" /> <br />
		Courriel: <input type="email" name="courrielAdmin" /> <br />
		<input type="submit" name="loginEspaceAdmin" value="Se connecter" />
	</form>

<?php
$nom = isset($_POST['nomAdmin']) ? isset($_POST['nomAdmin']) : " "; 
$prenom = isset($_POST['prenomAdmin']) ? isset($_POST['prenomAdmin']) : " "; 
$courriel = isset($_POST['courrielAdmin']) ? isset($_POST['courrielAdmin']) : " "; 
?>

</body>
</html>