<?php

include("../M/db.php");
$nom = $_GET['nom'];
$num = $_GET['num'];
$email = $_GET['email'];
$pasword = $_GET['passwor'];
$id = $_GET['id'];
                                $req = $conn->query("INSERT INTO livreur(name_first_name, num, mail_adress, password)VALUES('$nom', '$num', '$email', '$password')");

                                $ef = $conn->query("DELETE FROM postuler WHERE id = '$id' ");
                                 ?>
                                    <script>
                                        location.href = '../admin/emplois.php';
                                    </script>
                                <?php
                           
                        ?>