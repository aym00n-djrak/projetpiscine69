<?php 
include "connexionBDD.php";
echo "page suppression d'un service d'un laboratoire <br>";
if($BDDTrouvee){
	echo "BDD existe";

	$liste_id_servicesAssocieAUnLabo = array();
	$requeteAffichage = "SELECT * FROM servicelabo";
	$commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
	while($donnee = mysqli_fetch_assoc($commandeAffichage)){
		echo "idServiceAssocieAUnLabo: " . $donnee['idServiceLabo'] . '<br>';
		array_push($liste_id_servicesAssocieAUnLabo, $donnee['idServiceLabo']);
	}
	print_r($liste_id_servicesAssocieAUnLabo);
	$tailleListeIdServicesAssociesADesLabos = count($liste_id_servicesAssocieAUnLabo);
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
		<br /> VEUILLEZ CHOISIR LE SERVICE ASSOCIE A UN LABO QUE VOUS VOULEZ SUPPRIMER: <select class="serviceDUnlaboASupprimer">
			<option>choisir...</option>
				<script>
					<?php $count = 0;?>
					let taille = <?php echo $tailleListeIdServicesAssociesADesLabos;?>;
					for(let parcours = 0; parcours<taille; ++parcours){
						$(".serviceDUnlaboASupprimer").append("<option value= <?php echo $liste_id_servicesAssocieAUnLabo[$count];?>>Id <?php echo $liste_id_servicesAssocieAUnLabo[$count];?></option>");
						<?php $count++;?>
					}
				</script>
			</select>
			<br>Option alternative: saisir l'id du service associé à un laboratoire que vous voulez supprimer: <input type="text" name="idSupTextField">
				<input type="submit" name="ordreSuprression" value="Supprimer ce service associé" /><br>
				
				<?php 
				//$idASupprimer = isset($_POST['serviceDUnlaboASupprimer']) ? $_POST['serviceDUnlaboASupprimer'] : 0;
				$idASupprimer = isset($_POST['idSupTextField']) ? $_POST['idSupTextField'] : 0;
				$requete = "DELETE FROM `serviceLabo` WHERE idServiceLabo=$idASupprimer";
				if(isset($_POST['ordreSuprression'])){
					$commande = mysqli_query($loginBDD, $requete);
					echo "<br>Suppression de ce service du labo avec idservice $idASupprimer OK<br><br>";
				}
				?>
	</form>
</body>
</html>