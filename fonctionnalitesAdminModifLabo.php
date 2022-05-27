<?php
include "connexionBDD.php";

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

   <form action="http://localhost/projetpiscine69/fonctionnalitesAdmin.html" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>
        <form method="POST">
            <br />VEUILLEZ CHOISIR LE LABORATOIRE A MODIFIER: <select name="laboAModifier">
                <option>choisir...</option>
                <option value=1>Salle1 Tel1</option>
                <option value=2>Salle2 Tel2</option>
            </select>
            <br>Option alternative: saisir l'id du laboratoire e modifier: <input type="text" name="idModifTextField">
            <br /><br />VEUILLEZ SAISIR LES INFORMATIONS A MODIFIER<br />
            <br />
            Salle: <input type="text" name="salleLabo" /> <br />
            Courriel: <input type="email" name="courrielLabo" /> <br />
            Telephone: <input type="number" name="telLabo" /> <br />
            <input type="submit" name="ordreModifLabo" value="Modifier ce laboratoire" />

            <?php
            	$requeteAffichage = "SELECT * FROM labo";
	$commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
    echo'<br><br>';
	while($donnee = mysqli_fetch_assoc($commandeAffichage)){
	echo "<br><b>idLabo</b>: " . $donnee['idLabo'] . " <b>TelLabo</b>: " . $donnee['telLabo'] . "<b> CourrielLabo</b>: " . $donnee['courrielLabo'];
	}
            if (isset($_POST['ordreModifLabo'])) {
                //$idAdminActuel = 1;
                $salle = isset($_POST['salleLabo']) ? $_POST['salleLabo'] : " ";
                $tel = isset($_POST['telLabo']) ? $_POST['telLabo'] : 0;
                $courriel = isset($_POST['courrielLabo']) ? $_POST['courrielLabo'] : " ";
                $idAModifier = isset($_POST['idModifTextField']) ? $_POST['idModifTextField'] : 0;
                $requete = "UPDATE `hopital`.`labo` SET `salleLabo` = '$salle', `telLabo` = '$tel', `courrielLabo` = '$courriel' WHERE `labo`.`idlabo` = $idAModifier;";
                $commande = mysqli_query($loginBDD, $requete);
                echo "<br>Modification laboratoire avec id $idAModifier OK<br><br>";
            }

            ?>
        </form>
        <div class="container features">

            <p class="Titre-Section">VEUILLEZ CHOISIR LE LABORATOIRE A MODIFIER :</p>
            <form action="http://localhost/projetpiscine69/fonctionnalitesAdmin.html" name="boutonRetourForm">
                <input type="submit" class="boutonRetour" value="Retour" /> <br />
            </form>

            <form method="POST">
                <table>
                    <tr>
                        <td>
                            Selection du labo
                        </td>
                        <td>
                            <select name="laboAModifier">
                                <option>choisir...</option>
                                <option value=1>Salle1 Tel1</option>
                                <option value=2>Salle2 Tel2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Option alternative: saisir l'id du laboratoire a modifier:
                        </td>
                        <td>
                            <input type="text" name="idModifTextField">
                        </td>
                    </tr>
                </table>



                <p class="feature-title">VEUILLEZ SAISIR LES INFORMATIONS A MODIFIER :</p>
                <table>
                    <tr>
                        <td>
                            Salle:
                        </td>
                        <td>
                            <input type="text" name="salleLabo" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Courriel:
                        </td>
                        <td>
                            <input type="email" name="courrielLabo" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Telephone:
                        </td>
                        <td>
                            <input type="number" name="telLabo" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" class="submitform" name="ordreModifLabo" value="Modifier ce laboratoire" />
                        </td>
                    </tr>
                </table>

                <?php
                if (isset($_POST['ordreModifLabo'])) {
                    //$idAdminActuel = 1;
                    $salle = isset($_POST['salleLabo']) ? $_POST['salleLabo'] : " ";
                    $tel = isset($_POST['telLabo']) ? $_POST['telLabo'] : 0;
                    $courriel = isset($_POST['courrielLabo']) ? $_POST['courrielLabo'] : " ";
                    $idAModifier = isset($_POST['idModifTextField']) ? $_POST['idModifTextField'] : 0;
                    $requete = "UPDATE `hopital`.`labo` SET `salleLabo` = '$salle', `telLabo` = '$tel', `courrielLabo` = '$courriel' WHERE `labo`.`idlabo` = $idAModifier;";
                    echo "requete formulee $requete";
                    $commande = mysqli_query($loginBDD, $requete);
                    echo "<br>Modification laboratoire avec id $idAModifier OK<br><br>";
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