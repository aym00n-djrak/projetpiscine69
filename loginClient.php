<?php
include "connexionBDD.php";
echo "page connexion client <br>";
if($BDDTrouvee){
	echo "BDD existe";
}
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

<?php
if(isset($_POST['loginEspaceClient'])){
	$nom = isset($_POST['nomClient']) ? $_POST['nomClient'] : " "; 
	$prenom = isset($_POST['prenomClient']) ? $_POST['prenomClient'] : " "; 
	$mdp = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : " "; 
	$codePostal = isset($_POST['codePostalClient']) ? $_POST['codePostalClient'] : " "; 
	$courriel = isset($_POST['courrielClient']) ? $_POST['courrielClient'] : " ";
	$numCarteVitale = isset($_POST['numCarteVitaleClient']) ? $_POST['numCarteVitaleClient'] : " "; 
	$numCarteBancaire = isset($_POST['numCarteBancaireClient']) ? $_POST['numCarteBancaireClient'] : " ";

	$requete = "SELECT * FROM `client` WHERE (`nomClient` = '$nom' AND `prenomClient` = '$prenom' AND `courrielClient` = '$courriel' AND `motDePasseClient` = '$mdp' AND `codePostalClient` = '$codePostal' AND `carteVitaleClient` = '$numCarteVitale');";
	$commande = mysqli_query($loginBDD, $requete);
	$resultat = "on sait pas encore"; $donnee = mysqli_fetch_assoc($commande);
	if($donnee['idClient']!=null){$resultat="Connexion réussie";} else{$resultat="Aucun client trouvé";}
	echo "<br>requete formulée $requete";
	echo "<br>Resultat identification: $resultat<br><br>";
}
?>

	</form>
</body>
</html>