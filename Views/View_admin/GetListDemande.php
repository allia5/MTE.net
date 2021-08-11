<?php

include "../../Services/Service_enseignant/Service_enseignant.php";
session_start();
$id_A=$_SESSION['password'];
$result=get_all_Enseignant_Blocked($id_A);
$out= "";

foreach($result as $table){
  $out.="<div class=count>
  <div tyle=width: 20%;>
      <img src=img/compte.png style=width: 100%; alt=>
  </div>
  <div style=text-align: center;>
  <a>utilisateur : ".$table[1]."</a><br>
  <a>email : ".$table[4]."</a><br>
  <a>module : ".$table[2]."</a><br>
  
  </div>
  <div style=width: 100%; text-align: center;>
  
  <button data-id_d=$table[0] id=supp value=$table[0] style=width:100%; type=button class=btn-danger>suppremer</button><br>
  <button data-id=$table[0] id=$table[0] style=width:100%; class=btn-success>activer</button>
  <button   id=btn_l class=$table[0] type=button disabled>
  <span class=spinner-border spinner-border-sm role=status aria-hidden=true></span>
  <span class=sr-only>Loading...</span>
</button> 
  
  </div>
  
  </div>";
}
echo $out;