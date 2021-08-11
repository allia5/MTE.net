<?php


function getPublication_Enseignant($id_e){
    
    
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from publication where id_e='$id_e'");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();
        return json_encode($result);
    }

}
function supp_pub($id_p){
    $con=mysqli_connect('localhost','root','','primaireetude');
    if($con){
        $int="delete from publication where id_p=$id_p";
        $cis=$con->query($int);
        if($cis){
            return 1;
        }
        return 0;
    }

}






?>