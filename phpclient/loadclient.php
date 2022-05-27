<?php
include "connect.php";

$tabidclient=array();
$tabnomclient=array();
$tabmailclient=array();


$requeteSQL = "SELECT * FROM `client`";
$executequery = mysqli_query($bdd_login, $requeteSQL);


while($donnee= mysqli_fetch_assoc($executequery)){
     $idClient=$donnee['idClient'];
     array_push($tabidclient, $idClient);

     $nomClient=$donnee['nomClient'];
     array_push($tabnomclient, $nomClient);
    }

?>
