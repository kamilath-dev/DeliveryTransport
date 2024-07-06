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
            
        </div>
    </nav>
        <!-- Masthead-->
        
       
<br><br>
    
<section class="contact-us-section ptb-100">
        <div class="container contact">
           
            <div class="row justify-content-around">
                
                <div class="col-md-6">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                        <h4>Se Connecter</h4>
                        <form method="POST" class="contact-us-form">
                            <div class="form-row">
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" name="email" placeholder="Adresse email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mdp" placeholder="Mot de passe">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12 mt-3">
                                    <input style="background-color:orangered; color:white; border:none; padding: 5px;"   name="envoi" type="submit"  value="Se Connecter">
                                        
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
                    include("../M/db.php");
    if (isset($_POST["envoi"])) {
    
   if (!empty($_POST["email"]) && !empty($_POST["mdp"])) {

        $email = $_POST["email"];
        $password = $_POST['mdp'];

        // Check if user exists
        $result = $conn-> query("SELECT * FROM livreur WHERE mail_adress = '$email'");
        $to = $result->fetch();
        $lignes = $result->rowCount();
        if ($lignes > 0) {
                       
           session_start();
                $_SESSION['id_livreur'] = $to['id_livreur'];
                header('Location: livreur.php');
            } else {
                ?>
                    <div style="color:red;background-color: white; padding: 5px; width: 30%; margin: auto; font-weight:bold; text-align: center; font-size: 20px;">Mot de passe incorrect</div>
                <?php
            }
        } else {
            ?>
                <div style="color:red;background-color: white; padding: 5px; width: 30%; margin: auto; font-weight:bold; text-align: center; font-size: 20px;">L'utilisateur n'existe pas.</div>
            <?php
        }
    }   

                ?>


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
