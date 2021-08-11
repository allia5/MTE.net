<?php

include "../../Services/Service_enseignant/Service_enseignant.php";

session_start();
$id_e=$_SESSION['password_e'];

$tab=getNIvEns($id_e);
$i=0;
$out="<div class=choix>
<div class=input-group mb-3>
<label class=input-group-text for=inputGroupSelect01>Select niveaux:</label>
<select name=stuff class=form-select id=inputGroupSelect01 onchange=myFunction() >
<option  selected disabled >Choose niveaux</option>
";
 for($i=0; $i<count($tab); $i++){ 

$out.="
<option value=".$tab[$i]."  >niveaux:".$tab[$i]."</option>";
 }




$out.="</select>
</div>
</div>";
echo $out;



?>