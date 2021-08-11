<?php  
session_start();
if(empty($_SESSION['password']) and empty($_SESSION['email']) ){
    
    
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
           erreur
        </div>

        <div class="hello">
            <div class="login">

                <div class="d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" onclick="fun1()" autocomplete="off" >
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
                        <input id="email" placeholder="exemple@gmail.com" type="email" class="form-control" id="exampleInputEmail10" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">username</label>
                        <input id="username" placeholder="username" type="text" class="form-control" id="exampleInputEmail11" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">nome_Primaire</label>
                        <input id="primaire" placeholder="nom de primaire..." type="text" class="form-control" id="exampleInputEmail12" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input id="password" placeholder="password..." type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">confermer Password</label>
                        <input id="password" placeholder="confirmer password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button id="submit" style="width: 100%;" type="submit" class="btn btn-success">Submit</button>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">


var check2 = 2;



function fun1() {
    check2 = 1;
    document.getElementById("connexion").style.display="none";
    document.getElementById("inscrire").style.display="block";
    document.getElementById("erreur").style.display = "none";


}

function fun2() {
    check2 = 2;
    document.getElementById("connexion").style.display="block";
    document.getElementById("inscrire").style.display="none";
    document.getElementById("erreur").style.display = "none";


}






$(document).ready(function(e){ 
$("#submit").on("click", function(e) {
var email = $("#email").val();
var pass = $("#password").val();


if (check2 == 1) {
   
    $.ajax({
        url: "",
        type: "POST",
        data: {
            email: email,
            password: pass
        },
        success: function(data) {
            alert("hello");
        }
    });

} else if (check2 == 2) {
    
    $.ajax({
        url: "../Virification/Virifie_Admin.php",
        type: "POST",
        data: {
            email: email,
            password: pass
        },
        success: function(data) {
            if(data==1){ 
             window.location.href="../View_admin/Admin";
             document.getElementById("erreur").style.display = "none";
        
        }else{
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
    
    header('location:../View_admin/View_Admin.php');
    
}?>