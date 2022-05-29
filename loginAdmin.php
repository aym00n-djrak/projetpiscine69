<?php
include "connexionBDD.php";
echo "page connexion admin <br>";
if ($BDDTrouvee) {
	echo "BDD existe";
}
?>

		<!-- requete de comparaison pour la connexion de l'administrateur -->

<?php
if (isset($_POST['loginEspaceAdmin'])) {
	$nom = isset($_POST['nomAdmin']) ? $_POST['nomAdmin'] : " ";
	$prenom = isset($_POST['prenomAdmin']) ? $_POST['prenomAdmin'] : " ";
	$courriel = isset($_POST['courrielAdmin']) ? $_POST['courrielAdmin'] : " ";

	$requete = "SELECT * FROM `admin` where (nomadmin = '$nom' and prenomadmin = '$prenom' and courrieladmin = '$courriel');";
	$commande = mysqli_query($loginBDD, $requete);
	$resultat = "on sait pas encore";
	$donnee = mysqli_fetch_assoc($commande);
	if ($donnee['idAdmin'] != null) {
		$resultat = "Connexion reussie";//l'administrateur existe dans la base de donnes
	} else {
		$resultat = "Aucun admin trouve";//aucun administrateur ne correspond aux informations saisies, l'acces a l'espace administrateur est donc refuse
	}
	//echo "<br>requete formulee $requete";
	echo "<br>Resultat identification: $resultat<br><br>";
}
