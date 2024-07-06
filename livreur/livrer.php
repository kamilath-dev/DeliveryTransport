<?php
include("../M/db.php");
$id_livraison = $_GET['id_livraison'];
$mod = $conn->query("UPDATE livraisons SET statut = 'En cours'  WHERE id_livraison = '$id_livraison' ");
?>
                                <script>
                                    location.href = 'livreur.php';
                                </script>
                            <?php
?>