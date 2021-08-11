<?php
include "../../../Services/Service_User/Service_User.php";
session_start();

if(!isset($_SESSION['access_token'])){
	header("Location:login.php");
	exit();}
	
$_SESSION['userData']['picture']['url'];
$_SESSION['id_user']=$_SESSION['userData']['id'];
$_SESSION['first_name_user']=$_SESSION['userData']['first_name'];
$_SESSION['last_name_user']=$_SESSION['userData']['last_name'];
$_SESSION['email_user']=$_SESSION['userData']['email'];

set_User($_SESSION['id_user'],$_SESSION['first_name_user'],$_SESSION['last_name_user'],$_SESSION['email_user']);




header("location:../Pages_Users/TravailleUser.php");




?>

