<?php


include "/wamp64/www/MTE/Managers/Manager_User/Manager_User.php";


function get_list_primaire4(){
   return get_List_Primaire();
}
function get_id_admin($id_p){
  return get_id_ad($id_p);

}
  
function get_ens_admin($id_a,$niv,$module){
   $table_col=array();
   $final=array();
   $tito=array();
   
   $i=0;
   $result=get_ens_id_a($id_a,$module);
   $result=json_decode($result);
   foreach($result as $table){
      $tito=get_ens_niv($table[0],$niv);
      $tito=json_decode($tito);
      
      if(count($tito)!=0){
         $table_col[$i]=$table[0];
         $i++;
      }


   }
   $p=0;
   
   
   for($i=0;$i<count($result);$i++){
        if(in_array($result[$i][0],$table_col)){
           $final[$p]=$result[$i];
           $p++;
        }
   }
   
   return $final;

}


function check($id,$first_name,$last_name,$email){
   if($id!=null and $first_name !=null and $last_name !=null and $email !=null){
      return 1;
   }else{
      return 0;
   }
   

}

function set_User($id,$first_name,$last_name,$email){
   if(check($id,$first_name,$last_name,$email)==1){
      return set_User_Count($id,$first_name,$last_name,$email);
   }else{
      return 0;
   }
   
}