<?php
	include("../M/db.php");
	$id = $_GET['id'];
	$value = $_GET['valeur'];

	if($value == 0){
		$luu = 1;
		$req = $conn->query("UPDATE partenaire SET lu = '$luu'  WHERE id = '$id' ");
		header('location: partenaires.php');
	}
?>