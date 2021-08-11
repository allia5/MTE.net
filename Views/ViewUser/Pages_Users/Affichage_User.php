

<?php 
session_start();
if(isset($_SESSION['id_user']) and isset($_SESSION['first_name_user']) and isset($_SESSION['last_name_user']) and isset($_SESSION['email_user'])){
if(!empty($_GET['file']))
{
	$filename = basename($_GET['file']);
	$filepath = '../../View_enseignant/Publication_Upload/' . $filename;
	if(!empty($filename) && file_exists($filepath)){

//Define Headers
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Emcoding: binary");

		readfile($filepath);
		exit;

	}
	else{
		echo "This File Does not exist";
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
            
                <a class="navbar-brand" href="#">MTE</a>
                
                <button id="deconnect" type="button" class="btn btn-light">déconnecter</button>
                
            </div>

        </nav>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="rgb(229, 238, 226)" fill-opacity="1" d="M0,224L48,197.3C96,171,192,117,288,128C384,139,480,213,576,240C672,267,768,245,864,234.7C960,224,1056,224,1152,213.3C1248,203,1344,181,1392,170.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
</svg>
<br><br>
        <div class="profil" style="text-align: center; width: 50%; margin:auto;   ">
            <img s src=<?php echo$_SESSION['userData']['picture']['url'];?> style="width: 100px; height:100px; border-radius: 50px;" alt=""><br>
            <img style="width:30px; height:30px;" src="../img/utilisateur.png" alt="">
            <a><?php echo $_SESSION['last_name_user'],  " ".$_SESSION['first_name_user'] ;?></a><br>
            <img style="width:30px; height:30px;" src="../img/email.png" alt="">
            <a><?php echo $_SESSION['email_user']?></a>
            
         
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
        $(document).ready(function() {

                
                
                
                
                
             
                
load1();
 loads2();
 loads3();

 


 
     
     
     
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

         success:function(data){ 
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

 $("#deconnect").on("click", function(e) {
                    $.ajax({
                        url: "DeconnecteEnseignant.php",
                        type: "POST",
                        success: function(data) {

                            window.location.href = "../loginfb/";

                        }


                    });



                });

});
        </script>
        </body>
    </html>
<?php

}else{
    header('location:../../404/404.php');
}


?>