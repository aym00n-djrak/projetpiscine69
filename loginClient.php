<?php
include "connexionBDD.php";
echo "page connexion client <br>";

?>

<!doctype html>
<html>
<head>
</head>
<body>
	<form class="formulaireLoginClient" method="POST">
		<br /><b>VEUILLEZ VOUS IDENTIFIER A L'ESPACE CLIENT</b><br />
		Nom: <input type="text" name="nomClient" /> <br />
		Prénom: <input type="text" name="prenomClient" /> <br />
		Mot de passe: <input type="password" name="mdpClient" /> <br />
		Code postal: <input type="number" name="codePostalClient" /> <br />
		Courriel: <input type="email" name="courrielClient" /> <br />
		N° carte Vitale: <input type="number" name="numCarteVitaleClient" /> <br />
		N° carte bancaire: <input type="password" name="numCarteBancaireClient" /> <br />
		<input type="submit" name="loginEspaceClient" value="Se connecter" />
	</form>
</body>
</html>