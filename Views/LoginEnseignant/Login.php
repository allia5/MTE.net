


<?php  
session_start();
if(empty($_SESSION['password_e']) and empty($_SESSION['email_e'])  ){
    
    
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

    <title>ministre education biskra</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="header">
        <img src="img/R.png" class="rounded mx-auto d-block" alt="...">
        <a>مديرية التربية الوطنية</a><br><br><br><br><br>
        <div id="erreur" style="display: none;" class="alert alert-danger" role="alert">
            il exist un erreur
        </div>
        <div id="succ" style="display: none;" class="alert alert-success" role="alert">
            votre demande il est envoyer
        </div>
        <div class="hello">
            <div class="login">

                <div class="d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" onclick="fun1()" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio4">inscription</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio5" onclick="fun2()" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio5">connexion</label>


                    </div>


                </div><br>
                <div id="connexion" class="justify-content-center">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input id="email" placeholder="exemple@gmail.com" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input id="password" placeholder="password..." type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button id="submit" style="width: 100%;" type="submit" class="btn btn-success">Submit</button>

                </div>
                <div id="inscrire" class="justify-content-center" style="display: none;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input placeholder="exemple@gmail.com" type="email" class="form-control" id="exampleInputEmail10" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">nom et prenome</label>
                        <input placeholder="nom et prenome" type="text" class="form-control" id="exampleInputEmail11" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">nom de primaire</label>
                        <input id="primaire" placeholder="nom de primaire" type="text" class="form-control" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ssélectionner le branch</label>
                        <select id="module" class="form-select" aria-label="Default select example">
                            <option selected>selectioner un module</option>
                            <option value="arab">arab</option>
                            <option value="france">france</option>

                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">id_Primaire</label>
                        <input placeholder="id primaire" type="text" class="form-control" id="exampleInputEmail12" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input placeholder="password..." type="password" class="form-control" id="exampleInputPassword11">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">confermer Password</label>
                        <input placeholder="confirmer password" type="password" class="form-control" id="exampleInputPassword12">
                    </div>

                    <button id="submit1" style="width: 100%;" type="submit" class="btn btn-success">Submit</button>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        var check2 = 2;



        function fun1() {
            check2 = 1;
            document.getElementById("connexion").style.display = "none";
            document.getElementById("inscrire").style.display = "block";
            document.getElementById("erreur").style.display = "none";
            document.getElementById("succ").style.display = "none";


        }

        function fun2() {
            check2 = 2;
            document.getElementById("connexion").style.display = "block";
            document.getElementById("inscrire").style.display = "none";
            document.getElementById("erreur").style.display = "none";
            document.getElementById("succ").style.display = "none";



        }






        $(document).ready(function(e) {


            $("#submit1").on("click", function(e) {
            
                var email = $("#exampleInputEmail10").val();
                var pass1 = $("#exampleInputPassword11").val();
                var pass2 = $("#exampleInputPassword12").val();
                var username = $("#exampleInputEmail11").val();
                var id_p = $("#exampleInputEmail12").val();
                var module1 = /*$("#module").val();*/ document.getElementById("module").value;
                var primaire = $("#primaire").val();
                
                if(pass1.length>10 && pass2.length>10 ){ 
                $.ajax({
                    url: "../../Services/Service_enseignant/enregistrer_enseignant.php",
                    type: "POST",
                    data: {

                        password1: pass1,
                        password2: pass2,
                        username: username,
                        id_p: id_p,
                        module: module1,
                        primaire: primaire,
                        email: email
                    },
                    success: function(data) {
                        if (data == 1) {
                            document.getElementById("succ").style.display = "block";
                            document.getElementById("erreur").style.display = "none";
                            alert(data);
                        } else {
                            document.getElementById("succ").style.display = "none";
                            document.getElementById("erreur").style.display = "block";
                            alert(data);
                        }
                    }
                });
            }else{
                alert("minimum 10 letter in password");
            }
            

            });




            $("#submit").on("click", function(e) {



                if (check2 == 1) {

                    /* var email=$("#exampleInputEmail10").val();
  var pass1=$("#exampleInputPassword11").val();
  var pass2=$("#exampleInputPassword12").val();
  var username=$("#exampleInputEmail11").val();
  var id_p=$("#exampleInputEmail12").val();
 var module1 = $("#module").val();
 var primaire = $("#primaire").val();
alert("hellow");

    $.ajax({
        url: "../../Service_enseignant/enregistrer_enseignant.php",
        type: "POST",
        data: {
            email: email,
            password1: pass1,
            password2:pass2,
            username:username,
            id_p:id_p,
            module:module1,
            primaire:primaire
        },
        success: function(data) {
            alert(data);
        }
    });*/

                } else if (check2 == 2) {

                    var email = $("#email").val();
                    var pass = $("#password").val();
                    $.ajax({
                        url: "../Virification/Virifie_enseignant.php",
                        type: "POST",
                        data: {
                            email: email,
                            password: pass
                        },
                        success: function(data) {
                            alert(data);
                            if (data == 1) {

                                window.location.href = "../View_enseignant/Enseignant";

                            } else {
                                document.getElementById("erreur").style.display = "block";
                            }

                        }
                    });

                }
            });
        });
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js " integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF " crossorigin="anonymous "></script>



</html>

<?php }else{
    
    header('location:../View_enseignant/Page_Pub_Enseignant.php');
    
}?>