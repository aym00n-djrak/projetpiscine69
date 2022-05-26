<?php
include "connexionBDD.php";
echo "page associaton d'un service e un laboratoire <br>";
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
                <li class="nav-item"><a class="nav-link" href="RendezVous.php">Rendez-vous</a></li>
                <li class="nav-item"><a class="nav-link" href="Compte.html">Votre compte</a></li>
            </ul>
        </div>
    </nav>

    <<<<<<< HEAD <form action="http://localhost/projetpiscine69/fonctionnalitesAdmin.html" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>
        <form method="POST">
            <br />VEUILLEZ CHOISIR LE SERVICE A AJOUTER: <select name="serviceAAjotuer">
                <option>choisir...</option>
                <option value="biologie-preventive">Biologie preventive</option>
                <option value="depistage-covid">Depistage covid19</option>
                <option value="cancerologie">Cancerologie</option>
                <option value="biologie-de-la-femme-enceinte">Biologie de la femme enceinte</option>
                <option value="biologie-de-routine">Biologie de routine</option>
                <option value="gynecologie">Gynecologie</option>
            </select>
            <br />VEUILLEZ CHOISIR LE LABORATOIRE AUQUEL SERA ASSOCIE CE SERVICE: <select name="laboAAssocier">
                <option>choisir...</option>
                <option value=1>Salle1 Tel1</option>
                <option value=2>Salle2 Tel2</option>
            </select>
            <br>Option alternative: saisir l'id du laboratoire auquel sera associe ce service: <input type="text" name="idModifTextField">
            <input type="submit" name="ordreAjoutServiceAssocie" value="Ajouter ce service e ce laboratoire" />

            <?php
            if (isset($_POST['ordreAjoutServiceAssocie'])) {
                $nomService = isset($_POST['serviceAAjotuer']) ? $_POST['serviceAAjotuer'] : " ";
                $tarifService = 0;
                switch ($nomService) {
                    case "biologie-preventive":
                        $tarifService = 455.30;
                        break;
                    case "depistage-covid":
                        $tarifService = 30.15;
                        break;
                    case "cancerologie":
                        $tarifService = 890.46;
                        break;
                    case "biologie-de-la-femme-enceinte":
                        $tarifService = 128.50;
                        break;
                    case "biologie-de-routine":
                        $tarifService = 59.67;
                        break;
                    case "gynecologie":
                        $tarifService = 15.60;
                        break;
                }
                $idLaboAAssocier = isset($_POST['idModifTextField']) ? $_POST['idModifTextField'] : 0;
                $requete = "INSERT INTO `hopital`.`servicelabo` (`idServiceLabo`, `nomServiceLabo`, `tarifServiceLabo`, `idLabo`) VALUES (NULL, '$nomService', '$tarifService', '$idLaboAAssocier');";
                $commande = mysqli_query($loginBDD, $requete);
                echo "<br>Association du service $nomService au labo $idLaboAAssocier OK<br><br>";
            }
            ?>
        </form>
        =======
        <div class="container features">

            <p class="Titre-Section">Presentation</p>
            <form action="http://localhost/projetpiscine69/fonctionnalitesAdmin.html" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>
            <form method="POST">
                <table>
                    <tr>
                        <td>
                            VEUILLEZ CHOISIR LE SERVICE A AJOUTER:
                        </td>
                        <td>
                            <select name="serviceAAjotuer">
                                <option>choisir...</option>
                                <option value="biologie-preventive">Biologie preventive</option>
                                <option value="depistage-covid">Depistage covid19</option>
                                <option value="cancerologie">Cancerologie</option>
                                <option value="biologie-de-la-femme-enceinte">Biologie de la femme enceinte</option>
                                <option value="biologie-de-routine">Biologie de routine</option>
                                <option value="gynecologie">Gynecologie</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            VEUILLEZ CHOISIR LE LABORATOIRE AUQUEL SERA ASSOCIE CE SERVICE:
                        </td>
                        <td>
                            <select name="laboAAssocier">
                                <option>choisir...</option>
                                <option value=1>Salle1 Tel1</option>
                                <option value=2>Salle2 Tel2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Option alternative: saisir l'id du laboratoire auquel sera associe ce service:
                        </td>
                        <td>
                            <input type="text" name="idModifTextField">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" class="submitform" name="ordreAjoutServiceAssocie" value="Ajouter ce service e ce laboratoire" />
                        </td>
                    </tr>
                </table>

                <?php
                if (isset($_POST['ordreAjoutServiceAssocie'])) {
                    $nomService = isset($_POST['serviceAAjotuer']) ? $_POST['serviceAAjotuer'] : " ";
                    $tarifService = 0;
                    switch ($nomService) {
                        case "biologie-preventive":
                            $tarifService = 455.30;
                            break;
                        case "depistage-covid":
                            $tarifService = 30.15;
                            break;
                        case "cancerologie":
                            $tarifService = 890.46;
                            break;
                        case "biologie-de-la-femme-enceinte":
                            $tarifService = 128.50;
                            break;
                        case "biologie-de-routine":
                            $tarifService = 59.67;
                            break;
                        case "gynecologie":
                            $tarifService = 15.60;
                            break;
                    }
                    $idLaboAAssocier = isset($_POST['idModifTextField']) ? $_POST['idModifTextField'] : 0;
                    $requete = "INSERT INTO `hopital`.`servicelabo` (`idServiceLabo`, `nomServiceLabo`, `tarifServiceLabo`, `idLabo`) VALUES (NULL, '$nomService', '$tarifService', '$idLaboAAssocier');";
                    $commande = mysqli_query($loginBDD, $requete);
                    echo "<br>Association du service $nomService au labo $idLaboAAssocier OK<br><br>";
                }
                ?>
            </form>
        </div>
        >>>>>>> charlesMain

        <footer class="page-footer">

            <div class="row">

                <div class="col-lg-8 col-md-8 col-sm-20">

                    <<<<<<< HEAD <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7008.822583384912!2d2.2823564991389347!3d48.851686907281966!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris%20Lyon!5e0!3m2!1sfr!2sfr!4v1653309618172!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        =======
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7008.822583384912!2d2.2823564991389347!3d48.851686907281966!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris%20Lyon!5e0!3m2!1sfr!2sfr!4v1653309618172!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        >>>>>>> charlesMain

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