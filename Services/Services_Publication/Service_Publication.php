<?php

use function PHPSTORM_META\type;

include "../../Managers/Manager_pub/Manager_publication.php";

function get_Nb_Ens_Publication($id_e){
    $count=0;
    $result=getPublication_Enseignant($id_e);
    
    $result=json_decode($result);
    
    $count=count($result);
    return $count;

}
function classement_type1($id_e,$niv){
    $id_e=sha1($id_e);
    $table=getPublication_Enseignant($id_e);
    $table=json_decode($table);
$i=0;
$type1=array();
foreach($table as $row){
   
    if($row[6]=='s1' and $niv==$row[7]){
        
        $type1[$i]=$row;
        $i++;

    }

}
return $type1;


}

function classement_type2($id_e,$niv){
    $id_e=sha1($id_e);
    $table=getPublication_Enseignant($id_e);
    $table=json_decode($table);
$i=0;
$type2=array();
foreach($table as $row){
   
    if($row[6]=='s2' and $niv==$row[7]){
        
        $type2[$i]=$row;
        $i++;

    }

}
return $type2;


}
function classement_type3($id_e,$niv){
    $id_e=sha1($id_e);
    $table=getPublication_Enseignant($id_e);
    $table=json_decode($table);
 $i=0;
 $type3=array();
foreach($table as $row){
   
    if($row[6]=='an' and $niv==$row[7]){
        
        $type3[$i]=$row;
     $i++;
    }

}
return $type3;


}

function delete_pub($id_p){
    return supp_pub($id_p);

}



?>