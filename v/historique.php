<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Le Transporteur</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/3.jpg" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../tr/style.css">

        <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    </head>
    <body id="page-top">

        

        <!-- Navigation-->
        <nav style="position:fixed; width:100%; top:0; z-index: 1;" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div style="height: 100%;" class="container">
            <img style="border-radius:50%" height="50" width="100" src="../assets/img/logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="padding: 10px;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.html">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                        <li style=" background-color:white;" class="nav-item"><a style="color:red;" class="nav-link" href="deconnexion.php">Se Deconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- Masthead-->
        
       
<br><br>
    
<section class="contact-us-section ptb-100">
        <div class="container contact">
            <div class="col-12 pb-3 message-box d-none">
                <div class="alert alert-danger"></div>
            </div>
            <div class="row justify-content-around">
               
                <div style="width:100%;" class="col-md-6">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                        <h4>VOS LIVRAISONS</h4>
                        <?php
                        include("../M/db.php");
                                $num_user = $_SESSION['num'];
                                $req = $conn->query("SELECT * FROM livraisons WHERE client = '$num_user' ");
                                $li = $req->rowCount();
                                if($li > 0){
                                    ?>
                                <div style="width: 100%;" class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div style="width:100%;" class="card border-3 border-top border-top-primary">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Commande N°</th>
                                                <th>Date de Commande</th>
                                                <th>Statuts</th>
                                                <th>Titre de la Livraison</th>
                                            </tr>
                                        </thead>
                            <?php
                                while ($aff = $req->fetch()) {
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $aff['id_livraison'] ;?></td>
                                                        <td><?= $aff['date_commande'] ;?></td>
                                                        <td><?= $aff['statut'] ;?></td>
                                                        <td><?= $aff['titre_livraison'] ;?></td>
                                                    </tr>
                                                </tbody>
                                            <?php
                                }
                            ?>
                                
                                        
                                    </table>
                                </div>
                            </div>
                            <?php
                                }else{
                                    ?>
                                        <div style="font-size: 25px; font-weight:bold; text-align:center;">AUCUNE LIVAISON EFFECTUEE</div>
                                    <?php
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    


       
<h2 style="text-align:center;">CARTE GEOGRAPHIQUE</h2><br>
        <iframe style="width:100%" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4031787.2222341835!2d2.30937765!3d9.3073556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbj!4v1713420742527!5m2!1sfr!2sbj" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">CARTE</iframe>


        <hr>
       
            <div style="display:flex; justify-content:space-around; width: 90%; margin:auto;">
                <div>
                    <div style="text-align: center;"><a style="text-decoration: 2px underline; font-size:15px;" 
                href="V/ml.html">Mentions legales</a>   /    <a style="text-decoration: 2px underline; 
                font-size:15px;" href="V/cgv.html">Conditions générales de d'utilisation</a></div><br>

       
        <div style="text-align: center;"><a style="font-size:15px; text-decoration: 2px underline;" 
            href="V/pdp.html">Politique de données personnelles</a></div><br>
                </div>
                <div>
                    <h4>Adresse</h4><br>
                    Quartier Houéyihô, Ilot 1140, Parcelle J Cotonou (BENIN)<br>
 delivery.bj@letrans-porteur.com
                </div>
            </div>

            <hr>

        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2024 - Le transporteur</div></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="bootstrap/js/bootstrap.min.js" ></script>

        <script src="../styles/jquery-3.6.0.min.js"></script>
        <script src="../styles/feather.min.js"></script>
        <script src="../styles/script.js"></script>

 
<!--Bootstrap js-->
<script src="tr/js/bootstrap.min.js"></script>


<!--jquery easypiechart-->

    </body>
</html>
