<?php
include "connexionBDD.php";
echo "page connexion m�decin <br>";

?>

<!doctype html>
<html>
<head>
</head>
<body>
	<form class="formulaireLoginMedecin" method="POST">
		<br /><b>VEUILLEZ VOUS IDENTIFIER A L'ESPACE MEDECIN</b><br />
		Nom: <input type="text" name="nomMedecin" /> <br />
		Pr�nom: <input type="text" name="prenomMedecin" /> <br />
		Courriel: <input type="email" name="courrielMedecin" /> <br />
		<input type="submit" name="loginEspaceMedecin" value="Se connecter" />
	</form>
</body>
</html>