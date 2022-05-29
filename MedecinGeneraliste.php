<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Accueil.css">
    <script type="text/javascript">
        $(document).ready(function() {
            $('.header').height($(window).height());
        });
    </script>
</head>

<body>

    <?php
    include "phpdoc/loaddoc.php";
    include "phplab/loadlab.php";
    ?>

    <header class="header ">
        <div class="logo">
            <img src="logo.png">
            <h1>Omnes Sante</h1>
        </div>
    </header>

    <nav class="navbar navbar-expand-md">
        <div class="collapse navbar-collapse">
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
        <p class="Titre-Section">Medecins generalistes</p>
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <form class="choisirDoc" method="post" action="MedecinGeneralistechoisi.php">
                    <table>
                        <tr>
                            <td>
                                <p class="feature-title">Liste des medecins</p>
                                <p>
                                    <?php for ($i = 0; $i < COUNT($tabdoc); $i++) { ?>
                                        <input type="radio" id="<?php echo $tabiddoc[$i]; ?>" name="doc" value="<?php echo $i; ?>" onClick="choix(this.id)"> <?php echo $tabdoc[$i] . "<br>"; ?></input>
                                    <?php } ?>

                                </p>
                            </td>
                            <td>
                                <p class="feature-title">Liste des laboratoires par salle</p>

                                <p>
                                    <?php for ($i = 0; $i < COUNT($tabsalle); $i++) { ?>
                                        <input type="radio" id="<?php echo $tabidlab[$i]; ?>" name="lab" value="<?php echo $i; ?>" onClick="choix(this.id)"> <?php echo $tabsalle[$i] . "<br>"; ?></input>
                                    <?php } ?>

                                </p>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="button" value="Choisir" text-align="center" />
                </form>
            </div>

        </div>

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