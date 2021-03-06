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

 <form action="http://localhost/projetpiscine69/fonctionnalitesClient.php" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>
    <form method = "POST">

				
				<?php 

                include "connexionBDD.php";

echo "page ajout compte bancaire <br>";
include "client.php";
$idClientActuel = $_SESSION['idClient']; //on recupere l'id du client connecte dont on a besoin pour renseigner la requete sql d'ajout de compte bancaire

$nomCarte = isset($_POST['nomCarte']) ? $_POST['nomCarte'] : "0";
$numeroCarte = isset($_POST['numCarte']) ? $_POST['numCarte'] : "0";
$typeCarte = isset($_POST['typeCarte']) ? $_POST['typeCarte'] : "0";
$dateExpiration = isset($_POST['dateExpirationCarte']) ? $_POST['dateExpirationCarte'] : "0";
$codeSecuCarte = isset($_POST['codeSecuriteCarte']) ? $_POST['codeSecuriteCarte'] : "0";
if($BDDTrouvee){
	//echo "BDD existe<br>";
    
	$requete = "INSERT INTO hopital.comptebancaire (idCompte, typeCarteCompte, numCarteCompte, nomCarteCompte, dateExpirationCarteCompte, codeSecuriteCarteCompte, idClient) VALUES (NULL, '$typeCarte', '$numeroCarte', '$nomCarte', '$dateExpiration', '$codeSecuCarte', '$idClientActuel');";	$commande = mysqli_query($loginBDD, $requete);
	echo "Ajout compte bancaire pour client avec id $idClientActuel OK<br><br>";
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