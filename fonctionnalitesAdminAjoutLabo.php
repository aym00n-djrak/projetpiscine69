  <?php 
include "connexionBDD.php";
echo "page ajout laboratoire <br>";

$idAdminActuel = 1;

$salle = isset($_POST['salleLabo']) ? $_POST['salleLabo'] : "0";
$tel = isset($_POST['telLabo']) ? $_POST['telLabo'] : "0";
$courriel = isset($_POST['courrielLabo']) ? $_POST['courrielLabo'] : "0";
if($BDDTrouvee){
	echo "BDD existe<br>";

	$requete = "INSERT INTO `hopital`.`labo` (`idLabo`, `salleLabo`, `telLabo`, `courrielLabo`, `idAdmin`) VALUES (NULL, '$salle', '$tel', '$courriel', '$idAdminActuel');";
	$commande = mysqli_query($loginBDD, $requete);
	echo "Ajout labo OK<br><br>";

	$requeteAffichage = "SELECT * FROM labo";
	$commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
	while($donnee = mysqli_fetch_assoc($commandeAffichage)){
	echo "idLabo: " . $donnee['idLabo'] . '<br>';
	echo "telLabo: " . $donnee['telLabo'] . '<br>';
	echo "courrielLabo: " . $donnee['courrielLabo'] . '<br>';
	}
}
