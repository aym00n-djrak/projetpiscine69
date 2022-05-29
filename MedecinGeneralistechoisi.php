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

    if (isset($_POST['button'])) {
        $doc = $_POST["doc"] != "" ? $_POST["doc"] : "doc vide";
        $lab = $_POST["lab"] != "" ? $_POST["lab"] : "lab vide";
    }

    echo $lab;
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
                <p class="feature-title">Medecin choisi:</p>
                <p>
                    <?php echo $tabdoc[$doc]; ?>

                </p>
                <p>
                    <?php echo $tabdocprenom[$doc]; ?>
                </p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <h3 class="feature-title">Information</h3>
                <table>
                    <tr>
                        <td colspan="2">
                        </td>
                    </tr>
                    <tr>
                        <!--Bureau-->
                        <td>Bureau :</td>
                        <td> <?php echo $tabbureau[$doc]; ?>
                        </td>
                    </tr>
                    <tr>
                        <!--Telephone-->
                        <td>Telephone :</td>
                        <td> <?php echo $tabtel[$doc]; ?>
                        </td>
                    </tr>
                    <tr>
                        <!--Email-->
                        <td>Email :</td>
                        <td> <?php echo $tabmail[$doc]; ?>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <!--Emploie du temps-->
                        <td>
                            <form class="doc" method="post" action="phpedt/loadedt.php">
                                <input type="hidden" name="doc" value="<?php echo $tabiddoc[$doc]; ?>"></input>
                                <input type="hidden" name="lab" value="<?php echo $tabidlab[$lab]; ?>"></input>
                                <input type="submit" name="button" value="Emploi du temps" text-align="center" class="btngeneraliste">
                            </form>
                        </td>
                        <!--CV-->
                        <td>
                            <a href="cv.php">
                                <input type="button" name="CV" value="CV" text-align="center" class="btngeneraliste">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <!--Message texto-->
                        <td>
                            <a href="phpchat/chat.html">
                                <input type="button" name="Message texto" value="Message texto" text-align="center" class="btngeneraliste">
                            </a>
                        </td>
                        <!--Message Vocal-->
                        <td>
                            <a href="https://aym00n-djrak.github.io/videocall/#45eddd">
                                <input type="button" name="Message Vocal" value="Message Vocal" text-align="center" class="btngeneraliste">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <!--Prendre RDV-->
                        <td colspan="2" align="center">
                            <form class="doc" method="post" action="phprdvbdd/loaddateadd.php">
                                <input type="hidden" name="doc" value="<?php echo $tabiddoc[$doc]; ?>"></input>
                                <input type="hidden" name="lab" value="<?php echo $tabidlab[$lab]; ?>"></input>
                                <input type="submit" name="button" value="Prendre un RDV" text-align="center" class="btngeneraliste">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <img src="<?php echo $tabimage[$doc]; ?>" class="img-fluid">
                <iframe src="<?php echo $tabvideo[$doc] ?>">
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