<?php



session_start();
if (isset($_SESSION['password']) and isset($_SESSION['email'])) {
$_SESSION['password_e']=$_GET['id'];

  
     




?>







    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="Style/Page_Pub_Enseignant.css">
        <title>View PUblication</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MTE</a><button id="deconnect" type="button" class="btn btn-light">déconnecter</button>
            </div>

        </nav>


        <br><br><br><br>

<div id="choix">
        
</div>
        <br><br><br><br>
        <div class="contenu">
            <div id="annonce">
                <a>
                    <h1 style="color: rgb(128, 128, 252);">semestre1:</h1>
                </a>
                <div class="base">
                    <h3><a>comment</a></h3>
                    <div id="fichier" class="fichier">

                    </div>

                </div>

            </div><br>
            <div id="semestre1">
                <a>
                    <h1 style="color: rgb(128, 128, 252);">semestre2:</h1>
                </a>
                <div class="base">
                    <h3><a>comment</a></h3>
                    <div id="fichier1" class="fichier">

                    </div>

                </div>
            </div><br>
            <div id="semester2">
                <a>
                    <h1 style="color: rgb(128, 128, 252);">annonce:</h1>
                </a>
                <div class="base">
                    <h3><a>comment</a></h3>
                    <div id="fichier2" class="fichier">

                    </div>

                </div>
            </div><br>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function fn1() {
                document.getElementById("inlineRadio1").value = "an";
            }

            function fn2() {
                document.getElementById("inlineRadio2").value = "s1";
            }

            function fn3() {
                document.getElementById("inlineRadio3").value = "s2";
            }

            function myFunction(){ 
                var x = document.getElementById("inputGroupSelect01").value;
                    $.ajax({
                        url: "../View_enseignant/PostSession.php",
                        type: "POST",
                        data:{id_e:x},
                        success: function(data) {
                           
                        }
                    });

                    function load1() {
                    $.ajax({
                        url: "GetPublications1.php",
                        type: "POST",
                        success: function(data) {
                            $("#fichier").html(data);
                        }
                    });
                }

                load1();
                loads2();
                loads3();

                function loads2() {
                    $.ajax({
                        url: "GetPublications2.php",
                        type: "POST",

                        success: function(data) {
                            $("#fichier1").html(data);
                        }
                    });
                }

                function loads3() {
                    $.ajax({
                        url: "GetPublications3.php",
                        type: "POST",
                        success: function(data) {
                            $("#fichier2").html(data);
                        }
                    });
                }
               
                    
                }
                
                
            $(document).ready(function() {

                
                
                
                
                
             
                
                load1();
                loads2();
                loads3();

                

                $.ajax({
                        url: "GetNiv.php",
                        type: "POST",
                        success: function(data) {
                            $("#choix").html(data);
                        }
                    });
                
                    
                    
                    
                function load1() {
                    $.ajax({
                        url: "GetPublications1.php",
                        type: "POST",
                        success: function(data) {
                            $("#fichier").html(data);
                        }
                    });
                }


                function loads2() {
                    $.ajax({
                        url: "GetPublications2.php",
                        type: "POST",

                        success: function(data) {
                            $("#fichier1").html(data);
                        }
                    });
                }

                function loads3() {
                    $.ajax({
                        url: "GetPublications3.php",
                        type: "POST",
                        success: function(data) {
                            $("#fichier2").html(data);
                        }
                    });
                }


               $(document).on("click",".btn-danger",function(e){
                var id = $(this).data("id");
                   $.ajax({
                       
                       

                       url: "../View_enseignant/Supp_Publication.php",
                       type:"POST",
                       data: {id_e:id},
                       
                       success: function(data){
                           alert(data);
                           load1();
                           loads2();
                           loads3();
                             
                       }

                   });

               });

               /* $("#deconnect").on("click", function(e) {
                    $.ajax({
                        url: "DeconnecteEnseignant.php",
                        type: "POST",
                        success: function(data) {

                            window.location.href = "../LoginEnseignant/Login.php";

                        }


                    });



                });*/
            });
        </script>
    </body>

    </html>

<?php

        }else{
            header("Location:../404/404.php ");
        }




?>