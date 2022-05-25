<?php
$bdd="hopital";
$bdd_login=mysqli_connect('localhost', 'root', '');
$bdd_trouvee= mysqli_select_db($bdd_login,$bdd);
?>