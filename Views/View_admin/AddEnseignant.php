<?php
include "../../Services/Service_admin/Service_Admin.php";
session_start();
$email=$_POST['email1'];
$username =$_POST['username1'];
$pass =$_POST['password1'];
/*$pass=sha1($pass);*/
$module=$_POST['module1'];
$etats='active';
$id_A=$_SESSION['password'];
$yep=serviceaddEnseignant($email,$username,$pass,$module,$etats,$id_A);

echo $yep;

?>