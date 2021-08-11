<?php

include "Service_enseignant.php";

$username=$_POST['username'];
$pass1=$_POST['password1'];
$pass2=$_POST['password2'];      
$module=$_POST['module'];
$id_p=$_POST['id_p'];
$email=$_POST['email'];
$Primaire=$_POST['primaire'];

$reteur=Enregistrer_Enseignant($pass1,$pass2,$username,$email,$module,$Primaire,$id_p);
echo $reteur;

?>