<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>ADMIN</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">

      <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
   </head>
   <body>
     
      <!-- header section start -->
      <div  class="header_section">
         <div style="background-color:white; position:fixed;" class="container-fluid">
            <nav  class="navbar navbar-light bg-light justify-content-between">
              
               <a href="emplois.php"><span class="toggle_icon" ><img src="assets/toggle-icon.png"></span></a>
               <a class="logo"><h2>DEMANDES D'EMPLOIS</h2></a>
               
            </nav>
         </div>
      </div>
      

<br><br><br>
      <div class="" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div style="font-family: italic;" class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:green; font-weight:bold;" class="modal-title">APPROBATION DE DEMANDE D'EMPLOI</h5>
                    
                </div>
                <div class="modal-body">
                    <section class="comp-section">
                        <p style="font-size:25px; text-align:center;">Choisir la date et l'heure de l'entretient avec  <span style="font-weight:bold;"><?= $_SESSION['nom'];?></span> </p><br>

                        <form method="POST">
                            <div style="display:flex; width: 40%; justify-content: space-between; margin:auto;">
                                <script>
                                    function validerInput(input){
                                        if(input.value.length > 4){
                                            input.value.slice(0,4);
                                        }
                                    }
                                    function validerInputt(input){
                                        if(input.value.length > 2){
                                            input.value.slice(0,2);
                                        }
                                    }
                                </script>
                                <div> 
                                <span style="font-weight:bold; font-size: 20px; text-align: center;">Date</span>
                                    <div style="display:flex;">
                                        <div><input style="width:100%;" class="form-control" type="number" name="year" placeholder="2024" max=2050 oninput="validerInput(this)"></div>
                                        <div><input style="width:100%;" class="form-control" type="number" name="month" max=12 oninput="validerInputt(this)" placeholder="06"></div>
                                        <div><input style="width:100%;" class="form-control" type="number" name="days" max=31 oninput="validerInputt(this)" placeholder="12"></div>
                                    </div>
                                </div>
                                <div><span style="font-weight:bold; font-size: 20px;">Heure</span> <input style="width:100%;" class="form-control" type="time" name="heu"></div>
                            </div><br>
                            <p style="text-align:center; font-size: 20px;">Apres Validation, il recevra le mail de confirmation de rendez-vous prévue pour la date et à l'heure inscrits ci-dessus, dans vos locaux.</p><br>
                            <div style="text-align:center;">
                                <input style=" background-color:green; border: none; color:white; font-weight:bold;  padding: 10px;" type="submit" name="env" value="VALIDER">
                            </div>

                        </form>

                        <?php 
                        include("../M/db.php");
                            if(isset($_POST['env']) AND isset($_POST['year']) AND isset($_POST['month']) AND isset($_POST['days']) AND isset($_POST['heu'])){
                                $year = $_POST['year'];
                                $month = $_POST['month'];
                                $days = $_POST['days'];
                                $dat = $year."/".$month."/".$days;
                                $heu = $_POST['heu'];
                                
                                $id = $_GET['id'];

                                $in = $conn->query("INSERT INTO program(id_person, dat, heure)VALUES('$id', '$dat', '$heu')");

                                $up = $conn->query("UPDATE postuler SET statut = 1 WHERE id = '$id' ");

                                
                            }
                        ?>

                        
                    </section>
                </div>
            </div>
        </div>
    </div>

     
     
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "100%";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
      </script> 
      <script src="assets/js/bootstrap.bundle.min.js"></script>
     
   </body>
</html>