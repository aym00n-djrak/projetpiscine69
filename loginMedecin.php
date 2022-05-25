<?php
include "connexionBDD.php";
echo "page connexion medecin <br>";
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
		Prenom: <input type="text" name="prenomMedecin" /> <br />
		Courriel: <input type="email" name="courrielMedecin" /> <br />
		<input type="submit" name="loginEspaceMedecin" value="Se connecter" />
<?php
if(isset($_POST['loginEspaceMedecin'])){
	$nom = isset($_POST['nomMedecin']) ? $_POST['nomMedecin'] : " "; 
	$prenom = isset($_POST['prenomMedecin']) ? $_POST['prenomMedecin'] : " "; 
	$courriel = isset($_POST['courrielMedecin']) ? $_POST['courrielMedecin'] : " "; 

	$requete = "SELECT * FROM `medecin` where(nommedecin = '$nom' and prenommedecin = '$prenom' and courrielmedecin = '$courriel');";
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