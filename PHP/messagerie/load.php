<?php
include "connect.php";

$requeteSQL = "SELECT * FROM `messagerie`";
$executequery = mysqli_query($bdd_login, $requeteSQL);

while($donnee= mysqli_fetch_assoc($executequery)){
    echo "<h1>Pseudo: " .$donnee['pseudo']."</h1><br>";
    echo "Message: " .$donnee['message']."<br>";
}

?>