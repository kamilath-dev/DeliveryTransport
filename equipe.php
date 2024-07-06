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
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="tr/style.css">
    </head>
    <body id="page-top">

        <div style="text-align:center;" id="global-loader">
            <div class="whirly-loader"> </div>
        </div>

        <!-- Navigation-->
        <nav style="position:fixed; width:100%; top:0; z-index: 1;" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div style="height: 100%;" class="container">
           <img style="border-radius:50%" height="50" width="100" src="assets/img/logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="padding: 10px;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.html">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html#demarrer">Demarrer</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html#propos">A Propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html#contact">Nous Contacter</a></li>
                        <li class="nav-item"><a class="nav-link" href="postuler.php">Partenariat</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.html#faq">FAQ</a></li>
                       
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
                        <h2>REJOIGNEZ NOTRE ÉQUIPE MAINTENANT !</h2>
                        <p class="lead">A la recherche de futurs collaborateurs passionnés et déterminés pour partager la vision de LETRANSPOTEUR.</p>

                    

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                        <?php
                            include("M/db.php");
                            if($_POST){
            if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['poste']) && isset($_FILES['cv'])){

            
            $nom=htmlspecialchars(addslashes(strip_tags(trim($_POST['nom']))));
            $prenom=htmlspecialchars(addslashes(strip_tags(trim($_POST['prenom']))));
            $email=htmlspecialchars(addslashes(strip_tags(trim($_POST['email']))));
            $contact=htmlspecialchars(addslashes(strip_tags(trim($_POST['contact']))));
            $poste=htmlspecialchars(addslashes(strip_tags(trim($_POST['poste']))));

        
            $file_name = $_FILES['cv']['name'];
            $file_type = strrchr($file_name,'.');
            $file_size = $_FILES['cv']['size'];
            $file_tmp = $_FILES['cv']['tmp_name'];
            $file_error = $_FILES['cv']['error'];
            $file_dest = "upload/".$_POST['nom'].$_POST['prenom'].$file_type;
            $extension_auth = array(".pdf", ".PDF");
            if(in_array($file_type, $extension_auth)){
            if(move_uploaded_file($file_tmp,$file_dest)){

                       

                $insert = "INSERT INTO postuler (nom ,prenom, email, contact, poste, cv) VALUES (:nom, :prenom,  :email, :contact, :poste, :cv)";
                                    $stmt = $conn->prepare($insert);

                                    $stmt->bindParam(':nom', $nom); 
                                    $stmt->bindParam(':prenom', $prenom); 
                                    $stmt->bindParam(':email', $email); 
                                    $stmt->bindParam(':contact', $contact); 
                                    $stmt->bindParam(':poste', $poste); 
                                    $stmt->bindParam(':cv', $file_dest); 

                                    if ($stmt->execute()) {

                                        ?>
                                            
                        <div style="color:green; font-weight:bold; text-align: center; font-size: 20px;">Votre demande a été pris en compte.<br>Vous aurez un retour par mail.<br><img width="100px" height="100px" src="assets/img/mail.png"></div><br>
                    
                                        <?php

                                    }
                                   
                
                }else{
                    echo 'ECHOUE';
                }
                }else{
                    ?>
                        <div style="color:red; font-weight:bold; text-align: center; font-size: 20px;">Extension du fichier nom compatible</div><br>
                    <?php
                }
                }
                }
                        ?>
                        <h4>Remplissez ce formulaire</h4>
                        <form  method="POST" id="contactForm" enctype="multipart/form-data" class="contact-us-form">

                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nom" placeholder="Nom " required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="prenom" placeholder="Prénom " required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Adresse E-mail">
                                    </div>
                                </div>
                                
                                <div class="col-12" data-wow-offset="50" data-wow-delay=".30s">      
                                    <div class="form-group"> 
                                        <input type="text" name="contact" id="phone" required="required" placeholder="N° de Téléphone " class="form-control"> 
                                    </div>
                                </div>

                                <script>
                                    const phoneInputField = document.querySelector("#phone");
                                    const phoneInput = window.intlTelInput(phoneInputField, {
                                        utilsScript:
                                            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                                    });
                                </script>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Deposer votre CV en format PDF</label>
                                        <input type="file" class="form-control" name="cv" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="poste" class="form-control" required="required">
                                            <option value="" disabled selected>Je postule pour le poste de: </option>
                                            <option value="Coursier/Livreur">Coursier/Livreur</option>
                                            <option value="Coursier/Chauffeur">Coursier/Chauffeur</option>
                                            <option value="Commercial(e)">Commercial(e)</option>
                                            <option value="Assistant(e)_Administratif(ve)">Assistant(e)
                                                Administratif(ve)</option>
                                            <option value="Manager_Pays">Manager Pays</option>
                                            <option value="Chef_Projet">Chef Projet</option>
                                            <option value="Responsable_des_Ressources_Humaines">Responsable des
                                                Ressources Humaines</option>
                                            <option value="Assistant(e)_comptable">Assistant(e) comptable
                                            </option>
                                        </select>
                                    </div>   
                                </div>

                                
                                <div class="col-sm-12 mt-3">
                                    <input type="submit" class="btn secondary-solid-btn" id="btnContactUs" value="SOUMETTRE MA CANDIDATURE">                                    
                                </div>
                            </div>
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
       
       
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

        <script src="styles/jquery-3.6.0.min.js"></script>
        <script src="styles/feather.min.js"></script>
        <script src="styles/script.js"></script>

 
<!--Bootstrap js-->
<script src="tr/js/bootstrap.min.js"></script>


<!--jquery easypiechart-->

    </body>
</html>
