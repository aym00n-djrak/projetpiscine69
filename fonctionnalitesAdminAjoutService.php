<?php 
include "connexionBDD.php";
echo "page associaton d'un service à un laboratoire <br>";
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
		<br />VEUILLEZ CHOISIR LE SERVICE A AJOUTER: <select name="serviceAAjotuer">
				<option>choisir...</option>
				<option value="biologie-preventive">Biologie préventive</option>
				<option value="depistage-covid">Dépistage covid19</option>
				<option value="cancerologie">Cancérologie</option>
				<option value="biologie-de-la-femme-enceinte">Biologie de la femme enceinte</option>
				<option value="biologie-de-routine">Biologie de routine</option>
				<option value="gynecologie">Gynécologie</option>
			</select>
				<br />VEUILLEZ CHOISIR LE LABORATOIRE AUQUEL SERA ASSOCIE CE SERVICE: <select name="laboAAssocier">
				<option>choisir...</option>
				<option value=1>Salle1 Tel1</option>
				<option value=2>Salle2 Tel2</option>
			</select>
			<br>Option alternative: saisir l'id du laboratoire auquel sera associé ce service: <input type="text" name="idModifTextField">
		<input type="submit" name="ordreAjoutServiceAssocie" value="Ajouter ce service à ce laboratoire" />
		
			<?php 	
			if(isset($_POST['ordreAjoutServiceAssocie'])){
				$nomService = isset($_POST['serviceAAjotuer']) ? $_POST['serviceAAjotuer'] : " ";
				$tarifService = 0;
				switch($nomService){
					case "biologie-preventive":
					$tarifService = 455.30;
					break;
					case "depistage-covid":
					$tarifService = 30.15;
					break;					
					case "cancerologie":
					$tarifService = 890.46;
					break;					
					case "biologie-de-la-femme-enceinte":
					$tarifService = 128.50;
					break;					
					case "biologie-de-routine":
					$tarifService = 59.67;
					break;					
					case "gynecologie":
					$tarifService = 15.60;
					break;
				}
				$idLaboAAssocier = isset($_POST['idModifTextField']) ? $_POST['idModifTextField'] : 0;
				$requete = "INSERT INTO `hopital`.`servicelabo` (`idServiceLabo`, `nomServiceLabo`, `tarifServiceLabo`, `idLabo`) VALUES (NULL, '$nomService', '$tarifService', '$idLaboAAssocier');";
				echo "requete formulée $requete";
				$commande = mysqli_query($loginBDD, $requete);
				echo "<br>Association du service $nomService au labo $idLaboAAssocier OK<br><br>";
			}
			?>		
		</form>
</body>
</html>