<?php
include "connexionBDD.php";
echo "page paiement de service <br>";
include "client.php";
$idClientActuel = $_SESSION['idClient'];

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
                <li class="nav-item"><a class="nav-link" href="RendezVous.php">Rendez-vous</a></li>
                <li class="nav-item"><a class="nav-link" href="Compte.html">Votre compte</a></li>
            </ul>
        </div>
    </nav>

    <div class="container features">

        <p class="Titre-Section">Acheter un service</p>
        <form action="http://localhost/projetpiscine69/fonctionnalitesClient.php" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>
        <form method="POST">
            <table>
                <tr>
                    <td>
                        Saisir id du service:
                    </td>
                    <td>
                        <input name="idserviceSaisi" type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Saisir id du labo associe a ce service:
                    </td>
                    <td>
                        <input name="idlaboAssocie" type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        Saisir id de votre compte bancaire avec lequel vous payez:
                    </td>
                    <td>
                        <input name="idcomptePaiement" type="text">
                    </td>
                </tr>
            </table>



            <input type="submit" name="ordrepaiement" value="Payer" />
            <?php
            if ($BDDTrouvee) {

                if ($BDDTrouvee) {
                    $requeteAffichage = "SELECT * FROM servicelabo";
                    $commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
                    while ($donnee = mysqli_fetch_assoc($commandeAffichage)) {
                        echo "<b>Service</b> " . $donnee['nomServiceLabo'] . " avec <b>id</b> " . $donnee['idServiceLabo'] . " et <b>id labo associe</b> " . $donnee['idLabo'] . "<br>";
                    }
                    echo "<br>= = = = =<br>";
                    $requeteAffichage = "SELECT * from comptebancaire where idclient=$idClientActuel";
                    $commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
                    while ($donnee = mysqli_fetch_assoc($commandeAffichage)) {
                        echo "<b>Compte</b> avec <b>id</b> " . $donnee['idCompte'] . " de <b>numero de carte</b>  " . $donnee['numCarteCompte'] . '<br>';
                    }
                }
                if (isset($_POST['ordrepaiement'])) {
                    $idlabo = isset($_POST['idlaboAssocie']) ? $_POST['idlaboAssocie'] : "0";
                    $idcompte = isset($_POST['idcomptePaiement']) ? $_POST['idcomptePaiement'] : "0";
                    $idservice = isset($_POST['idserviceSaisi']) ? $_POST['idserviceSaisi'] : "0";
                    $requete = "INSERT INTO `hopital`.`paiement` (`idLabo`, `idCompte`, `idServiceLabo`) VALUES ('$idlabo', '$idcompte', '$idservice');";
                    $commande = mysqli_query($loginBDD, $requete);
                    echo "Paiement du service avec id $idservice du labo $idlabo avec le compte $idcompte OK<br><br>";
                }
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