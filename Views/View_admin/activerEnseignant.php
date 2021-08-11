<?php


include "../../Services/Service_enseignant/Service_enseignant.php";
$id_e=$_POST['id_e'];
$result=SetActive($id_e);
echo $result;

?>