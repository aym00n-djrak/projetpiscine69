<!DOCTYPE html>
<html>

<head>
     <title>Réservation</title>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <link rel="stylesheet" type="text/css" href="http://localhost/projetpiscine69//Accueil.css">
     <script type="text/javascript">
          $(document).ready(function() {
               $('.header').height($(window).height());
          });
     </script>
</head>

<body>
     <?php
     include "connect.php";
     if (isset($_POST['button'])) {
          $heure = $_POST["heure"] != "" ? $_POST["heure"] : "heure vide";
          $creneauheure = $_POST["creneauheure"] != "" ? $_POST["creneauheure"] : "creneauheure vide";
          $idClient = $_POST["idClient"] != "" ? $_POST["idClient"] : "idClient vide";
          $idLabo = $_POST["idLabo"] != "" ? $_POST["idLabo"] : "idLabo vide";
          $idMedecin = $_POST["idMedecin"] != "" ? $_POST["idMedecin"] : "idMedecin vide";
     }
     $reserveOuPas = 1;
     $consultationFinie = 0;
     //echo "creneauheure ".$creneauheure."<br>";
     $creneau = substr($creneauheure, 0, strpos($creneauheure, $heure));
     echo "creneau " . $creneau . "<br>";
     echo "heure " . $heure . "<br>";
     echo "reserveOuPas " . $reserveOuPas . "<br>";
     echo "consultationFinie " . $consultationFinie . "<br>";
     echo "idClient " . $idClient . "<br>";
     echo "idMedecin " . $idMedecin . "<br>";
     echo "idLabo " . $idLabo . "<br>";

     $requeteSQL = "INSERT INTO `creneau`(`dateCreneau`, `heureCreneau`, `reserveOuPas`, `consultationFinie`, `idClient`, `idMedecin`, `idLabo`) VALUES ('$creneau','$heure',$reserveOuPas,$consultationFinie,$idClient,$idMedecin,$idLabo)";
     $executequery = mysqli_query($bdd_login, $requeteSQL);

     echo "Insertion Reussie !";
     ?>
     <a href="http://localhost/projetpiscine69//MedecinGeneraliste.php">
          <input type="button" name="Retour Menu" value="Retour Menu" text-align="center">
     </a>

</body>

</html>