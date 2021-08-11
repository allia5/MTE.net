<?php
session_start();
if (isset($_SESSION['id_user']) and isset($_SESSION['first_name_user']) and isset($_SESSION['last_name_user']) and isset($_SESSION['email_user'])) {

?>


  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Style/style1.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>TravailleUser
    </title>

  </head>

  <body style="margin:0;">

    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">MTE.net</span>

      </div>
    </nav>
    <div class="header">
      <img src="img/R.png" class="rounded mx-auto d-block" alt="...">
      <a>مديرية التربية الوطنية</a><br><br><br><br><br>

      <div id="container_niveaux" class="container" >
        <div class="row">
          <div style="height: 200px;" class="col-md-6 offset-md-3
                            text-center bg-info">
            <div id=niveaux class="niveaux">
              <select class="form-select" size="3" aria-label="size 3 select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <button style="width:100%;" class="btn-success">valide</button>
          </div>
        </div>
      </div>

      <div id="container_primaire" class="container">
        <div class="row">
          <div style="height: 200px;" class="col-md-6 offset-md-3
                            text-center bg-info">
            <div class="primaire">

            </div>
            <button style="width:100%;" class="btn-success">valide</button>
          </div>
        </div>
      </div>

      <div id="container_module" class="container">
        <div class="row">
          <div style="height: 200px;" class="col-md-6 offset-md-3
                            text-center bg-info">
            <div class="module">
            </div>
            <button style="width:100%;" id="valide" class="btn-success">valide</button>
          </div>
        </div>
      </div>

      <div id="container_profe" class="container">
        <div class="row">
          <div style="height: 200px;" class="col-md-6 offset-md-3
                            text-center bg-info">
            <div class="profs">
            </div>
            <button style="width:100%;" class="btn-success">valide</button>
          </div>
        </div>
      </div>


    </div>






  </body>
  <script type="text/javascript">
    $(document).ready(function() {
      var x = 1;
      if (x == 1) {
        document.getElementById("container_module").style.display = "none";
        document.getElementById("container_profe").style.display = "none";
        document.getElementById("container_primaire").style.display = "block";
        document.getElementById("container_niveaux").style.display = "none";
        $.ajax({
          url: "Get_Primairs.php",
          type: "POST",
          success: function(data) {


            $(".primaire").html(data);

          }

        });
      }
      $(document).on("click", ".btn-success", function() {
        x = x + 1;


        var id_pr = document.getElementById("select1").value;

        if (x == 2) {
          document.getElementById("container_module").style.display = "none";
          document.getElementById("container_profe").style.display = "none";
          document.getElementById("container_primaire").style.display = "none";
          document.getElementById("container_niveaux").style.display = "block";
          $.ajax({
            url: "Get_Niveaux.php",
            type: "POST",
            data: {
              id_p: id_pr
            },
            success: function(data) {



              $(".niveaux").html(data);

            }

          });
        } else if (x == 3) {

          var id_n = document.getElementById("select2").value;
          document.getElementById("container_module").style.display = "block";
          document.getElementById("container_profe").style.display = "none";
          document.getElementById("container_primaire").style.display = "none";
          document.getElementById("container_niveaux").style.display = "none";
          $.ajax({
            url: "Get_Module.php",
            type: "POST",
            data: {
              id_n: id_n
            },
            success: function(data) {



              $(".module").html(data);

            }

          });
        } else if (x == 4) {
          var id_m = document.getElementById("select3").value;
          document.getElementById("container_module").style.display = "none";
          document.getElementById("container_profe").style.display = "block";
          document.getElementById("container_primaire").style.display = "none";
          document.getElementById("container_niveaux").style.display = "none";
          $.ajax({
            url: "Get_Prof.php",
            type: "POST",
            data: {
              id_m: id_m
            },
            success: function(data) {



              $(".profs").html(data);

            }
          });
        } else if (x == 5) {
          var id_e = document.getElementById("select4").value;


          $.ajax({
            url: "Set_Id_Prof.php",
            type: "POST",
            data: {
              id_e: id_e
            },
            success: function(data) {



              window.location.href = "Affichage_User.php";

            }
          });

        }


      });

      /*$(document).on("click",".btn-light",function(){
               x=x-1;
               if(x>1){ 
               document.getElementById("valide").click();
               }
       });*/




    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </html>

<?php
} else {
  header("location:../loginfb/");
}


?>