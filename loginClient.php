<?php
include "connexionBDD.php";
echo "page connexion client <br>";
if ($BDDTrouvee) {
	//echo "BDD existe";
}
?>
		<!-- requete de comparaison sql pour identifier un client selon informations saisies -->

<?php
if (isset($_POST['loginEspaceClient'])) {
	$nom = isset($_POST['nomClient']) ? $_POST['nomClient'] : " ";
	$prenom = isset($_POST['prenomClient']) ? $_POST['prenomClient'] : " ";
	$mdp = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : " ";
	$codePostal = isset($_POST['codePostalClient']) ? $_POST['codePostalClient'] : " ";
	$courriel = isset($_POST['courrielClient']) ? $_POST['courrielClient'] : " ";
	$numCarteVitale = isset($_POST['numCarteVitaleClient']) ? $_POST['numCarteVitaleClient'] : " ";
	$numCarteBancaire = isset($_POST['numCarteBancaireClient']) ? $_POST['numCarteBancaireClient'] : " ";

	$requete = "SELECT * FROM `client` WHERE (`nomClient` = '$nom' AND `prenomClient` = '$prenom' AND `courrielClient` = '$courriel' AND `motDePasseClient` = '$mdp' AND `codePostalClient` = '$codePostal' AND `carteVitaleClient` = '$numCarteVitale');";
	$commande = mysqli_query($loginBDD, $requete);
	$resultat = "on sait pas encore";
	$donnee = mysqli_fetch_assoc($commande);
	if ($donnee['idClient'] != null) {
		$resultat = "Connexion reussie"; //dans le cas ou un client existe selon les informations saisies
	} else {
		$resultat = "Aucun client trouve";// dans le cas ou aucun client ne correspond aux informations saisies
	}
	//echo "<br>requete formulee $requete";
	echo "<br>Resultat identification: $resultat<br><br>";
}
