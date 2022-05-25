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
                <li class="nav-item"><a class="nav-link" href="RendezVous.html">Rendez-vous</a></li>
                <li class="nav-item"><a class="nav-link" href="Compte.html">Votre compte</a></li>
            </ul>
        </div>
    </nav>
    <form action="http://localhost/projetpiscine69/compteClient.php" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>
    
    <form method = "POST">
    		<br />VEUILLEZ SAISIR VOS INFORMATIONS CLIENT<br />
		Nom: <input type="text" name="nomClient" /> <br />
		Prenom: <input type="text" name="prenomClient" /> <br />
		Courriel: <input type="email" name="courrielClient" /> <br />
        Mot de passe: <input type="password" name="mdpClient" /> <br />
        Adresse: <input type="text" name="adresseClient" /> <br />
		Telephone: <input type="number" name="telClient" /> <br />
        Ville: <input type="text" name="villeClient" /> <br />
		Code postal: <input type="number" name="codePostalClient" /> <br />
		Pays: <input type="text" name="paysClient" /> <br />
        N° de carte Vitale: <input type="number" name="carteVitaleClient" /> <br />
		<input type="submit" name="ordreAjout" value="Creer compte" />
    <?php 
include "connexionBDD.php";
echo "page inscription client <br>";

$idAdminActuel = 1;



if($BDDTrouvee){
	echo "BDD existe<br>";

    if(isset($_POST['ordreAjout'])){
    $nom = isset($_POST['nomClient']) ? $_POST['nomClient'] : "0";
$prenom = isset($_POST['prenomClient']) ? $_POST['prenomClient'] : "0";
$courriel = isset($_POST['courrielClient']) ? $_POST['courrielClient'] : "0";
$mdp = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : "0";
$adresse = isset($_POST['adresseClient']) ? $_POST['adresseClient'] : "0";
$tel = isset($_POST['telClient']) ? $_POST['telClient'] : "0";
$ville = isset($_POST['villeClient']) ? $_POST['villeClient'] : "0";
$codepostal = isset($_POST['codePostalClient']) ? $_POST['codePostalClient'] : "0";
$pays = isset($_POST['paysClient']) ? $_POST['paysClient'] : "0";
$nCarteVitale = isset($_POST['carteVitaleClient']) ? $_POST['carteVitaleClient'] : "0";
	$requete = "INSERT INTO `hopital`.`client` (`idClient`, `nomClient`, `prenomClient`, `courrielClient`, `motDePasseClient`, `adresseClient`, `villeClient`, `codePostalClient`, `paysClient`, `telClient`, `carteVitaleClient`, `idAdmin`) VALUES (NULL, '$prenom', '$nom', '$courriel', '$mdp', '$adresse', '$ville', '$codepostal', '$pays', '$tel', '$nCarteVitale', '$idAdminActuel');";
	$commande = mysqli_query($loginBDD, $requete);
	echo "Votre compte a ete cree <br><br>";
	}
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