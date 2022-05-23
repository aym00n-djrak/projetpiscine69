<?php 
include "connexionBDD.php";
echo "page suppression medecin <br>";
if($BDDTrouvee){
	echo "BDD existe";

	$liste_id_medecins = array();
	$requeteAffichage = "SELECT * FROM medecin";
	$commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
	while($donnee = mysqli_fetch_assoc($commandeAffichage)){
		echo "idMedecin: " . $donnee['idMedecin'] . '<br>';
		array_push($liste_id_medecins, $donnee['idMedecin']);
	}
	print_r($liste_id_medecins);
	$taileListeIdMedecins = count($liste_id_medecins);
}
?>

<!doctype>
<html>
<head>
	<meta charset="iso-8859-1" />
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
	<h1>Bienvenue dans votre espace administrateur</h1>
	<form method="POST">
		<br /> VEUILLEZ CHOISIR LE MEDECIN A SUPPRIMER: <select class="medecinASupprimer">
			<option>choisir...</option>
				<script>
					<?php $count = 0;?>
					let taille = <?php echo $taileListeIdMedecins;?>;
					for(let parcours = 0; parcours<taille; ++parcours){
						$(".medecinASupprimer").append("<option value= <?php echo $liste_id_medecins[$count];?>>Id <?php echo $liste_id_medecins[$count];?></option>");
						<?php $count++;?>
					}
				</script>
			</select>
			<br>Option alternative: saisir l'id du médecin à supprimer: <input type="text" name="idSupTextField">
				<input type="submit" name="ordreSuprression" value="Supprimer ce médecin" /><br>
				
				<?php 
				//$idASupprimer = isset($_POST['medecinASupprimer']) ? $_POST['medecinASupprimer'] : 0;
				$idASupprimer = isset($_POST['idSupTextField']) ? $_POST['idSupTextField'] : 0;
				$requete = "DELETE FROM `medecin` WHERE idmedecin=$idASupprimer";
				if(isset($_POST['ordreSuprression'])){
					$commande = mysqli_query($loginBDD, $requete);
					echo "<br>Suppression médecin avec id $idASupprimer OK<br><br>";
				}
				?>
	</form>
</body>
</html>