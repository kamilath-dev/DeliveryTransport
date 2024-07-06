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
                <div class="col-md-5">
                    <div class="contact-us-content">
                        <h2>Simplifiez vos envois avec Le Transporteur</h2>
                        <p class="lead">Faites confiance a notre expertise en transport et livraison et faites livrer vos colis en toute sécurité et dans les délais impartis

</p>

                    

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                        <h4>Remplissez ce formulaire</h4>
                        <form method="POST" class="contact-us-form">
                            <div class="form-row">
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="titre" placeholder="Titre de la livraison ">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea  class="form-control" name="description" placeholder="Description de la livraison "></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="num" placeholder="Numéro de personne à contacter" required="required">
                                    </div>
                                </div>
                                
                                

                                <script>
                                    const phoneInputField = document.querySelector("#phone");
                                    const phoneInput = window.intlTelInput(phoneInputField, {
                                        utilsScript:
                                            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                    });
                                </script>

                                

                                
                                <div class="col-sm-12 mt-3">
                                    <input style="background-color:orangered; color:white; border:none; padding: 5px;"   name="envoi" type="submit"  value="Suivant">
                                        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
                    if(isset($_POST['envoi']) AND isset($_POST['titre']) AND isset($_POST['description']) AND isset($_POST['num'])){
                            $client = $_SESSION['num'];
                           
                            $_SESSION['num'] = $_POST['num'];
                            $date_commande = date("Y-m-d");
                            $statut = "En cours";
                            $_SESSION['titre'] = $_POST['titre'];
                            $_SESSION['description'] = $_POST['description'];

                            ?>
                                <script>
                                    location.href = 'lieux.php';
                                </script>
                            <?php
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
