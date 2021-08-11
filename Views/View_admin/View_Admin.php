<?php

session_start();
if (isset($_SESSION['password']) and isset($_SESSION['email'])) {
    include "../../Services/Service_enseignant/Service_enseignant.php";
    include "../../Services/Services_Publication/Service_Publication.php";
    
    unset($_SESSION['niveaux_actuel']);
    $table=Get_List_Ens_Id_a($_SESSION['password']);
    
    $string="";
    $string2="";
    $i=0;
    $table2=array();
    if(count($table)!=0){ 
    foreach($table as $row){ 
        $count=get_Nb_Ens_Publication($row[0]);
        
        $string2.=$count.',';
        $string.=$row[1].',';
    
    $i++;
     }
    }
     

?>





    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../Style/style_admin.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>
            View_Admin</title>
    </head>

    <body>

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MTE.net</a>

                <button id="deconnexion" type="button" class="btn btn-light">déconnexion</button>
            </div>

        </nav>
        <header>

            <div class="choix" style="position: sticky;">
                <img style="width: 50%;" src="../Loginadmin/img/R.png" class="rounded mx-auto d-block"><br><br><br>
                <p style="text-align: center; background: rgb(88, 87, 87, 0.5);">information personelle :</p>
                <div class="nom"> compte: <?php echo $_SESSION['email'] ?></div>
                <br><br>
                <p style="text-align: center; background: rgb(88, 87, 87, 0.5);">les activitès:</p>
                <a onclick="fn5()">
                    <div>&#x27A4;actuel</div>
                </a>
                <a onclick="fn1()" id="list">
                    <div>&#x27A4;Liste enseignant</div>
                </a>
                <a onclick="fn2()">
                    <div>&#x27A4;ajautè enseignant</div>
                </a>
                <a onclick="fn3()" id="edite">
                    <div>&#x27A4;edite le niveaux enseignant</div>
                </a>
                <a id="demande" onclick="fn4()">
                    <div>&#x27A4;Liste de demande</div>
                </a>


            </div>
            <div class="travaille">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="rgb(229, 238, 226)" fill-opacity="1" d="M0,224L48,197.3C96,171,192,117,288,128C384,139,480,213,576,240C672,267,768,245,864,234.7C960,224,1056,224,1152,213.3C1248,203,1344,181,1392,170.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
</svg>




                <div id="Liste_enseignant" style="display: flex; flex-wrap: wrap; justify-content: space-evenly; ">





                </div>
                <div id="Liste_demmande" style="display: flex; flex-wrap: wrap; justify-content:space-evenly;">





                </div>
                <div id="ajautè_enseignant" style="display: none; ">
                    <div id="alert1" class="alert alert-success" role="alert" style="display: none;">
                        l'enregistrement il est correct
                    </div>
                    <div id="alert2" class="alert alert-danger" role="alert" style="display: none;">
                        l'enregistrement il est incorrect
                    </div>

                    <div class="mb-3 ">
                        <label for="exampleFormControlInput1 " class="form-label ">Email address</label>
                        <input type="email " class="form-control " id="exampleFormControlInput1" placeholder="name@example.com ">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleFormControlInput1 " class="form-label ">username</label>
                        <input type="text " class="form-control " id="exampleFormControlInput2" placeholder="username ">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleFormControlInput1 " class="form-label ">module</label>
                        <input type="text " class="form-control " id="exampleFormControlInput4" placeholder="username ">
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleFormControlInput1 " class="form-label ">password</label>
                        <input type="password " class="form-control " id="exampleFormControlInput3" placeholder="password ">
                    </div>
                    <label for="exampleDataList " class="form-label ">etate</label>
                    <input class="form-control " list="datalistOptions " id="exampleDataList " placeholder="active/non active ">
                    <datalist id="datalistOptions ">
                        <option value="active ">
                        <option value="none active ">
                    </datalist>
                    <button id="ajaut" type="button " class="btn btn-primary ">submite</button>



                </div>
                <div id="contact" style="display: none; ">

                    
      
                    





                </div>

                <canvas style="height: 10%;" id="actuel" width="400" height="400"></canvas>


            </div>

        </header>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.5.0/dist/chart.min.js"></script>
        

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js " integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF " crossorigin="anonymous "></script>

    </body>
    <script type="text/javascript ">


var table=<?php echo json_encode($string);?>;
var table2=<?php echo json_encode($string2);?>;

const myArr = table.split(",");
const myArr2 = table2.split(",");



        var ctx = document.getElementById('actuel').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: myArr,
        datasets: [{
            label: 'nombre de publication',
            data: myArr2 ,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 153, 64, 0.2)',
                'rgba(255, 151, 64, 0.2)',
                'rgba(254, 139, 64, 0.2)',
                'rgba(25, 159, 64, 0.2)',
                'rgba(55, 159, 64, 0.2)',
                'rgba(255, 131, 64, 0.2)',
                'rgba(255, 19, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


        












        function fn1() {

            document.getElementById("Liste_enseignant").style.display = "flex ";
            document.getElementById("Liste_demmande").style.display = "none";
            document.getElementById("contact").style.display = "none ";
            document.getElementById("ajautè_enseignant").style.display = "none ";
            document.getElementById("actuel").style.display = "none";


        }

        function fn2() {
            document.getElementById("ajautè_enseignant").style.display = "block ";
            document.getElementById("Liste_demmande").style.display = "none";
            document.getElementById("contact").style.display = "none ";
            document.getElementById("Liste_enseignant").style.display = "none ";
            document.getElementById("actuel").style.display = "none";
        }

        function fn3() {
            document.getElementById("contact").style.display = "block ";
            document.getElementById("ajautè_enseignant").style.display = "none ";
            document.getElementById("Liste_demmande").style.display = "none";

            document.getElementById("Liste_enseignant").style.display = "none ";
            document.getElementById("actuel").style.display = "none";
        }

        function fn4() {
            document.getElementById("contact").style.display = "none ";
            document.getElementById("ajautè_enseignant").style.display = "none ";
            document.getElementById("Liste_demmande").style.display = "flex ";

            document.getElementById("Liste_enseignant").style.display = "none ";
            document.getElementById("actuel").style.display = "none";
        }

        function fn5() {
            document.getElementById("actuel").style.display = "block";
            document.getElementById("contact").style.display = "none ";
            document.getElementById("ajautè_enseignant").style.display = "none ";
            document.getElementById("Liste_demmande").style.display = "none ";

            document.getElementById("Liste_enseignant").style.display = "none";
           
        }

   
        $(document).ready(function() {

           





            $(document).on("click",".btn-info",function(e){
            var id_e=$(this).data("id");
            var tab=new Array();
            tab[0]=0;
tab[1]=0;
tab[2]=0;
tab[3]=0;
tab[4]=0;
var s=0;

                 
                var inputElements = document.getElementsByClassName(id_e);
                
               
                for(var i=0; inputElements[i]; ++i){
                    
      if(inputElements[i].checked){
          
           tab[s]=1;
           
           
     
        }
        s++;
                }
                
    
    
                $.ajax({
                   url:"Post_Niveaux_Enseignant.php",
                   type:"POST",
                   data :{id_e:id_e,tab1:tab[0],tab2:tab[1],tab3:tab[2],tab4:tab[3],tab5:tab[4]},
                   success: function(data){
                        /*alert(data);*/
                        alert("succès de l'opération");
                   }

                });
            
            });
              
            $("#edite").on("click",function(e){
    $.ajax({

        url:"getEnseignat_Edite.php",
        type:"POST",
        success: function(data){
            $("#contact").html(data);
              
        }
            
    });

   });       

            function loadDemande() {
                $.ajax({
                    url: "GetListDemande.php",
                    type: "POST",

                    success: function(data) {
                        alert(data);
                        $("#Liste_demmande").html(data);

                    }


                });
            }

            function loadList() {
                $.ajax({
                    url: "GetListEnseignant.php",
                    type: "POST",

                    success: function(data) {

                        $("#Liste_enseignant").html(data);

                    }


                });
            }

            $(document).on("click", ".btn-warning", function(e) {
                var id_e = $(this).data("id");
                $.ajax({
                    url: "BlockEnseignant.php",
                    type: "POST",
                    data: {
                        id_e: id_e
                    },
                    beforeSend: function() {
                        $("#"+id_e).hide();
                        document.getElementById("btn_l").style.width = "100%";
                        $("."+id_e).show();
                        
                    },
                    complete: function() {
                        $("."+id_e).hide();
                        $("#"+id_e).show();
                    },

                    success: function(data) {

                        loadList();
                    }
                })
            });

            $(document).on("click", ".btn-danger", function(e) {
                var id_e = $(this).data("id_d");
                alert(id_e);
                $.ajax({
                    url: "suppEnseignant.php",
                    type: "POST",
                    data: {
                        id_e:id_e
                    },

                    success: function(data) {
                        /*alert(data);*/
                        loadDemande();
                       
                    }
                })
            });



            $("#deconnexion").on("click", function(e) {
                $.ajax({

                    url: "deconnexion.php",
                    type: "POST",
                    success: function(data){
                        window.location.href="../Loginadmin/Login";
                    }
                });
            });




            $(document).on("click", ".btn-success", function(e) {
                var id_e = $(this).data("id");
                $.ajax({
                    url: "activerEnseignant.php",
                    type: "POST",
                    data: {
                        id_e: id_e
                    },
                    beforeSend: function() {
                        $("#"+id_e).hide();
                        /*document.getElementById("btn_l").style.width = "100%";*/
                        $("."+id_e).show();
                    },
                    complete: function() {
                        $("#"+id_e).hide();
                    },
                    success: function(data) {
                        
                        loadDemande();
                    }
                })
            });
            $("#list").on("click", function(e) {

                $.ajax({
                    url: "GetListEnseignant.php",
                    type: "POST",

                    success: function(data) {

                        $("#Liste_enseignant").html(data);

                    }


                });

            });
            $("#demande").on("click", function(e) {

                $.ajax({
                    url: "GetListDemande.php",
                    type: "POST",
                    success: function(data) {

                        $("#Liste_demmande").html(data);

                    }


                });


            });



            $("#ajaut").on("click", function(e) {
                var email = $("#exampleFormControlInput1").val();
                var password = $("#exampleFormControlInput3").val();
                var username = $("#exampleFormControlInput2").val();
                var module3 = $("#exampleFormControlInput4").val();

                var etats = $("#exampleDataList").val();
                $.ajax({
                    url: "AddEnseignant.php",
                    type: "POST",
                    data: {
                        email1: email,
                        password1: password,
                        username1: username,
                        module1: module3,
                        etats1: etats
                    },
                    success: function(data) {
                        if (data == 1) {

                            document.getElementById("alert1").style.display = "block ";
                            document.getElementById("alert2").style.display = "none ";
                        } else {

                            document.getElementById("alert2").style.display = "block ";
                            document.getElementById("alert1").style.display = "none ";
                        }

                    }
                });

            });


            
          






      







        });

        
        




    </script>

    </html>


<?php



} else {
    header("Location:../loginadmin/login.php ");
}
?>