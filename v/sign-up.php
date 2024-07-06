<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Le Transporteur</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/img/3.jpg" />
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
    </head>
    <body  id="page-top">

       

        <!-- Navigation-->
        <nav style="position:fixed; width:100%; top:0;" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <img height="50px" width="100px" style="border-radius:50%;" src="../assets/img/logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../index.html">Acceuil</a></li>
                    <li class="nav-item"><a class="nav-link" href="../index.html#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="../index.html#demarrer">Demarrer</a></li>
                    <li class="nav-item"><a class="nav-link" href="../index.html#propos">A Propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="../index.html#contact">Nous Contacter</a></li>
                    <li class="nav-item"><a class="nav-link" href="../index.html#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Se Connecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        
    <br><br>
    <header style="height: 100%; background-color: dimgrey; padding-bottom: 50px;">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100">
                <div style=" height: 80%; color: white; box-shadow: 0px 0px 10px 10px rgb(163, 166, 168); width: 90%; padding-top: 20px; " class="container mt-5">
                    <?php
                        include("../C/traitements.php");
                        Inscription_user();
                    ?>
        <h1>S'inscrire </h1><br>
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom et Prénom</label>
                <input type="text" name="nom" class="form-control" id="" aria-describedby="emailHelp">
            </div><br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Numéro de Télephone</label>
                <input type="number" name="num" class="form-control" id="" aria-describedby="emailHelp">
            </div><br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse email</label>
                <input type="email" name="adresse" class="form-control" id="" aria-describedby="emailHelp">
                <div id="emailHelp" style="color:white;" class="form-text">Nous ne partagerons jamais votre email avec qui que ce soit.</div>
                
            </div><br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mdp1" class="form-control" id="">
            </div><br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirmez le Mot de passe</label>
                <input type="password" name="mdp2" class="form-control" id="">
            </div>
            
            <input type="submit" name="ins" value="Valider" class="btn btn-primary">
        </form><br>

        Vous avez déjà un Compte ? <a style="font-size: 20px;" href="login.php">Connectez-Vous ICI</a><br><br>
    </div>
            </div>
        </div>
    </header>
        

       <br><br>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js" ></script>

       
    </body>
</html>
