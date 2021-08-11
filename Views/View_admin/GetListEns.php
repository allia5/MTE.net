<?php


include "../../Services/Service_enseignant/Service_enseignant.php";
session_start();

$table=Get_List_Ens_Id_a($_SESSION['password']);

$i=0;
$table2=array();
foreach($table as $row){ 

    $table2[$i]=$row[1];

$i++;
 }

$table2=json_encode($table2);


echo $table2;






?>