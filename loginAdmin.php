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
		Prenom: <input type="text" name="prenomAdmin" /> <br />
		Courriel: <input type="email" name="courrielAdmin" /> <br />
		<input type="submit" name="loginEspaceAdmin" value="Se connecter" />

<?php
if(isset($_POST['loginEspaceAdmin'])){
	$nom = isset($_POST['nomAdmin']) ? $_POST['nomAdmin'] : " "; 
	$prenom = isset($_POST['prenomAdmin']) ? $_POST['prenomAdmin'] : " "; 
	$courriel = isset($_POST['courrielAdmin']) ? $_POST['courrielAdmin'] : " ";
	
	$requete = "SELECT * FROM `admin` where (nomadmin = '$nom' and prenomadmin = '$prenom' and courrieladmin = '$courriel');";
	$commande = mysqli_query($loginBDD, $requete);
	$resultat = "on sait pas encore"; $donnee = mysqli_fetch_assoc($commande);
	if($donnee['idAdmin']!=null){$resultat="Connexion reussie";} else{$resultat="Aucun client trouve";}
	echo "<br>requete formulee $requete";
	echo "<br>Resultat identification: $resultat<br><br>";
}
?>

	</form>
</body>
</html>