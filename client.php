<?php
//recuperation de l'identifiant du client qui vient de se connecter
session_start();
echo $_SESSION['idClient'];
?>