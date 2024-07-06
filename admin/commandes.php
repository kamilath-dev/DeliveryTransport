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
               <a class="logo"><h2>LISTE DES COMMANDES</h2></a>
               
            </nav>
         </div>
      </div>
      


      <div style="margin-top: -20px;" class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <table style="text-align: center;" class="table">
                    <thead>
                        <tr>
                            <th>Titre de la Livraison</th>
                            <th>Date de demande de Livraison</th>
                            <th>Details de commande</th>
                            
                            <th><div>Affectation de livreur</div></th>
                        </tr>
                    </thead>
                    <?php
                                          $texte = "En attente";
                                            include("../M/db.php");
                                            $req = $conn->query("SELECT * FROM livraisons WHERE statut = '$texte' ");
                                            while($rr = $req->fetch()){
                                          
                                                ?>
                                                    <tbody style="text-align: center;">
                                              <tr>
                                                  <td>
                                                      <a href="javascript:void(0);"><?= $rr['titre'] ;?></a>
                                                  </td>
                                                  
                                                  
                                                  <td>
                                                      <?= $rr['date_commande'] ;?>
                                                  </td>
                                                  
                                                  <td>
                                                   <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Validation<?= $rr['id_livraison']; ?>">
                            Voir
                                                          
                        </button>
                                                      
                                                  </td>
                                                  <td><button style="background-color: black; color:white; border: 1px solid black;" type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Choisir<?= $rr['id_livraison']; ?>">
                            Choisir
                                                          
                        </button></td>
                                              </tr>
                                          </tbody>

                                          <div class="modal fade" id="Validation<?= $rr['id_livraison']; ?>" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Livraison  <?= $rr['code_livraison']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item justify-content-between align-items-start">
                         
                                <span style="font-weight:bold;">Nom du Colis :</span> <?= $rr['titre']; ?><br>
                                <span style="font-weight:bold;">Description du Colis :</span> <?= $rr['description']; ?><br>
                                <span style="font-weight:bold;">Adresse de prise de colis :</span> <?= $rr['debut'] ;?><br>
                                <span style="font-weight:bold;">Adresse de livraison :</span> <?= $rr['fin'] ;?><br>
                                <span style="font-weight:bold;">Numéro à contacter :</span> <?= $rr['num'] ;?>

                         
                        </li><br><br>
                        
                            




                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Choisir<?= $rr['id_livraison']; ?>" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Choisir un livreur pour la livraison</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>

                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item justify-content-between align-items-start">
                         
                                <form method="POST">
                                   <select class="form-control" name="livreur">
                                 <option disabled selected hidden>Cliquez pour choisir un Livreur</option>
                                   <?php 
                                       include("../M/db.php");
                                            $liv = $conn->query("SELECT * FROM livreur WHERE statut = 0 ");
                                            while($li = $liv->fetch()){
                                             $idlivreur = $li['id_livreur'];
                                             ?>
                                                <option value="<?= $li['id_livreur'] ;?>"><?= $li['name_first_name'] ;?></option>
                                             <?php
                                            }
                                   ?>
                                </select><br><br>
                                <div style="text-align:center;"><input style="padding: 5px; font-weight:bold;" class="btn btn-sm btn-info" type="submit" name="va" value="Valider"></div>
                                </form>

                                <?php 
                                $livraison = $rr['id_livraison'];
                                 if(isset($_POST['va'])){
                                    $id_livreur = $_POST['livreur'];
                                    $mod = $conn->query("UPDATE livreur SET statut = '1', livraison = '$livraison' WHERE id_livreur = '$id_livreur' ");
                                 }
                                ?>

                         
                        </li>
                       
                            




                    </ul>
                </div>
            </div>
        </div>
    </div>
                                                <?php


                                            }
                                          ?>
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