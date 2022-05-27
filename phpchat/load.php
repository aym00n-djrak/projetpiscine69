<?php
include "connect.php";

$requeteSQL = "SELECT * FROM `message`";
$executequery = mysqli_query($bdd_login, $requeteSQL);

while($donnee= mysqli_fetch_assoc($executequery)){
    echo "<h3>Pseudo: " .$donnee['pseudo']."</h3>";
    echo "Message: " .$donnee['message'];
}
