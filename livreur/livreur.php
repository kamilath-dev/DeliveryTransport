<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Espace Livreur</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/icons/ionic/ionicons.css">

    <link rel="stylesheet" href="assets/css/style.css">

   
</head>

<body>
    
    <div class="main-wrapper">

        <div class="header">

            <div class="header-left active">
                <h3 style="font-weight:bold;">DEMANDES DE LIVRAISONS</h3>
            </div>

            

            <ul class="nav user-menu">

                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                        <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                            <span class="status online"></span></span>
                    </a>
                    <div class="dropdown-menu menu-drop-user">
                        <div class="profilename">
                            <div class="profileset">
                                <span class="user-img"><img src="assets/img/profiles/avator1.jpg" alt="">
                                    <span class="status online"></span></span>
                                <div class="profilesets">
                                    <h6>John Doe</h6>
                                    <h5>Connecté</h5>
                                </div>
                            </div>
                            <hr class="m-0">
                          <a style="font-weight: bold;" class="dropdown-item" href="">Mes Livraisons En Cours</a>
                    <a style="font-weight: bold;" class="dropdown-item " href="">Mes Livraisons Terminées</a>
                            <a class="dropdown-item logout pb-0" href="signin.html"><img
                                    src="assets/img/icons/log-out.svg" class="me-2" alt="img">DECONNEXION</a>
                        </div>
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item logout pb-0" href="">Mes Livraisons En Cours</a>
                    <a class="dropdown-item logout pb-0" href="">Mes Livraisons Terminées</a>
                    <a class="dropdown-item logout pb-0" href=""><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">DECONNEXION</a>
                </div>

            </div>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="#"><img src="assets/img/icons/dashboard.svg" alt="img"><span>
                                    SEED SARL</span> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <section class="comp-section">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="section-header">
                                <h3 class="section-title">Demandes de livraisons en attente pour SEED SARL</h3>
                                <div class="line"></div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card bg-white mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table table-striped table-hover">
                                          <thead style="text-align: center;">
                                              <tr>
                                                <th>Titre de la Livraison</th>
                                                <th>Date de demande de Livraison</th>
                                                <th>Details de commande</th>
                                              </tr>
                                          </thead>
                                          <?php
                                          $texte = "En attente";
                                            include("../M/db.php");

                                            $id = $_SESSION['id_livreur'];
                                            $qr = $conn->query("SELECT * FROM livreur WHERE id_livreur = '$id' ");
                                            $vr = $qr->fetch();
                                            $dispo = $vr['statut'];
                                            $commande = $vr['livraison'];

                                            if($dispo == 1){
                                                $req = $conn->query("SELECT * FROM livraisons WHERE id_livraison = '$commande' ");
                                            while($rr = $req->fetch()){
                                                if($rr['statut'] == "En attente"){
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
                            <i class="fas fa-eye"></i> 
                                                          
                        </button>
                                                      
                                                  </td>
                                              </tr>
                                          </tbody>

                                          <div class="modal fade" id="Validation<?= $rr['id_livraison']; ?>" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Livraison </h5>
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
                        <div style="display:flex; width:50%; margin:auto; justify-content:space-between;">
                            <div><a style="background-color:green; color:white; font-weight:bold;" href="livrer.php?id_livraison=<?= $rr['id_livraison']; ?>" class="btn btn-sm btn-info">Accepter</a></div>
                            <div><a style="background-color:red; color:white; font-weight:bold;" href="livrer.php?id_livraison=<?= $rr['id_livraison']; ?>" class="btn btn-sm btn-info">Refuser</a></div>
                        </div>
                            




                    </ul>
                </div>
            </div>
        </div>
    </div>
                                                <?php


                                                }else{
                                                    if($rr['statut'] == "En cours"){
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
                            <i class="fas fa-eye"></i> 
                                                          
                        </button>
                                                      
                                                  </td>
                                                  <td><button style="background-color: black; color:white;" type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#Terminer<?= $rr['id_livraison']; ?>">
                            Marquer Terminer 
                                                          
                        </button></td>
                                              </tr>
                                          </tbody>

                                          <div class="modal fade" id="Validation<?= $rr['id_livraison']; ?>" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Livraison </h5>
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

    <div class="modal fade" id="Terminer<?= $rr['id_livraison']; ?>" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Demandez le code de livraison au client </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item justify-content-between align-items-start">
                         
                                
                            <form method="POST">
                                <label style="font-weight:bold;">Entrez le code</label>
                                   <input class="form-control" name="code">
                                 <br><br>
                                <div style="text-align:center;"><input style="padding: 5px; font-weight:bold;" class="btn btn-sm btn-info" type="submit" name="va" value="Terminer"></div>
                                </form>
                         
                        <?php 
                                $livraison = $rr['id_livraison'];
                                $pass = $rr['code_livraison'];

                                 if(isset($_POST['va'])){
                                    $re = $_POST['code'];
                                    if($re == $pass){
                                        $modi = $conn->query("UPDATE livreur SET statut = '0', livraison = '' WHERE id_livreur = '$id' ");

                                    $modif = $conn->query("UPDATE livraisons SET statut = 'Termine' WHERE id_livraison = '$commande' ");
                                }else{
                                    ?>
                                        <div style="text-align:center; color:red; font-weight:bold; font-size:20px;">Code Incorrect</div>
                                    <?php
                                }
                                    
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
                                                }
                                            }
                                            }else{
                                                ?>
                                                    <div style="text-align:center; color: grey; font-size:20px;">Aucune Livraison en attente</div>
                                                <?php
                                            }
                                          ?>
                                          
                                      </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </section>
        </div>

    </div>


    
    </div>
    </div>




    

    

    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/select2/js/custom-select.js"></script>

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/js/script.js"></script>

    
</body>

</html>