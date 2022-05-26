<?php session_start();?>
<html>

<head>
    <title>Omnes Santé</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/projetpiscine69//Accueil.css">
    <style type="text/css">
        caption {
            font-family: 'Courier New', Courier, monospace;
            font-size: 2px;
            color: red;
            margin-bottom: auto;
        }

        table {
            margin: auto;
            border: 2px solid black;
        }

        th {
            margin: auto;
            border: 1px solid red;
        }

        tr {
            margin: auto;
            border: 1px solid blue;
        }

        td {
            margin: auto;
            border: 1px solid orange;
        }
    </style>

</head>

<body onload="color()">
    <form class="ajoutRDV" method="POST" action="addrdv.php">
        <table>
            <div id="edt">

                <?php
                //CLIENT

                $idClient = $_SESSION['idClient'];
                echo "Le client est :".$idClient;

                //MEDECIN
                $idMedecin = $iddoc;

                $Docteur = $nomDocteur . ", " . $prenomDocteur;
                $medecin = array($classemed, $Docteur);
                ?>

                <input type="hidden" name="creneauheure" id="creneauheure" />
                <input type="hidden" name="heure" id="heure" />
                <input type="hidden" name="idMedecin" value="<?php echo $idMedecin; ?>"></input>
                <input type="hidden" name="idLabo" value="<?php echo $idlab; ?>"></input>
                <input type="hidden" name="idClient" value="<?php echo $idClient; ?>"></input>


                <?php
                //tout les creneaux réservé
                $creneau;
                $heureres;

                $idtab = array();

                $matin_soir = array("AM", "PM");

                for ($i = 0; $i < count($jour); $i++)
                    array_push($matin_soir, "AM", "PM");

                $heureAM = array("08:00", "08:20", "08:40", "09:00", "09:20", "09:40", "10:00", "10:20", "10:40", "11:00", "11:20", "11:40", "12:00");
                $heurePM = array("14:00", "14:20", "14:40", "15:00", "16:20", "16:40", "17:00", "17:20", "18:40", "19:00", "19:20", "19:40", "20:00");

                echo "<tr><th>Spécialité</th>";
                echo "<th>Médecin</th>";

                for ($i = 0; $i < count($jour); $i++) {
                    echo "<th colspan=\"2\">" . $jour[$i] . "</th>";
                }

                echo "<tr>"; //CELUI DE MEDECIN

                echo "<tr>";    //CELUI DE MATINSOIR

                for ($j = 0; $j < count($medecin); $j++)
                    echo "<th rowspan=\"30\">" . $medecin[$j] . "</th>";

                for ($j = 2; $j < count($matin_soir); $j++) {
                    echo "<td >" . $matin_soir[$j] . "</td>";
                }
                echo "</tr>"; //MATINSOIR
                echo "</tr>"; //MED

                for ($i = 0; $i < count($heureAM); $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < count($jour); $j++) {
                        array_push($idtab, $jour[$j] . $heureAM[$i] . ":00", $jour[$j] . $heurePM[$i] . ":00");
                        echo "<td><input type=\"button\" id=" . $jour[$j] . $heureAM[$i] . ":00 onClick=\"book(this.id)\" value=" . $heureAM[$i] . "></td>";
                        echo "<td><input type=\"button\" id=" . $jour[$j] . $heurePM[$i] . ":00 onClick=\"book(this.id)\" value=" . $heurePM[$i] . "></td>";
                    }
                    echo "</tr>";
                }

                echo "</tr>"; //SPECIALITE


                ?>

                <a href="http://localhost/projetpiscine69//MedecinGeneraliste.php">
                    <input type="button" value="exit" />
                </a>

                <script type="text/javascript">
                    var compteur = 1;
                    var valeur;
                    var heuredate;

                    function color() {
                        var idtab = <?php echo '["' . implode('", "', $idtab) . '"]' ?>;

                        var creneau = <?php echo '["' . implode('", "', $creneau) . '"]' ?>;
                        var heure = <?php echo '["' . implode('", "', $heureres) . '"]' ?>;
                        var creneauheure = <?php echo '["' . implode('", "', $heurecreneau) . '"]' ?>;

                        console.log(creneauheure);

                        for (var i = 0; i < creneauheure.length; i++) {
                            for (var j = 0; j < idtab.length; j++)
                                if (idtab[j] == creneauheure[i]) {
                                    document.getElementById(idtab[j]).style.background = "blue";
                                }
                        }
                    }

                    function book(click) {
                        if (compteur == 1) {
                            valeur = document.getElementById(click).value;
                            var creneauheure = <?php echo '["' . implode('", "', $heurecreneau) . '"]' ?>;
                            for (var i = 0; i < creneauheure.length; i++) {
                                if (click == creneauheure[i]) {
                                    alert("L'heure choisie ne peut pas etre prise en RDV !");
                                } else {
                                    document.getElementById(click).style.background = "grey";
                                    compteur = 0;

                                    document.getElementById("creneauheure").value = click;
                                    document.getElementById("heure").value = valeur;
                                }
                            }
                        } else {
                            alert("Vous avez déjà choisi votre rendez-vous.")
                        }

                    }
                </script>

                <input type="submit" name="button" value="Enregister le RDV" text-align="center" />
            </div>
        </table>
    </form>

</body>