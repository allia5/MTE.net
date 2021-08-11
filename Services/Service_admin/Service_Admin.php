<?php
 
include "../../Managers/Manager_admin/Manager_Admin.php";

function Virifie($user,$pass)
{
    $table = get_All_Admin();
    $table =json_decode($table);
    foreach($table as $row){
        if($row[0]==$pass and $row[4]==$user){
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

function serviceaddEnseignant($email,$username,$pass,$module,$etats,$id_A){


    if(isValidEmail($email)==true and $username !=null and $pass!=null and $module!=null and $etats !=null and $id_A !=null and  VirifieEmail($email)==1 and Existing_Email($email) ){
     return addEnseignant($email,$username,$pass,$module,$etats,$id_A);

    }else{
        return 0;
    }

}


function Existing_Email($email){
    $url="https://emailvalidation.abstractapi.com/v1/?api_key=c34b0313f8fc44e4822a8027eb1b65aa&email=$email";
        $json = file_get_contents($url);
        $ob= json_decode($json);
        if(($ob->deliverability)=='DELIVERABLE'){
    return 1;
        }else{
            return 0;
        }
    

}


function mailer($expediteur,$destinataire,$sujet,$text){
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
             <b><a>password : </a></b><br>
             <b><a>Votre email : </a></b><br>
             <a><b>Merci de vous réinscrire sur la plateforme<b></a>

        </div>
    </body>
</html>';
    $resulat=mail($destinataire,$sujet,$contenu_message,$entete);
    return $resulat;
}

function suppEnseignant($id_e){
    $ret=delete_pub_Enseignant($id_e);
    if($ret==1){ 
    return suppEnseig($id_e);
    }else{
        return 0;
    }
}

function SetBlock($id_e){
   
    $result=get_All_enseignant1();
    $result=json_decode($result);
    foreach($result as $table){
        if($table[0]==$id_e){
            $expediteur = "ramziallia07@gmail.com";
            $text="";
            $sujet = "authentification compte MTE.net";
            $uof=Set_Block_Enseignant($id_e);
           
            if($uof==1){
                return mailerBlock($expediteur,$table[4],$sujet,$text,$table);
                
            }

        }
    }
    return 0;

    

}

function mailerBlock($expediteur,$destinataire,$sujet,$text,$row){
    $expediteur = "ramziallia07@gmail.com";
   /* $destinataire = "ramziallia07@gmail.com";*/
    $sujet = "subject :";
    $entete  = 'MIME-Version: 1.0' . "\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $entete .= "From: ".$expediteur;
    $text="votre compte il est en etat block";
    
    /*$contenu_message = '
    '.utf8_decode($text).
    '';*/
    $contenu_message = '<html>
    <body style=background=blue>
        <div aligne="center" width="100%">
           <h1><a>décision sur la plate-forme MTE.net : </a></h1> <br>
             <b><a>'.$text.'</a></b> <br>
           
            
             <a><b>Merci de vous réinscrire sur la plateforme<b></a>

        </div>
    </body>
</html>';
    $resulat=mail($destinataire,$sujet,$contenu_message,$entete);
    return $resulat;
}

function table_niveaux($signe){
    $table=array();
    for($i=1;$i<=5;$i++){
      if($signe[$i-1]==1){
        $table[$i]=1;
      }else{
        $table[$i]=0;
      }
    }
    return $table;

}

function set_Niv($id_e,$tble){
    $result=table_niveaux($tble);
   print_r($result);
    $dis=Set_niveaux_E($id_e,$result[1],$result[2],$result[3],$result[4],$result[5]);
    return $dis;
}




?>