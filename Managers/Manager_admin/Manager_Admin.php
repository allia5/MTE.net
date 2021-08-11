<?php


function get_All_Admin(){
    $db = new mysqli('localhost', 'root','','primaireetude');
    $db->autocommit(FALSE);
    if ($db) {
        $sth = $db->prepare("SELECT * from admin ");
        $sth->execute();
        $resultSet = $sth->get_result();
        $result = $resultSet->fetch_all();


        return json_encode($result);
    }
}
function addEnseignant($email,$username,$pass,$module,$etats,$id_A){
    $pass_code=sha1($pass);
    $con = mysqli_connect("localhost","root","","primaireetude");
    if($con){
        $cmd="insert into enseignant values('$pass_code','$username','$module','$id_A','$email','$etats','$pass')";
        $inst=$con->query($cmd);
        if($inst){
            return 1;
        }else{
            return 0;
        }

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


function suppEnseig($id_e){
    $con = mysqli_connect("localhost","root","","primaireetude");
    if($con){
        $cmd="delete from enseignant where id_e='$id_e'";
        $inst=$con->query($cmd);
        if($inst){
            return 1;
        }else{
            return 0;
        }

    }
}

function Set_Block_Enseignant($id_e){
  
    $con=mysqli_connect("localhost","root","","primaireetude");
    if($con){
       $cmd="update enseignant set etat='block' where id_e='$id_e' ";
       $sql=$con->query($cmd);
       if($sql){
           return 1;
       }
       return 0;


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


function Set_niveaux_E($parm1,$bol1,$bol2,$bol3,$bol4,$bol5){
    $con = mysqli_connect("localhost","root","","primaireetude");
   /**/ 
    if($con){
        $cmd="update enseignant_niveaux set niv1=$bol1,niv2=$bol2,niv3=$bol3,niv4=$bol4,niv5=$bol5 where id_e='$parm1'";
        $inst=$con->query($cmd);
        if($inst){
            return 1;
        }else{
            return 0;
        
        }

    }

}


function delete_pub_Enseignant($id_e){
    $con = mysqli_connect("localhost","root","","primaireetude");
    /**/ 
     if($con){
         $cmd="delete from publication where id_e='$id_e'";
         $inst=$con->query($cmd);
         if($inst){
             return 1;
         }else{
             return 0;
         }
 
     }
}

?>