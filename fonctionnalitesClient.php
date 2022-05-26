<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Parcours</title>
	<meta charset="iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="fonctionnalitesClient.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Accueil.css">
	<script type="text/javascript">
		$(document).ready(function() {
			$('.header').height($(window).height());
		});
	</script>
</head>

<body onload="affichageInitialBoutonsSansFormulaires()">
	<?php
	if (isset($_POST['Connexion'])) {
		$nom = isset($_POST['nomClient']) ? $_POST['nomClient'] : " ";
		$prenom = isset($_POST['prenomClient']) ? $_POST['prenomClient'] : " ";
		$mdp = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : " ";
		$codePostal = isset($_POST['codePostalClient']) ? $_POST['codePostalClient'] : " ";
		$courriel = isset($_POST['courrielClient']) ? $_POST['courrielClient'] : " ";
		$numCarteVitale = isset($_POST['numCarteVitaleClient']) ? $_POST['numCarteVitaleClient'] : " ";
		$numCarteBancaire = isset($_POST['numCarteBancaireClient']) ? $_POST['numCarteBancaireClient'] : " ";

		$requete = "SELECT * FROM `client` WHERE (`nomClient` = '$nom' AND `prenomClient` = '$prenom' AND `courrielClient` = '$courriel' AND `motDePasseClient` = '$mdp' AND `codePostalClient` = '$codePostal' AND `carteVitaleClient` = '$numCarteVitale');";
		$commande = mysqli_query($loginBDD, $requete);
		$resultat = "on sait pas encore";
		$donnee = mysqli_fetch_assoc($commande);
		if ($donnee['idClient'] != null) {
			$idClient = $donnee['idClient'];
			$resultat = "Connexion reussie";
			sleep(1);
		} else {
			$resultat = "Aucun client trouve";
		}
		echo "<br>Resultat identification: $resultat<br><br>";
	}
	?>
	<header class="header ">
		<div class="logo">
			<img src="logo.png">
			<h1>Omnes Sante</h1>
		</div>
	</header>

	<nav class="navbar navbar-expand-md">
		<div class="collapse navbar-collapse" id="main-navigation">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
				<li class="nav-item"><a class="nav-link" href="Parcours.html">Tout parcourir</a></li>
				<li class="nav-item"><a class="nav-link" href="Recherche.html">Recherche</a></li>
				<li class="nav-item"><a class="nav-link" href="RendezVous.php">Rendez-vous</a></li>
				<li class="nav-item"><a class="nav-link" href="Compte.html">Votre compte</a></li>
			</ul>
		</div>
	</nav>

	<div class="container features">
		<p class="Titre-Section">Bienvenue dans votre espace client</p>
		<table>
			<tr>
				<td>
					<form name="boutonAjout">
						<input type="button" class="btnform" value="Ajouter un compte bancaire" onclick="affichageFormulaireAjoutCompte()" />
					</form>
				</td>
			</tr>
			<tr>
				<td>
					<form action="http://localhost/projetpiscine69/fonctionnalitesClientSuppressionCompteBancaire.php" name="boutonSupprimerForm">
						<input type="submit" class="btnform" value="Supprimer un compte bancaire" />
					</form>
				</td>
			</tr>
			<tr>
				<td>
					<form action="http://localhost/projetpiscine69/fonctionnalitesClientPayer.php" name="boutonPayerForm">
						<input type="submit" class="btnform" value="Payer un service" />
					</form>
				</td>
			</tr>
		</table>

		<form class="formulaireAjoutCompte" method="POST" action="http://localhost/projetpiscine69/fonctionnalitesClientAjoutCompteBancaire.php">
			<p class="feature-title">VEUILLEZ SAISIR LES INFORMATIONS DU NOUVEAU COMPTE</p>
			<table>
				<tr>
					<td>
						Nom carte bancaire:
					</td>
					<td>
						<input type="text" name="nomCarte" />
					</td>
				</tr>
				<tr>
					<td>
						Numero carte bancaire:
					</td>
					<td>
						<input type="number" name="numCarte" />
					</td>
				</tr>
				<tr>
					<td>
						Type carte bancaire:
					</td>
					<td>
						<select name="typeCarte">
							<option value="">choisir...</option>
							<option value="mastercard">Mastercard</option>
							<option value="visa">Visa</option>
							<option value="cb">CB</option>
							<option value="american-express">American Express</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Date d'expiration:
					</td>
					<td>
						<input type="date" name="dateExpirationCarte" />
					</td>
				</tr>
				<tr>
					<td>
						Code de securite:
					</td>
					<td>
						<input type="password" name="codeSecuriteCarte" />
					</td>
				</tr>


				<tr>
					<td colspan="2" align="center">
						<input type="submit" class="submitform" name="ordreAjoutCarte" value="Ajouter ce compte" />
					</td>
				</tr>
			</table>
		</form>
	</div>

	<footer class="page-footer">

		<div class="row">

			<div class="col-lg-8 col-md-8 col-sm-20">

				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7008.822583384912!2d2.2823564991389347!3d48.851686907281966!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris%20Lyon!5e0!3m2!1sfr!2sfr!4v1653309618172!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

			</div>

			<div class="col-lg-4 col-md-4 col-sm-12">

				<h6 class="text-uppercase font-weightbold">Contact</h6>
				<p>
					37, quai de Grenelle, 75015 Paris, France <br>
					info@webDynamique.ece.fr <br>
					+33 01 02 03 04 05 <br>
				</p>

			</div>

		</div>

	</footer>

</body>

</html>