<?php
include "connexionBDD.php";
echo "page connexion médecin
<br>";
if($BDDTrouvee){
	echo "BDD existe";
}
?>

<!DOCTYPE html>
<html lang="fr">

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
                <li class="nav-item"><a class="nav-link" href="RendezVous.html">Rendez-vous</a></li>
                <li class="nav-item"><a class="nav-link" href="Compte.html">Votre compte</a></li>
            </ul>
        </div>
    </nav>
    <form class="formulaireLoginMedecin" method="POST">
    <div class="container features">
        <p class="Titre-Section">Connexion</p>
        <table>
            <tr>
                <!--Nom-->
                <td>Nom </td>
                <td><input type="text" name="nomMedecin" /></td>
            </tr>
            <tr>
                <!--Prénom-->
                <td>Prénom </td>
                <td><input type="text" name="prenomMedecin" /></td>
            </tr>
            <tr>
                <!--Courriel-->
                <td>Email </td>
                <td><input type="email" name="courrielMedecin" /></td>
            </tr>
            <tr>
                <!--Bouton de validation-->
                <td colspan="2" align="center">
                    <input type="submit" name="loginEspaceMedecin" value="Se connecter" text-align="center"/>
                </td>
            </tr>
        </table>
    </div>
    <?php
if(isset($_POST['loginEspaceMedecin'])){
	$nom = isset($_POST['nomMedecin']) ? $_POST['nomMedecin'] : " "; 
	$prenom = isset($_POST['prenomMedecin']) ? $_POST['prenomMedecin'] : " "; 
	$courriel = isset($_POST['courrielMedecin']) ? $_POST['courrielMedecin'] : " "; 

	$requete = "SELECT * FROM `medecin` where(nommedecin = '$nom' and prenommedecin = '$prenom' and courrielmedecin = '$courriel');";
	$commande = mysqli_query($loginBDD, $requete);
	$resultat = "on sait pas encore"; $donnee = mysqli_fetch_assoc($commande);
	if($donnee['idAdmin']!=null){$resultat="Connexion réussie";} else{$resultat="Aucun médecin trouvé";}
	echo "<br>Resultat identification: $resultat<br><br>";
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