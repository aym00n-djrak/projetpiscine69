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
				<option value=1>Nom1 Pr�nom1</option>
				<option value=2>Nom2 Pr�nom2</option>
			</select>
			<br>Option alternative: saisir l'id du m�decin � modifier: <input type="text" name="idModifTextField">
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
			<input type="submit" name="ordreModification" value="Modifier ce m�decin" /> <br><br>
		
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
				echo "requete formul�e $requete";
				$commande = mysqli_query($loginBDD, $requete);
				echo "<br>Modification m�decin avec id $idAModifier OK<br><br>";
			}
			?>		
		</form>
</body>
</html>