<?php



session_start();

if (isset($_SESSION['password_e']) and isset($_SESSION['email_e'])) {
    $password_e = $_SESSION['password_e'];
    $email_e = $_SESSION['email_e'];
     
    function prepare($text, $password_e, $date, $file_name, $size, $type)
    {
        $niv=$_SESSION['niveaux_actuel'];
        $con = mysqli_connect('localhost', 'root', '', 'primaireetude');
        if ($con) {
            $password_e = sha1($password_e);
            $cmd = "INSERT INTO publication(descript,date_time,id_e,file_name,size,type,id_n) values('$text','$date','$password_e','$file_name','$size','$type','$niv')";
            $dis = $con->query($cmd);
            if ($dis) {
                return 1;
            }
            return 0;
        }
    }


    if ( isset($_POST['submit']) and isset($_FILES['file']) and isset($_POST['comment']) and isset($_POST['inlineRadioOptions']) ) {


        $location = "Publication_Upload/";
        $file_name = rand(1, 1000000) . $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $file_error = $_FILES['file']['error'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $comment = $_POST['comment'];
        $type = $_POST['inlineRadioOptions'];
        if (!empty($file_name)) {
            if ($file_error == 0) {
                $var = explode('.', $file_name);
                $extension = strtolower(end($var));
                $table_extension = array('png', 'pdf', 'jpg', 'txt', 'mp4','html','rar','docx');
                if (in_array($extension, $table_extension)) {
                    move_uploaded_file($file_tmp, $location . $file_name);
                    $time = time();
                    $date = date(DATE_RSS, $time);
                    prepare($comment, $password_e, $date, $file_name, $file_size, $type);
                    header('location:' . $_SERVER['PHP_SELF']);
                }
            } else {
          header('location:' . $_SERVER['PHP_SELF']);
            }
        } else {
            echo "<script>alert('file is not upload')<script>";
        }
    }


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

        <div class="profil1" style="text-align: center; width: 50%; margin:auto;">
            <img s src="img/compte.png" style="width: 100px; height:100px; border-radius: 50px;" alt=""><br>
            <img style="width:30px; height:30px;" src="img/email.png" alt="">
            
            
            <a><?php echo $_SESSION['email_e']?></a>
            
         
        </div>
        <br><br><br>

<div id="choix">
        
</div>
        <header>
        

            <form style="width: 100%;" method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3" style="width: 100%;">

                    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3">

                </textarea>
                    <div class="mb-3">
                        <input class="form-control" name="file" type="file" id="formFile">
                    </div>
                    <div style="text-align: center;">
                        <div class="form-check form-check-inline">
                            <input onclick="fn1()" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1">
                            <label class="form-check-label" for="inlineRadio1">annonce</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input onclick="fn2()" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2">
                            <label class="form-check-label" for="inlineRadio2">semmestre1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input onclick="fn3()" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3">
                            <label class="form-check-label" for="inlineRadio2">semmestre2</label>
                        </div>
                    </div>
                </div>
                <button name="submit" style="width: 100%;" type="submit" class="btn btn-success">publier</button>
            </form>
        </header><br><br><br><br>
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
                        url: "PostSession.php",
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
                       
                       

                       url: "Supp_Publication.php",
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

                $("#deconnect").on("click", function(e) {
                    $.ajax({
                        url: "DeconnecteEnseignant.php",
                        type: "POST",
                        success: function(data) {

                            window.location.href = "../LoginEnseignant/Login.php";

                        }


                    });



                });
            });
        </script>
    </body>

    </html>


<?php




} else {
    header('Location: ../LoginEnseignant/Login.php');
}
?>