<?php
include("../M/db.php");
$id = $_GET['id'];
$req = $conn->query("DELETE FROM postuler WHERE id = '$id' ");
header('location: emplois.php');
?>