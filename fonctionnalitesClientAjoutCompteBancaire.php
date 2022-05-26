  <?php 
include "connexionBDD.php";
echo "page ajout compte bancaire <br>";
include "client.php";
$idClientActuel = $_SESSION['idClient'];

$nomCarte = isset($_POST['nomCarte']) ? $_POST['nomCarte'] : "0";
$numeroCarte = isset($_POST['numCarte']) ? $_POST['numCarte'] : "0";
$typeCarte = isset($_POST['typeCarte']) ? $_POST['typeCarte'] : "0";
$dateExpiration = isset($_POST['dateExpirationCarte']) ? $_POST['dateExpirationCarte'] : "0";
$codeSecuCarte = isset($_POST['codeSecuriteCarte']) ? $_POST['codeSecuriteCarte'] : "0";
if($BDDTrouvee){
	echo "BDD existe<br>";

	$requete = "INSERT INTO hopital.comptebancaire (idCompte, typeCarteCompte, numCarteCompte, nomCarteCompte, dateExpirationCarteCompte, codeSecuriteCarteCompte, idClient) VALUES (NULL, '$typeCarte', '$numeroCarte', '$nomCarte', '$dateExpiration', '$codeSecuCarte', '$idClientActuel');";	$commande = mysqli_query($loginBDD, $requete);
	echo "Ajout compte bancaire pour client avec id $idClientActuel OK<br><br>";
}
?>
