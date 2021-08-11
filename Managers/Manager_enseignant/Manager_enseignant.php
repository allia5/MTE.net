<?php


function get_liste_Enseignant_id_A($id_a){
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from enseignant where Id_A='$id_a' and etat='active' ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }
}

function get_liste_Enseignant_id_A_Blocked($id_a){
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from enseignant where Id_A='$id_a' and etat='block' ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }
}

function get_All_enseignant1(){
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from enseignant ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }
}


function Demmander_Count_Enseignant($id,$username,$email,$module,$id_A){
    $id_code=sha1($id);
    $con=mysqli_connect("localhost","root","","primaireetude");
    if($con){
        $cmd="insert into enseignant values('$id_code','$username','$module','$id_A','$email','block','$id')";
        $dis=$con->query($cmd);
        if($dis){
            return  1 ;
        }
        return 0;
    }

}
function get_Id_Primaire($id_p){
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from Primaire where id_pr='$id_p' ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }
}


function VirifieEmail($email){

    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from enseignant where email_e ='$email' ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();
   if($result !=null){
       return 0;
   }else{
       return 1;
   }

        
    }    



}

function cree_Ens($id_e){
    $con1=mysqli_connect("localhost","root","","primaireetude");
    if($con1){
       $cmd1="insert into  enseignant_niveaux (id_e) values('$id_e')";
       $sql=$con1->query($cmd1);
    }

}
function Set_Active_Enseignant($id_e){
  
    $con=mysqli_connect("localhost","root","","primaireetude");
    if($con){
       $cmd="update enseignant set etat='active' where id_e='$id_e' ";
       $sql=$con->query($cmd);
       if($sql){
        
        cree_Ens($id_e);
           return 1;

       }
       return 0;


    }
}

function getNiveaux_E($id_e){
    /*$id_e=sha1($id_e);*/
    $db = new mysqli('localhost', 'root', '', 'primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from enseignant_niveaux where id_e='$id_e' ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }

}

?>