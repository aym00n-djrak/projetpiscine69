<?php 
include "connexionBDD.php";
echo "page suppression compte bancaire <br>";
if($BDDTrouvee){
	echo "BDD existe";
    $idclient = 1;
	$liste_id_comptes = array();
	$requeteAffichage = "SELECT * FROM comptebancaire where comptebancaire.idclient = $idclient;";
	$commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
	while($donnee = mysqli_fetch_assoc($commandeAffichage)){
		echo "id compte pour le client $idclient:"  . $donnee['idCompte'] . '<br>';
		array_push($liste_id_comptes, $donnee['idCompte']);
	}
	print_r($liste_id_comptes);
	$taileListeIdcomptes = count($liste_id_comptes);
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
        $(document).ready(function () {
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
                <li class="nav-item"><a class="nav-link" href="RendezVous.php">Rendez-vous</a></li>
                <li class="nav-item"><a class="nav-link" href="Compte.html">Votre compte</a></li>
            </ul>
        </div>
    </nav>

 <form action="http://localhost/projetpiscine69/fonctionnalitesClient.html" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>
    <form method = "POST">

    		<br /> VEUILLEZ CHOISIR L'ID DE VOTRE COMPTE A SUPPRIMER: <select class="compteASupprimer">
			<option>choisir...</option>
				<script>
					<?php $count = 0;?>
					let taille = <?php echo $taileListeIdcomptes;?>;
					for(let parcours = 0; parcours<taille; ++parcours){
						$(".compteASupprimer").append("<option value= <?php echo $liste_id_comptes[$count];?>>Id <?php echo $liste_id_comptes[$count];?></option>");

						<?php $count++;?>
					}
				</script>
			</select>

			<br>Option alternative: saisir l'id de votre compte � supprimer: <input type="text" name="idSupTextField">
				<input type="submit" name="ordreSuprression" value="Supprimer ce laboratoire" /><br>
				
				<?php 
				//$idASupprimer = isset($_POST['compteASupprimer']) ? $_POST['compteASupprimer'] : 0;
				$idASupprimer = isset($_POST['idSupTextField']) ? $_POST['idSupTextField'] : 0;
				$requete = "DELETE FROM `comptebancaire` WHERE idcompte=$idASupprimer";
				if(isset($_POST['ordreSuprression'])){
					$commande = mysqli_query($loginBDD, $requete);
					echo "<br>Suppression compte avec id $idASupprimer du client $idclient OK<br><br>";
				}
				?>
    </form>

    <footer class="page-footer">

        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-20">

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7008.822583384912!2d2.2823564991389347!3d48.851686907281966!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris%20Lyon!5e0!3m2!1sfr!2sfr!4v1653309618172!5m2!1sfr!2sfr"
                        width="100%" height="100%" style="border:0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

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