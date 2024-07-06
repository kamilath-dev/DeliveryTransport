<?php
	include("../M/db.php");
	$id = $_GET['id'];
	$value = $_GET['valeur'];

	echo $id;

	if($value == 1){
		$luu = 0;
		$req = $conn->query("UPDATE partenaire SET lu = '$luu'  WHERE id = '$id' ");
		header('location: partenaires.php');
	}
?>