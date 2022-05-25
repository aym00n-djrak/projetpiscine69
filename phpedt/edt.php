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

    <script type="text/javascript">
        function color(clicked_id) {
            var valeur = document.getElementById(clicked_id).value;
            /* var bddvalue = '<?php echo $date; ?>'
             if (valeur == bddvalue) {
                 document.getElementById(clicked_id).style.background = "white";
                 alert("L'heure choisie ne peut pas etre prise en RDV !");
             }
             else
             {
                 document.getElementById(clicked_id).style.background = "blue";
             }
             */
            document.getElementById(clicked_id).style.background = "blue";

        }
    </script>


</head>

<body>
    <table>

        <div id="edt">
            <?php
            date_default_timezone_set('Europe/Paris');

            $today = new datetime();
            $today0 = $today->format('Y-m-d');
            $today1 = $today->modify('+1 days')->format('Y-m-d');
            $today2 = $today->modify('+1 days')->format('Y-m-d');
            $today3 = $today->modify('+1 days')->format('Y-m-d');
            $today4 = $today->modify('+1 days')->format('Y-m-d');
            $today5 = $today->modify('+1 days')->format('Y-m-d');
            $today6 = $today->modify('+1 days')->format('Y-m-d');



            //$jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
            $jour = array("$today0", "$today1", "$today2","$today3","$today4","$today5","$today6");
            $matin_soir = array("AM", "PM");

            for ($i = 0; $i < count($jour); $i++)
                array_push($matin_soir, "AM", "PM");

            $classemed = "Médicine générale";
            $Docteur = "BOUREE, Patrice";
            $medecin = array($classemed, $Docteur);


            $heureAM = array("8:00", "8:20", "8:40", "9:00", "9:20", "9:40", "10:00", "10:20", "10:40", "11:00", "11:20", "11:40", "12:00");
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

                    echo "<td><input type=\"button\" id=\"heureAM" . $i . $j . "\" onClick=\"color(this.id)\" value=" . $heureAM[$i] . "></td>";
                    echo "<td><input type=\"button\" id=\"heurePM" . $i . $j . "\" onClick=\"color(this.id)\" value=" . $heurePM[$i] . "></td>";
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
</body>