<?php

function Inscription_admin()
{
	include("../M/db.php");
	if($_POST){
        if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $mdp = $_POST['password'];
            $password = password_hash($mdp, PASSWORD_DEFAULT);

            $insert = $conn->query("INSERT INTO admin(email_adress, password)VALUES('$email', '$password')");

            if($insert){
                header("location: index.php");  
            }
        }
    }
}

function Connexion_admin()
{
	include("../M/db.php");
	if (isset($_POST["connect"])) {
    
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {

        $email = $_POST["email"];
        $password = $_POST['password'];

        // Check if user exists
        $result = $conn-> query("SELECT password FROM admin WHERE email_adress = '$email'");
        $to = $result->fetch();
        $lignes = $result->rowCount();
        if ($lignes > 0) {
                       
            // Verify password
            if ($result &&  password_verify($password, $to['password'])) {
                header('Location: admin.php');
            } else {
            	?>
            		<div style="color:red; font-weight:bold; text-align: center; font-size: 20px;">Mot de passe ou Email incorrect</div>
            	<?php
            }
        } else {
        	?>
            	<div style="color:red; font-weight:bold; text-align: center; font-size: 20px;">L'utilisateur n'existe pas.</div>
            <?php
        }
    }   
}
}

function Inscription_user()
{
    include("../M/db.php");
    if($_POST){
        if (isset($_POST['ins']) && isset($_POST['nom']) && isset($_POST['num']) && isset($_POST['adresse']) && isset($_POST['mdp1']) && isset($_POST['mdp2'])) {
            $nom = $_POST['nom'];
            $num = $_POST['num'];
            $adresse = $_POST['adresse'];
            $mdp1 = $_POST['mdp1'];
            $mdp2 = $_POST['mdp2'];
            
            if($mdp1 == $mdp2){
                $password = password_hash($mdp1, PASSWORD_DEFAULT);

            $insert = $conn->query("INSERT INTO user(name_first_name, num, mail_adress, password)VALUES('$nom', '$num', '$adresse', '$password')");

            if($insert){
                header("location: login.php");  
            }
            }else{
                ?>
                    <div style="color:red; background-color: white; padding: 5px; width: 30%; margin: auto; font-weight:bold; text-align: center; font-size: 20px;">Mot de passe non identiques</div>
                <?php
            }
        }
    }
}

function Connexion_user()
{
    include("../M/db.php");
    if (isset($_POST["ins"])) {
    
   if (!empty($_POST["num"]) && !empty($_POST["mdp"])) {

        $num = $_POST["num"];
        $password = $_POST['mdp'];

        // Check if user exists
        $result = $conn-> query("SELECT password FROM user WHERE num = '$num'");
        $to = $result->fetch();
        $lignes = $result->rowCount();
        if ($lignes > 0) {
                       
            // Verify password
            if ($result &&  password_verify($password, $to['password'])) {
                session_start();
                $_SESSION['num'] = $num;
                header('Location: index.php');
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
}
}

function Afficher_liste_user()
{
   include("../M/db.php");
   $result = $conn-> query("SELECT * FROM user ");
   while ($aff = $result->fetch()) {
       ?>
            <tr>
                <td><?= $aff['id_user'] ;?></td>
                <td  scope="row"><?= $aff['name_first_name'] ;?></td>
                <td ><?= $aff['num'] ;?></td>
                <td ><?= $aff['mail_adress'] ;?></td>
            </tr>
       <?php
   }
}

function Afficher_liste_partenaire()
{
   include("../M/db.php");
   $result = $conn-> query("SELECT * FROM partenaire ORDER BY id DESC");
   while ($aff = $result->fetch()) {
       ?>
            <tr>
                <td><?= $aff['id'] ;?></td>
                <td  scope="row"><?= $aff['nom']." ".$aff['prenom'] ;?></td>
                <td ><?= $aff['contact'] ;?></td>
                <td ><?= $aff['email'] ;?></td>
                <td ><?= $aff['objet'] ;?></td>
                <td ><?= $aff['message'] ;?></td>
                <td id="<?= $aff['id'] ;?>">
                    <?php
                        if($aff['lu'] == 0){
                            ?><a style="padding: 5px; font-weight: bold; color: white; background-color:green;" href="con.php?id=<?= $aff['id'] ;?>&&valeur=<?= $aff['lu'] ;?>">Marquer LU</a><?php
                        }else{
                            ?><a style="padding: 5px; font-weight: bold; color: white; background-color:black;" href="conf.php?id=<?= $aff['id'] ;?>&&valeur=<?= $aff['lu'] ;?>">Marquer NON LU</a><?php
                        }
                    ?>
                </td>
            </tr>
       <?php
   }
}

function Afficher_liste_emplois()
{
   include("../M/db.php");
   $result = $conn-> query("SELECT * FROM postuler ");
   while ($aff = $result->fetch()) {
       ?>
            <tr>
                <td><?= $aff['id'] ;?></td>
                <td  scope="row"><?= $aff['nom']." ".$aff['prenom'] ;?></td>
                <td ><?= $aff['contact'] ;?></td>
                <td ><?= $aff['email'] ;?></td>
                <td ><?= $aff['poste'] ;?></td>
                <td><a style="background-color:dodgerblue; color:black; padding:10px; font-weight: bold;" href="../<?= $aff['cv'] ;?>">Voir CV</a></td>
                <td>
                    <div style="display:flex; justify-content:space-around;">
                        <div><button type="button" style="background-color:red; color:white; padding:5px; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#suppr<?= $aff['id'] ;?>"><img width="30px" height="30px" src="assets/refuse.png"></button></div>
                        <div>
                            <?php 
                                if($aff['statut'] == 0){
                                    $_SESSION['nom'] = $aff['nom']." ".$aff['prenom'];
                                    ?>
                                        <button type="button" style=" padding:5px; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#accepter<?= $aff['id'] ;?>"><img width="30px" height="30px" src="assets/valide.png"></button>
                                    <?php
                                }else{
                                    if($aff['statut'] == 1){
                                        ?>
                                        <button type="button" style=" padding:5px; font-weight: bold;" data-bs-toggle="modal" data-bs-target="#validation<?= $aff['id'] ;?>"><img width="30px" height="30px" src="assets/attente.png"></button>
                                    <?php
                                    }
                                }
                            ?>
                            
                        </div>

                    </div>
                </td>

                <div class="modal fade" id="suppr<?= $aff['id'] ;?>" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div style="font-family: italic;" class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:red;" class="modal-title">SUPPRESSION DE DEMANDE D'EMPLOI</h5>
                    <button style="font-size:50px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <section class="comp-section">
                        <p style="font-size:25px; text-align:center;">Êtes vous sûre de vouloir <span style="color:red;">Supprimer</span> de votre liste, la demande d'emploi de <span style="font-weight:bold;"><?= $aff['nom']." ".$aff['prenom'] ;?></span> <span style="font-size:35px; font-weight:bold;">?</span></p><br>

                        <div style="text-align:center;"><a style=" background-color:red; color:white; font-weight:bold;  padding: 15px;" href="supprimeremploi.php?id=<?= $aff['id'] ;?>">SUPPRIMER</a></div>

                        
                    </section>
                </div>
            </div>
        </div>
    </div>








    <div class="modal fade" id="validation<?= $aff['id'] ;?>" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div style="font-family: italic;" class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color:red;" class="modal-title">Jours restants pour le RDV</h5>
                    <button style="font-size:50px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <?php 
                    $id = $aff['id'];
                    $rec = $conn->query("SELECT dat FROM program WHERE id_person = '$id' ");
                    $fa = $rec->fetch();
                    $date = $fa['dat'];
                   
                    $date_jour = date("Y-m-d");
                   

                    $j = new DateTime($date);
                    $r = new DateTime($date_jour);
                    $re = $j->diff($r);

                    $jours = $re->days;
                ?>
                <div class="modal-body">
                    <section class="comp-section">
                        <p style="font-size:25px; text-align:center;">Le nombre de Jours restant pour le rendez-vous avec  <span style="font-weight:bold;"><?= $aff['nom']." ".$aff['prenom'] ;?></span> est :  <span style="font-size:35px; font-weight:bold;"><?= $jours ;?></span></p><br>

                        <div style="text-align:center;"><a style=" background-color:red; color:white; font-weight:bold;  padding: 15px;" href="supprimeremploi.php?id=<?= $aff['id'] ;?>">SUPPRIMER</a></div>

                        
                    </section>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="accepter<?= $aff['id'] ;?>" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div style="font-family: italic;" class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="color:green; font-weight:bold;" class="modal-title">VALIDATION DE POSTE</h3>
                    <button style="font-size:50px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                
                <div class="modal-body">
                    <section class="comp-section">
                        <p style="font-size:25px; text-align:center;">Voulez vous vraiment accepter <span style="font-weight:bold;"><?= $aff['nom']." ".$aff['prenom'] ;?></span> au sein de SEED SARL en tant que  <span style="font-size:25px; font-weight:bold;"><?= $aff['poste'] ;?></span></p><br>


                        <div style="text-align:center;">
                            <form method="POST">
                                <a href="accepter.php?id=<?= $aff['id'] ;?>nom=<?= $aff['nom']." ".$aff['prenom']; ?>num=<?= $aff['contact'];?>email=<?= $aff['email'];?>password=livreur" style=" background-color:green; border: 1px solid green; color:white; font-weight:bold;  padding: 15px; color: white; font-weight: bold; ">OUI JE CONFIRME !</a>
                            </form>
                        </div>

                        

                    
                    </section>
                </div>
            </div>
        </div>
    </div>
    
            </tr>


       <?php
   }
}
?>