<?php
include "/wamp64/www/MTE/Services/Service_User/Service_User.php";
session_start();
if(isset($_POST['id_m'])){ 
$_SESSION['id_module']=$_POST['id_m'];}
$table=get_ens_admin($_SESSION['id_admin'],$_SESSION['id_niveaux'],$_SESSION['id_module']);

$out='<select id=select4 class="form-select" size="5" aria-label="size 3 select example">
<option value=x selected>select un prof</option>';
for($i=0;$i<count($table);$i++){
    $out.='<option  value='.$table[$i][0].'>'.$table[$i][1].'</option>';
}



$out.='</select>';
echo $out;



?>