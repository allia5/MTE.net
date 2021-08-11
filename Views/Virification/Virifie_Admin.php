<?php

include "../../Services/Service_admin/Service_Admin.php";
$user =$_POST['email'];
$pass=$_POST['password'];
if(Virifie($user,$pass)==1){
    session_start();
    $_SESSION['email']=$user;
    $_SESSION['password']=$pass;

    echo 1;

}else{
    echo 0;
}

?>
