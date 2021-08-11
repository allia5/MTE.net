<?php
include "../../Services/Service_admin/Service_Admin.php";

$tab1=$_POST['tab1'];
$tab2=$_POST['tab2'];
$tab3=$_POST['tab3'];
$tab4=$_POST['tab4'];
$tab5=$_POST['tab5'];
$id_e=$_POST['id_e'];
$tab=array($tab1,$tab2,$tab3,$tab4,$tab5);
$result=set_Niv($id_e,$tab);
echo $result;




?>