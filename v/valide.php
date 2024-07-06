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

    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>

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
    
<section  class="contact-us-section ptb-100">
        <div  class="container contact">
            <div class="col-12 pb-3 message-box d-none">
                <div class="alert alert-danger"></div>
            </div>
            <div class="row justify-content-around">
                <?php
                    $code = strtoupper(substr(md5(uniqid().rand(0,10000)), 0, 10));
                    $client = $_SESSION['num'];
                    $num = $_SESSION['num'];
                    $depart = $_SESSION['depart'];
                    $livraison = $_SESSION['livraison'];
                    $date_commande = date("Y-m-d");
                    $statut = "En attente";
                    $titre = $_SESSION['titre'];
                    $description = $_SESSION['description'];
                    $ecart = $_SESSION['ecart'];
                    $valeur = $ecart/5;

                    function roundCustom($valeur) {
                        if ($valeur != floor($valeur)) {
                                return ceil($valeur);
                        }else{
                            return $valeur;
                        }
                    }
                    $prix = roundCustom($valeur) * 500;
                  
                ?>
                <div style="width:90%;" class="col-md-6">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                        <h2 style="text-decoration: 5px orangered underline;">Récapitulatif</h2><br>
                            <h6>Code de Livraison : <span style="background-color:black; color:white; font-weight: bold; padding:5px;"><?= $code ;?></span></h6><br>
                            <div style="text-align: center;"><span style="font-weight:bold;">----------Date : <?= $date_commande ;?>----------</span></div> <br>

                            <table>
                                <tr>
                                    <th>Nom du Colis</th>
                                    <td><?= $titre ;?></td>
                                </tr>
                                <tr>
                                    <th>Description du Colis</th>
                                    <td><?= $description ;?></td>
                                </tr>
                                <tr>
                                    <th>Adresse de prise de colis</th>
                                    <td><?= $depart ;?></td>
                                </tr>
                                <tr>
                                    <th>Adresse de livraison</th>
                                    <td><?= $livraison ;?></td>
                                </tr>
                                <tr>
                                    <th>Numéro à contacter</th>
                                    <td><?= $num ;?></td>
                                </tr>
                                <tr style="background-color:black; color:white;">
                                    <th>NET A PAYER</th>
                                    <td style="font-weight: bold;"><?= $prix." FCFA" ;?></td>
                                </tr>
                                
                            </table>

                            
                                
                                
                            
                    </div>
                </div>

                <div style="text-align: center;" class="col-sm-12 mt-3">
                                      <button style="background-color:green; color:white; font-weight: bold; border:none; padding: 5px;" class="pay-btn" data-transaction-amount="<?= $prix ;?>" data-transaction-description="Acheter mon produit" data-customer-email="johndoe@gmail.com" data-customer-lastname="Doe">Passer au Paiement</button>
  
                                    <script type="text/javascript">
                                        
                                        FedaPay.init('.pay-btn', { public_key: 'pk_sandbox_pFHbVBjEj84bBrpShDAdMolo' });
                                    </script>  
                                </div>
            </div>
        </div>
    </section>

    <style>
        .hidden {
            display: none;
        }
    </style>
    <form id="invisibleForm" class="hidden" action="valide.php" method="post">
        <input type="text" name="champ1" value="valeur1">
        <input type="text" name="champ2" value="valeur2">
    </form>

    <script>
        window.onload = function() {
            // Vérifiez si le formulaire a déjà été soumis
            if (!sessionStorage.getItem('formSubmitted')) {
                // Soumettez le formulaire
                document.getElementById("invisibleForm").submit();
                // Marquez le formulaire comme soumis
                sessionStorage.setItem('formSubmitted', 'true');
            }
        }
    </script>
    <?php
    include("../M/db.php");
       $sql = "INSERT INTO livraisons (code_livraison, num, debut, fin, date_commande, statut, titre, description)
            VALUES (:code, :num, :depart, :livraison, :date_commande, :statut, :titre, :description)";
$stmt = $conn->prepare($sql);

        $stmt->execute([
        ':code' => $code,
        ':num' => $num,
        ':depart' => $depart,
        ':livraison' => $livraison,
        ':date_commande' => $date_commande,
        ':statut' => $statut,
        ':titre' => $titre,
        ':description' => $description,
    ]);

    ?>


       

       
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
<style type="text/css">
    table{
        border: 1px solid black;
        border-collapse: collapse;
        margin: auto;
        text-align: center;
        width: 100%;
    }
    tr,th,td{
        border: 1px solid black;
        padding: 7px;
        text-align: center;
    }
    th{
        font-weight: bold;
    }
</style>