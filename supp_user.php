<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id']))
{
	$id = $_GET['id'];
	$con  = sql_connect();
	$req = "DELETE FROM client WHERE id = '$id'";
	mysqli_query($con,$req);

	header("location:admin.php");
} else header("location:index.php");



?>