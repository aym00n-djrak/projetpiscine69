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
				<option value=1>Nom1 Pr�nom1</option>
				<option value=2>Nom2 Pr�nom2</option>
			</select>
			<br /><br />VEUILLEZ SAISIR LES INFORMATIONS A MODIFIER<br />
			Nom: <input type="text" name="nomMedecin" /> <br />
			Prenom: <input type="text" name="prenomMedecin" /> <br />
			Sp�cialit�: <select name="specialite">
				<option value="">choisir...</option>
				<option value="generaliste">M�decin g�n�raliste</option>
				<option value="addictologie">Addictologie</option>
				<option value="cardiologie">Cardiologie</option>
				<option value="dermatologie">Dermatologie</option>
				<option value="andrologie">Andrologie</option>
				<option value="gastro-hepato-enterologie">Gastro-H�pato-Ent�rologie</option>
				<option value="gynecologie">Gyn�cologie</option>
				<option value="ist">IST</option>
				<option value="osteopathie">Ost�opathie</option>
			</select> <br />
			Bureau: <input type="text" name="bureauMedecin" /> <br />
			Courriel: <input type="email" name="courrielMedecin" /> <br />
			T�l�phone: <input type="number" name="telMedecin" /> <br />
			Formation CV (50 caract�res maximum): <br /> <textarea maxlength="50" name="formationsCVMedecin"></textarea> <br />
			Exp�riences CV (50 caract�res maximum): <br /> <textarea maxlength="50" name="experiencesCVMedecin"></textarea> <br />
			<input type="submit" name="ordreModification" value="Modifier ce m�decin" />
		</form>
</body>
</html>