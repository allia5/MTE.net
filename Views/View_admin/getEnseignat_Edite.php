<?php

include "../../Services/Service_enseignant/Service_enseignant.php";
session_start();
$id_A=$_SESSION['password'];
$result=get_all_Enseignant($id_A);
$out= "";

foreach($result as $table){
  $out.="<table class=table>
  <thead>
      <tr>
          <th scope=col>email</th>
          <th scope=col>n1</th>
          <th scope=col>n2</th>
          <th scope=col>n3</th>
          <th scope=col>n4</th>
          <th scope=col>n5</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <th scope=row>".$table[4]."</th>
          <td><input class=".$table[0]." type=checkbox value=1 id=flexCheckIndeterminate ></td>
          <td><input class=".$table[0]." type=checkbox value=2 id=flexCheckIndeterminate></td>
          <td><input class=".$table[0]." type=checkbox value=3 id=flexCheckIndeterminate></td>
          <td><input class=".$table[0]." type=checkbox value=4 id=flexCheckIndeterminate></td>
          <td><input class=".$table[0]." type=checkbox value=5 id=flexCheckIndeterminate></td>
      </tr>

  </tbody>

</table>
<button data-id=".$table[0]."  class=btn-info>ok</button>";
}
echo $out;






?>