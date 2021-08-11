<?php
include "../../Services/Services_Publication/Service_Publication.php";


$id=$_POST['id_e'];

$result=delete_pub($id);
echo $result;




?>