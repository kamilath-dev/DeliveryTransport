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
               <div id="mySidenav" class="sidenav">
                  <a style="background-color: white; color:red; font-weight:bold; width:100px;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br><br><br>
                  <div style="background-color:white; color:black; font-size:25px;padding:5px; font-weight: bold;">UTILISATEURS</div>
                  <a href="liste.php">Nos utilisateurs</a>
                  <a href="commandes.php">Les Commandes</a>
                  <a href="partenaires.php">Demandes de partenariat</a>
                  <a href="emplois.php">Demandes d'emplois</a>

                  <div style="background-color:white; color:black; font-size:25px;padding:5px; font-weight: bold;">CHAUFFEURS</div>
                  <a href="chauffeurs.php">Liste Chauffeurs</a>

                  <div style="background-color:white; color:black; font-size:25px;padding:5px; font-weight: bold;">FINANCES</div>
                  <a href="paiements.php">Paiements</a>
                  <a href="rapport_finance.php">Rapports Financiers</a>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="assets/toggle-icon.png"></span>
               <a class="logo"><h2>DEMANDES D'EMPLOIS</h2></a>
               
            </nav>
         </div>
      </div>
      


      <div style="margin-top: -20px;" class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <table style="text-align: center;" class="table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom et Prénoms</th>
                            <th>Numéro</th>
                            <th>Adresse Email</th>
                            <th>Poste</th>
                            <th>CV</th>
                            <th><div style="display: flex; margin:auto; "><div>QUE FAIRE ?</div><div><img width="20px" height="20px" src="assets/rire.png"></div></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("../C/traitements.php");
                            Afficher_liste_emplois();
                        ?>
                    </tbody>
                </table>
            </div>
         </div>
         
      </div>

      //<?php
      //$j = new DateTime('2021/05/22');
      //$r = new DateTime('2024/05/17');
         //$re = $j->diff($r);
         //$jours = $re->days;

         //echo $jours;
         
      //?>
     
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