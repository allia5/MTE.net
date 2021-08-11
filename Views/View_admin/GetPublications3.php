<?php
session_start();
include "../../Services/Services_Publication_user/Service_Publication.php";

$password=$_SESSION['password_e'];
if(isset($_SESSION['niveaux_actuel'])){ 
$result3=classement_type3($password,$_SESSION['niveaux_actuel']);

$out='
<table class="table table-borderless">
<thead>
    <tr>
        <th scope="col">type</th>
        <th scope="col">nom fichier</th>
        <th scope="col">date</th>
        <th scope="col">supp</th>
    </tr>
</thead>
<tbody>';
foreach($result3 as $row){

    $out.='<tr>
    <th scope="row">'.$row[1].'</th>
    <td>'.$row[4].'</td>
    <td>'.$row[2].'</td>
    <td><button id=btn_sup class=btn-danger data-id='.$row[0].'> &#x1F5D1;</button></td>
</tr>';


}
$out.='</tbody>
</table>
';
/*$result1=json_encode($result1);*/

echo  $out;
}












?>