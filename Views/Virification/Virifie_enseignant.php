


<?php

include "../../Services/Service_enseignant/Service_enseignant.php";
$user =$_POST['email'];
$pass=$_POST['password'];
if(Virifie1($user,$pass)==1){
    session_start();
    $_SESSION['email_e']=$user;
    $_SESSION['password_e']=$pass;
    $_SESSION['niveaux_actuel']='x';

    echo 1;

}else{
    echo 0;
}

?>