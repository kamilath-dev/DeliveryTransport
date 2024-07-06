<?php
session_start();
	include("../M/db.php");
	$id = $_GET['id'];
	$dat = $_GET['dat'];
	$heu = $_GET['heure'];
	
	echo $_SESSION['id'];
?>