<?php
include "connexionBDD.php";
echo "page connexion admin <br>";

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
</body>
</html>