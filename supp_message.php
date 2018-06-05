<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id'])) // Si l'utilisateur est admin et que l'ID du message est renseigné, alors on supprime le message de la BDD
{
	$id = $_GET['id'];
	$con  = sql_connect();
	$req = "DELETE FROM contact WHERE id = '$id'";
	mysqli_query($con,$req);

	header("location:admin.php");
} else header("location:index.php");



?>