<!DOCTYPE html>
<html>
		<!-- le nouveau client peut s'inscrire sur la base de donnees via cette page en saisissant toutes ses informations -->

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
                <li class="nav-item"><a class="nav-link" href="RendezVous.php">Rendez-vous</a></li>
                <li class="nav-item"><a class="nav-link" href="Compte.html">Votre compte</a></li>
            </ul>
        </div>
    </nav>
    <form action="http://localhost/projetpiscine69/compteClient.php" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>

    <form method="POST">
        <br />VEUILLEZ SAISIR VOS INFORMATIONS CLIENT<br />
        <table>
            <tr>
                <!--Nom-->
                <td>Nom</td>
                <td><input type="text" name="nomClient" /></td>
                <!--Prenom-->
                <td>Prenom</td>
                <td><input type="text" name="prenomClient" /></td>
                <!--Adresse-->
                <td>Adresse</td>
                <td><input type="text" name="adresseClient" /></td>
                <!--Ville-->
                <td>Ville</td>
                <td><input type="text" name="villeClient" /></td>
            </tr>
            <tr>
                <!--Courriel-->
                <td>Courriel :</td>
                <td><input type="email" name="courrielClient" /></td>
                <!--Courriel-->
                <td>Mot de passe :</td>
                <td><input type="password" name="mdpClient" /></td>
                <!--Carte vitale-->
                <td>Carte Vitale :</td>
                <td><input type="number" name="carteVitaleClient" /></td>
                <!--Telephone-->
                <td>Telephone :</td>
                <td><input type="number" name="telClient" /></td>
            </tr>
            <tr>
                <!--Code Postal-->
                <td>Code Postal :</td>
                <td><input type="number" name="codePostalClient" /></td>
                <!--Pays-->
                <td>Pays :</td>
                <td><input type="text" name="paysClient" /></td>

                <td> <input type="submit" name="ordreAjout" value="Creer compte" />
                </td>
            </tr>
        </table>
        <?php
        include "connexionBDD.php";
        //par souci de clarte et de simplification du code, tous les clients sont ici crees par l'administrateur ayant pour l'id 1 ce qui signifie qu'il faut au moins un administrateur dans le site pour pouvoir creer un client
        $idAdminActuel = 1;
        //(pour les cas d'usages plus larges on peut imaginer de nombreux administrateurs qui creent chacun des clients)


        if ($BDDTrouvee) {

            if (isset($_POST['ordreAjout'])) {
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
                echo "Votre compte a ete cree <br><br>"; //la creation du nouveau client a abouti
            }
        }
        ?>
    </form>
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