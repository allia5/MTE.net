<?php
include "/wamp64/www/MTE/Services/Service_User/Service_User.php";
session_start();
if(isset($_POST['id_p'])){ 
$_SESSION['id_Primaire']=$_POST['id_p'];}
$result= get_id_admin($_SESSION['id_Primaire']);
$result=json_decode($result);
if(count($result)!=0){ 
$_SESSION['id_admin']=$result[0][0];
}

$out='<select id=select2 class="form-select" size="5" aria-label="size 3 select example">
<option value=x selected> select un niveau</option>';
for($i=1;$i<=5;$i++){
    $out.='<option value='.$i.'>Niveau '.$i.'</option>';
}



$out.='</select>';
echo $out;


?>