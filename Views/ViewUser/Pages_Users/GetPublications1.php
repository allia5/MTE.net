<?php
session_start();
/*include "../../Services/Services_Publication/Service_Publication.php";*/
include "../../../Services/Services_Publication_User/Service_Publication.php";

$password=$_SESSION['id_Enseignant'];
/*print_r($password);*/
$result1=classement_type1($password,$_SESSION['id_niveaux']);

$out='
<table class="table table-borderless">
<thead>
    <tr>
        <th scope="col">Titre</th>
        <th scope="col">nom fichier</th>
        <th scope="col">date</th>
        <th scope="col">Télécharger</th>
    </tr>
</thead>
<tbody>';
foreach($result1 as $row){

    $out.='<tr>
    <th scope="row">'.$row[1].'</th>
    <td>'.$row[4].'</td>
    <td>'.$row[2].'</td>
    <td><a href=Affichage_User.php?file='.$row[4].'><button id=btn_sup class=btn-info data-id='.$row[0].'>&#x1F883;</button></a></td>
</tr>';


}
$out.='</tbody>
</table>
';
/*$result1=json_encode($result1);*/
echo  $out;













?>