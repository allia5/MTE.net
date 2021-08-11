<?php


function get_List_Primaire(){
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from primaire ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }
}

function get_id_ad($id_p){
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from admin  where id_pr='$id_p' ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }

}

function get_ens_id_a($id_a,$module1){
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from enseignant  where etat='active' and module='$module1' and id_a='$id_a' ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }

}

function get_ens_niv($id_e,$niveaux){ 
     
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from enseignant_niveaux  where niv$niveaux=1 and id_e='$id_e'");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();

         
        return json_encode($result);
    
    }

}

function set_User_Count($id,$first_name,$last_name,$email){
    $id_code=sha1($id);
    $con = mysqli_connect("localhost","root","","primaireetude");
    if($con){
        $cmd="insert into client_ values('$id_code','$first_name $last_name','$email','$id')";
        $inst=$con->query($cmd);
        if($inst){
            return 1;
        }else{
            return 0;
        }

    }

}





?>