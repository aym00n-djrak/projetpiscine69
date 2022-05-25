<html>

<head>
    <title>Omnes Santé</title>
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
    function color(clicked_id){
        document.getElementById(clicked_id).style.background="blue";
    }    
    </script>


</head>

<body>
    <table>

        <?php
        $jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
        $matin_soir = array("AM", "PM");

        for($i=0;$i<count($jour);$i++)
            array_push($matin_soir,"AM","PM");

        $classemed = "Médicine générale";
        $Docteur = "BOUREE, Patrice";
        $medecin = array($classemed, $Docteur);


        $heureAM = array("8h00", "8h20", "8h40", "9h00", "9h20", "9h40", "10h00", "10h20", "10h40", "11h00", "11h20", "11h40", "12h00");
        $heurePM = array("14h00", "14h20", "14h40", "15h00", "16h20", "16h40", "17h00", "17h20", "18h40", "19h00", "19h20", "19h40", "20h00");

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

                echo "<td><input type=\"button\" id=\"heureAM".$i.$j."\" onClick=\"color(this.id)\" value=".$heureAM[$i]."></td>";
                echo "<td><input type=\"button\" id=\"heurePM".$i.$j."\" onClick=\"color(this.id)\" value=".$heurePM[$i]."></td>";

            }
            echo "</tr>";
        }

        echo "</tr>"; //SPECIALITE


        ?>
    </table>
</body>