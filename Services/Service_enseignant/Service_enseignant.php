<?php
include "../../Managers/Manager_enseignant/Manager_enseignant.php";
 

function get_all_Enseignant($id_a){
    $result=get_liste_Enseignant_id_A($id_a);
    $result=json_decode($result);
    return $result;

}

function get_all_Enseignant_Blocked($id_a){
    $result=get_liste_Enseignant_id_A_Blocked($id_a);
    $result=json_decode($result);
    return $result;

}

function Virifie1($user,$pass)
{
    $table = get_All_enseignant1();
    $table =json_decode($table);
    
    foreach($table as $row){
        if($row[0]==sha1($pass) and ($row[4]==$user or $row[1]==$user) and $row[5]='active'){
            return 1;
        }
    }
    return 0;

}

function isValidEmail($email)
{

   if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
       return true;
   } else {
       return false;
   } 
  
}

function Enregistrer_Enseignant($id1,$id2,$username,$email,$module,$Primaire,$id_p){
 $result=get_Id_Primaire($id_p);

 $result=json_decode($result);

 /*$var=Existing_Email($email);*/
 if( isset($result[0][0])  and $result[0][2]==$Primaire /*and Existing_Email($email)==1*/){
   
   if(isValidEmail($email) and $module!=null and $username!=null and $id1==$id2 and VirifieEmail($email)==1){
    
    $val=Demmander_Count_Enseignant($id1,$username,$email,$module,$result[0][1]);
     
    return $val;

   }
 }
 return 0;


}


function SetActive($id_e){
   
    $result=get_All_enseignant1();
    $result=json_decode($result);
    foreach($result as $table){
        if($table[0]==$id_e){
            $expediteur = "ramziallia07@gmail.com";
            $text="";
            $sujet = "authentification compte MTE.net";
           $dis=mailer($expediteur,$table[4],$sujet,$text,$table);
            if($dis){
                return Set_Active_Enseignant($id_e);
            }

        }
    }
    return 0;

    

}

function mailer($expediteur,$destinataire,$sujet,$text,$row){
    $expediteur = "ramziallia07@gmail.com";
   /* $destinataire = "ramziallia07@gmail.com";*/
    $sujet = "subject :";
    $entete  = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete .= "From: ".$expediteur;
    $text="votre compte il est bien confermè";
    
    /*$contenu_message = '
    '.utf8_decode($text).
    '';*/
    $contenu_message = '<html>
    <body style=background=blue>
        <div aligne="center" width="100%">
           <h1><a>décision sur la plate-forme MTE.net : </a></h1> <br>
             <b><a>'.$text.'</a></b> <br>
             b><a>password : '.$row[6].' </a></b><br>
             <b><a>Votre email : '.$row[4].'</a></b><br>
             <a><b>Merci de vous réinscrire sur la plateforme<b></a>

        </div>
    </body>
</html>';
    $resulat=mail($destinataire,$sujet,$contenu_message,$entete);
    return $resulat;
}

function Existing_Email($email){
    $url="https://emailvalidation.abstractapi.com/v1/?api_key=c34b0313f8fc44e4822a8027eb1b65aa&email=$email";
        $json = file_get_contents($url);
        $ob= json_decode($json);
        if(($ob->deliverability)=="DELIVERABLE"){
    return 1;
        }else{
            return 0;
        }
    

}
function decode($table){
    $s=0;
    $int=array();
    if($table != null){ 
    for($i=1;$i<=5;$i++){
        if($table[0][$i]==1){
            $int[$s]=$i;
            $s++;
        }
        
    }
}
    return $int;
}
function getNIvEns($id_e){
    
    $result=getNiveaux_E($id_e);
    $result=json_decode($result);
    
    return decode($result);

}

function Get_List_Ens_Id_a($id_a)
{
    $i=0;
    $table2=array();
    $table = get_All_enseignant1();
    $table =json_decode($table);
    foreach($table as $row){
        if($row[3]==$id_a){
            $table2[$i]=$row;
            $i++;
        }
    }
    return $table2;

}

?>
