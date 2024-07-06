<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN_CONNECT</title>
    <!-- Inclure Bootstrap via le CDN -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    

    <div style="width:100%; top:0; color: white; background-color:rgb(40, 36, 36); position:fixed; padding:10px; text-align:center;">
        <h1>WELCOM TO ADMIN</h1>
    </div><br><br>

    <div class="container mt-5">
        <h2><a style="text-decoration:none;" href="ajout_admin.php">Connectez Vous</a></h2><br><br>

        <form  method="POST">
            <div style="box-shadow: 0px 0px 10px 10px rgb(163, 166, 168); padding: 50px; border-radius:10px;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Adresse email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec qui que ce soit.</div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                </div>
           
                <button type="submit" name="connect" class="btn btn-primary">Se Connecter</button>
            </div>
            
        </form><br>

        <?php
            include("../C/traitements.php");
            Connexion_admin();
        ?>
    </div>
   




  
    <script src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>
