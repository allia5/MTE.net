<?php
session_start();

$_SESSION['niveaux_actuel']=$_POST['id_e'];

echo $_SESSION['niveaux_actuel'];


?>