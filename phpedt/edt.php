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
    <table>

        <div id="edt">
            <?php
            include "loaddate.php";

            //tout les creneaux réservé
            $creneau;
            $heureres;

            $idtab = array();

            $matin_soir = array("AM", "PM");

            for ($i = 0; $i < count($jour); $i++)
                array_push($matin_soir, "AM", "PM");

            $classemed = "Médicine générale";
            $Docteur = "BOUREE, Patrice";
            $medecin = array($classemed, $Docteur);


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
                    echo "<td><input type=\"button\" id=" . $jour[$j] . $heureAM[$i] . ":00 onClick=\"color(this.id)\" value=" . $heureAM[$i] . "></td>";
                    echo "<td><input type=\"button\" id=" . $jour[$j] . $heurePM[$i] . ":00 onClick=\"color(this.id)\" value=" . $heurePM[$i] . "></td>";
                }
                echo "</tr>";
            }

            echo "</tr>"; //SPECIALITE


            ?>
        </div>
    </table>
    <a href="http://localhost/projetpiscine69//MedecinGeneraliste.html">
        <input type="button" value="exit" />
    </a>

    <script type="text/javascript">
        function color() {
            var idtab = <?php echo '["' . implode('", "', $idtab) . '"]' ?>;
            var creneau = <?php echo '["' . implode('", "', $creneau) . '"]' ?>;
            var heure = <?php echo '["' . implode('", "', $heureres) . '"]' ?>;
            var creneauheure=<?php echo '["' . implode('", "', $heurecreneau) . '"]' ?>;
            console.log(idtab);
            console.log("Creneau Heure: "+creneauheure);
            for (var i = 0; i < creneauheure.length; i++) {
                for (var j = 0; j < idtab.length; j++)
                    if (idtab[j] == creneauheure[i]) {
                        document.getElementById(idtab[j]).style.background = "blue";
                    }
            }
        }
    </script>
</body>