<?php
include "connexionBDD.php";
echo "page suppression d'un service d'un laboratoire <br>";
if ($BDDTrouvee) {
    echo "BDD existe";

    $liste_id_servicesAssocieAUnLabo = array();
    $requeteAffichage = "SELECT * FROM servicelabo";
    $commandeAffichage = mysqli_query($loginBDD, $requeteAffichage);
    while ($donnee = mysqli_fetch_assoc($commandeAffichage)) {
        echo "idServiceAssocieAUnLabo: " . $donnee['idServiceLabo'] . '<br>';
        array_push($liste_id_servicesAssocieAUnLabo, $donnee['idServiceLabo']);
    }
    print_r($liste_id_servicesAssocieAUnLabo);
    $tailleListeIdServicesAssociesADesLabos = count($liste_id_servicesAssocieAUnLabo);
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

        <p class="Titre-Section">Presentation</p>
        <form action="http://localhost/projetpiscine69/fonctionnalitesAdmin.html" name="boutonRetourForm"><input type="submit" class="boutonRetour" value="Retour" /> <br /> </form>
        <form method="POST">

            <table>
                <tr>
                    <td>
                        VEUILLEZ CHOISIR LE SERVICE ASSOCIE A UN LABO QUE VOUS VOULEZ SUPPRIMER:
                    </td>
                    <td>
                        <select class="serviceDUnlaboASupprimer">
                            <option>choisir...</option>
                            <script>
                                <?php $count = 0; ?>
                                let taille = <?php echo $tailleListeIdServicesAssociesADesLabos; ?>;
                                for (let parcours = 0; parcours < taille; ++parcours) {
                                    $(".serviceDUnlaboASupprimer").append("<option value= <?php echo $liste_id_servicesAssocieAUnLabo[$count]; ?>>Id <?php echo $liste_id_servicesAssocieAUnLabo[$count]; ?></option>");
                                    <?php $count++; ?>
                                }
                            </script>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Option alternative: saisir l'id du service associe e un laboratoire que vous voulez supprimer:
                    </td>
                    <td>
                        <input type="text" name="idSupTextField">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="submitform" name="ordreSuprression" value="Supprimer ce service associe" /><br>
                    </td>
                </tr>
            </table>

            <?php
            //$idASupprimer = isset($_POST['serviceDUnlaboASupprimer']) ? $_POST['serviceDUnlaboASupprimer'] : 0;
            $idASupprimer = isset($_POST['idSupTextField']) ? $_POST['idSupTextField'] : 0;
            $requete = "DELETE FROM `serviceLabo` WHERE idServiceLabo=$idASupprimer";
            if (isset($_POST['ordreSuprression'])) {
                $commande = mysqli_query($loginBDD, $requete);
                echo "<br>Suppression de ce service du labo avec idservice $idASupprimer OK<br><br>";
            }
            ?>
        </form>
    </div>
    >>>>>>> charlesMain

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