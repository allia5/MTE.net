<?php

include "../../Services/Service_admin/Service_Admin.php";
$id_e=$_POST['id_e'];
$result=SetBlock($id_e);
echo $result;






?>