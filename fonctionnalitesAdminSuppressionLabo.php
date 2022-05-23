<?php 
include "connexionBDD.php";
echo "page suppression laboratoire <br>";
if($BDDTrouvee){
	echo "BDD existe";

	$liste_id_labos = array();
	$requeteAffichage = "SELECT * FROM labo";
	$commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
	while($donnee = mysqli_fetch_assoc($commandeAffichage)){
		echo "idLabo: " . $donnee['idLabo'] . '<br>';
		array_push($liste_id_labos, $donnee['idLabo']);
	}
	print_r($liste_id_labos);
	$taileListeIdLabos = count($liste_id_labos);
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
		<br /> VEUILLEZ CHOISIR LE LABORATOIRE A SUPPRIMER: <select class="laboASupprimer">
			<option>choisir...</option>
				<script>
					<?php $count = 0;?>
					let taille = <?php echo $taileListeIdLabos;?>;
					for(let parcours = 0; parcours<taille; ++parcours){
						$(".laboASupprimer").append("<option value= <?php echo $liste_id_labos[$count];?>>Id <?php echo $liste_id_labos[$count];?></option>");
						<?php $count++;?>
					}
				</script>
			</select>
			<br>Option alternative: saisir l'id du laboratoire à supprimer: <input type="text" name="idSupTextField">
				<input type="submit" name="ordreSuprression" value="Supprimer ce laboratoire" /><br>
				
				<?php 
				//$idASupprimer = isset($_POST['laboASupprimer']) ? $_POST['laboASupprimer'] : 0;
				$idASupprimer = isset($_POST['idSupTextField']) ? $_POST['idSupTextField'] : 0;
				$requete = "DELETE FROM `labo` WHERE idlabo=$idASupprimer";
				if(isset($_POST['ordreSuprression'])){
					$commande = mysqli_query($loginBDD, $requete);
					echo "<br>Suppression labo avec id $idASupprimer OK<br><br>";
				}
				?>
	</form>
</body>
</html>