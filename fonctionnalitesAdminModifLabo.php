<?php 
include "connexionBDD.php";
echo "page modification laboratoire <br>";
if($BDDTrouvee){
	echo "BDD existe<br><br>";
}
?>

<!doctype html>
<html>
<head>
</head>
<body>
		<form class="formulaireModifLabo" method="POST">
		<br />VEUILLEZ CHOISIR LE LABORATOIRE A MODIFIER: <select name="laboAModifier">
				<option>choisir...</option>
				<option value=1>Salle1 Tel1</option>
				<option value=2>Salle2 Tel2</option>
			</select>
			<br>Option alternative: saisir l'id du laboratoire à modifier: <input type="text" name="idModifTextField">
			<br /><br />VEUILLEZ SAISIR LES INFORMATIONS A MODIFIER<br />
			<br />
		Salle: <input type="text" name="salleLabo" /> <br />
		Courriel: <input type="email" name="courrielLabo" /> <br />
		Téléphone: <input type="number" name="telLabo" /> <br />
		<input type="submit" name="ordreModifLabo" value="Ajouter ce laboratoire" />
		
			<?php 	
			if(isset($_POST['ordreModifLabo'])){
				//$idAdminActuel = 1;
				$salle = isset($_POST['salleLabo']) ? $_POST['salleLabo'] : " ";
				$tel = isset($_POST['telLabo']) ? $_POST['telLabo'] : 0;
				$courriel = isset($_POST['courrielLabo']) ? $_POST['courrielLabo'] : " ";
				$idAModifier = isset($_POST['idModifTextField']) ? $_POST['idModifTextField'] : 0;
				$requete = "UPDATE `hopital`.`labo` SET `salleLabo` = '$salle', `telLabo` = '$tel', `courrielLabo` = '$courriel' WHERE `labo`.`idlabo` = $idAModifier;";
				echo "requete formulée $requete";
				$commande = mysqli_query($loginBDD, $requete);
				echo "<br>Modification laboratoire avec id $idAModifier OK<br><br>";
			}
			?>		
		</form>
</body>
</html>