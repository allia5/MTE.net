<?php

session_start();
if(isset($_POST['id_n'])){ 
$_SESSION['id_niveaux']=$_POST['id_n']; }
$table=array("arab","france");
$out='<select id=select3 class="form-select" size="5" aria-label="size 3 select example">
<option value=x selected>Open this select menu</option>';
for($i=0;$i<=1;$i++){
    $out.='<option value='.$table[$i].'>'.$table[$i].'</option>';
}



$out.='</select>';
echo $out;


?>