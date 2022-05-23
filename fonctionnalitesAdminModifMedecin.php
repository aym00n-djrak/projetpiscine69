<?php 
include "connexionBDD.php";
echo "page modification medecin <br>";
if($BDDTrouvee){
	echo "BDD existe<br><br>";
}
?>

<!doctype html>
<html>
<head>
</head>
<body>
		<form method = "POST" class="formulaireModifMedecin">
			<br />VEUILLEZ CHOISIR LE MEDECIN A MODIFIER: <select name="medecinAModifier">
				<option>choisir...</option>
				<option value=1>Nom1 Prénom1</option>
				<option value=2>Nom2 Prénom2</option>
			</select>
			<br>Option alternative: saisir l'id du médecin à modifier: <input type="text" name="idModifTextField">
			<br /><br />VEUILLEZ SAISIR LES INFORMATIONS A MODIFIER<br />
			Nom: <input type="text" name="nomMedecin" /> <br />
			Prenom: <input type="text" name="prenomMedecin" /> <br />
			Spécialité: <select name="specialite">
				<option value="">choisir...</option>
				<option value="generaliste">Médecin généraliste</option>
				<option value="addictologie">Addictologie</option>
				<option value="cardiologie">Cardiologie</option>
				<option value="dermatologie">Dermatologie</option>
				<option value="andrologie">Andrologie</option>
				<option value="gastro-hepato-enterologie">Gastro-Hépato-Entérologie</option>
				<option value="gynecologie">Gynécologie</option>
				<option value="ist">IST</option>
				<option value="osteopathie">Ostéopathie</option>
			</select> <br />
			Bureau: <input type="text" name="bureauMedecin" /> <br />
			Courriel: <input type="email" name="courrielMedecin" /> <br />
			Téléphone: <input type="number" name="telMedecin" /> <br />
			Formation CV (50 caractères maximum): <br /> <textarea maxlength="50" name="formationsCVMedecin"></textarea> <br />
			Expériences CV (50 caractères maximum): <br /> <textarea maxlength="50" name="experiencesCVMedecin"></textarea> <br />
			<input type="submit" name="ordreModification" value="Modifier ce médecin" /> <br><br>
		
			<?php 	
			if(isset($_POST['ordreModification'])){
				//$idAdminActuel = 1;
				$nom = isset($_POST['nomMedecin']) ? $_POST['nomMedecin'] : " ";
				$prenom = isset($_POST['prenomMedecin']) ? $_POST['prenomMedecin'] : " ";
				$specialite = isset($_POST['specialite']) ? $_POST['specialite'] :" " ;
				$bureau = isset($_POST['bureauMedecin']) ? $_POST['bureauMedecin'] : " ";
				$tel = isset($_POST['telMedecin']) ? $_POST['telMedecin'] : 0;
				$courriel = isset($_POST['courrielMedecin']) ? $_POST['courrielMedecin'] : " ";
				$formations = isset($_POST['formationsCVMedecin']) ? $_POST['formationsCVMedecin'] :" ";
				$experiences = isset($_POST['experiencesCVMedecin']) ? $_POST['experiencesCVMedecin'] : " ";
				$idAModifier = isset($_POST['idModifTextField']) ? $_POST['idModifTextField'] : 0;
				$requete = "UPDATE `hopital`.`medecin` SET `nomMedecin` = '$nom', `prenomMedecin` = '$prenom', `specialiteMedecin` = '$specialite', `bureauMedecin` = '$bureau', `telMedecin` = '$tel', `courrielMedecin` = '$courriel', `formationCV` = '$formations', `experiencesCV` = '$experiences' WHERE `medecin`.`idMedecin` = $idAModifier;";
				echo "requete formulée $requete";
				$commande = mysqli_query($loginBDD, $requete);
				echo "<br>Modification médecin avec id $idAModifier OK<br><br>";
			}
			?>		
		</form>
</body>
</html>