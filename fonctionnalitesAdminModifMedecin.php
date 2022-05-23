<?php 
include "connexionBDD.php";
echo "page modification medecin <br>";
if($BDDTrouvee){
	echo "BDD existe";
}
?>

<!doctype html>
<html>
<head>
</head>
<body>
		<form class="formulaireModifMedecin">
			<br />VEUILLEZ CHOISIR LE MEDECIN A MODIFIER: <select name="medecinAModifier">
				<option>choisir...</option>
				<option value=1>Nom1 Prénom1</option>
				<option value=2>Nom2 Prénom2</option>
			</select>
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
			<input type="submit" name="ordreModification" value="Modifier ce médecin" />
		</form>
</body>
</html>