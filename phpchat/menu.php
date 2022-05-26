<?php
include "chat.html";
include "connect.php";

if ($bdd_trouvee) {
    echo "BDD existe";

    $pseudo = isset($_POST["pseudo"]) ? $_POST["pseudo"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";

    if ($pseudo == '' || $message == '') {
        echo "<script>alert(\"Tout les champs ne sont pas bien renseigné !\")</script>";
    } else {
        $requeteSQL = "INSERT INTO `messagerie`(`pseudo`, `message`) VALUES ('$pseudo','$message')";
        $executequery = mysqli_query($bdd_login, $requeteSQL);
    }
} else {
    echo "BDD non trouvée";
}
