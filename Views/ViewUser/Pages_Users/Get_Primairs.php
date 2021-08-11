<?php

include "/wamp64/www/MTE/Services/Service_User/Service_User.php";
$table=get_list_primaire4();
$table=json_decode($table);

$out='<select id="select1" class="form-select" size="5" aria-label="size 3 select example">
<option value=x selected>select un école</option><br>';
foreach($table as $row){
    $out.='<option value='.$row[0].'>'.$row[2].'</option>';
}



$out.='</select>';

echo $out;




?>