<?php
include "connexionBDD.php";
echo "page modification medecin <br>";
if ($BDDTrouvee) {
	echo "BDD existe<br><br>";
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Parcours</title>
	<meta charset="iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Accueil.css">
	<script type="text/javascript">
		$(document).ready(function() {
			$('.header').height($(window).height());
		});
	</script>
</head>

<body>

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
				<li class="nav-item"><a class="nav-link" href="RendezVous.html">Rendez-vous</a></li>
				<li class="nav-item"><a class="nav-link" href="Compte.html">Votre compte</a></li>
			</ul>
		</div>
	</nav>

	<div class="container features">

		<p class="Titre-Section">Bienvenue dans votre espace administrateur</p>

		<form action="http://localhost/projetpiscine69/fonctionnalitesAdmin.html" name="boutonRetourForm">
			<input type="submit" class="boutonRetour" value="Retour" />
		</form>

		<form method="POST" class="formulaireModifMedecin">

			<table>
				<tr>
					<td>
						VEUILLEZ CHOISIR LE MEDECIN A MODIFIER:
					</td>
					<td>
						<select name="medecinAModifier">
							<option>choisir...</option>
							<option value=1>Nom1 Prenom1</option>
							<option value=2>Nom2 Prenom2</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Option alternative: saisir l'id du medecin e modifier:
					</td>
					<td>
						<input type="text" name="idModifTextField">
					</td>
				</tr>
			</table>

			<p class="feature-title">VEUILLEZ SAISIR LES INFORMATIONS A MODIFIER </p>

			<table>
				<tr>
					<td>
						Nom:
					</td>
					<td>
						<input type="text" name="nomMedecin" />
					</td>
				</tr>
				<tr>
					<td>
						Prenom:
					</td>
					<td>
						<input type="text" name="prenomMedecin" />
					</td>
				</tr>
				<tr>
					<td>
						Specialite:
					</td>
					<td>
						<select name="specialite">
							<option value="">choisir...</option>
							<option value="generaliste">Medecin generaliste</option>
							<option value="addictologie">Addictologie</option>
							<option value="cardiologie">Cardiologie</option>
							<option value="dermatologie">Dermatologie</option>
							<option value="andrologie">Andrologie</option>
							<option value="gastro-hepato-enterologie">Gastro-Hepato-Enterologie</option>
							<option value="gynecologie">Gynecologie</option>
							<option value="ist">IST</option>
							<option value="osteopathie">Osteopathie</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Bureau:
					</td>
					<td>
						<input type="text" name="bureauMedecin" />
					</td>
				</tr>
				<tr>
					<td>
						Courriel:
					</td>
					<td>
						<input type="email" name="courrielMedecin" />
					</td>
				</tr>
				<tr>
					<td>
						Telephone:
					</td>
					<td>
						<input type="number" name="telMedecin" />
					</td>
				</tr>
				<tr>
					<td>
						Formation CV (50 caracteres maximum):
					</td>
					<td>
						<textarea maxlength="50" name="formationsCVMedecin"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						Experiences CV (50 caracteres maximum):
					</td>
					<td>
						<textarea maxlength="50" name="experiencesCVMedecin"></textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="ordreModification" value="Modifier ce medecin" />
					</td>
				</tr>
			</table>



			<?php
			if (isset($_POST['ordreModification'])) {
				//$idAdminActuel = 1;
				$nom = isset($_POST['nomMedecin']) ? $_POST['nomMedecin'] : " ";
				$prenom = isset($_POST['prenomMedecin']) ? $_POST['prenomMedecin'] : " ";
				$specialite = isset($_POST['specialite']) ? $_POST['specialite'] : " ";
				$bureau = isset($_POST['bureauMedecin']) ? $_POST['bureauMedecin'] : " ";
				$tel = isset($_POST['telMedecin']) ? $_POST['telMedecin'] : 0;
				$courriel = isset($_POST['courrielMedecin']) ? $_POST['courrielMedecin'] : " ";
				$formations = isset($_POST['formationsCVMedecin']) ? $_POST['formationsCVMedecin'] : " ";
				$experiences = isset($_POST['experiencesCVMedecin']) ? $_POST['experiencesCVMedecin'] : " ";
				$idAModifier = isset($_POST['idModifTextField']) ? $_POST['idModifTextField'] : 0;
				$requete = "UPDATE `hopital`.`medecin` SET `nomMedecin` = '$nom', `prenomMedecin` = '$prenom', `specialiteMedecin` = '$specialite', `bureauMedecin` = '$bureau', `telMedecin` = '$tel', `courrielMedecin` = '$courriel', `formationCV` = '$formations', `experiencesCV` = '$experiences' WHERE `medecin`.`idMedecin` = $idAModifier;";
				$commande = mysqli_query($loginBDD, $requete);
				echo "<br>Modification medecin avec id $idAModifier OK<br><br>";
			}
			?>
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