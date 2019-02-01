<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id'])) // Si l'utilisateur est admin et que l'ID du produit est renseigné, alors on supprime la marque de la BDD
{
	supprimer_marque($_GET['id']);
	header("location:liste_marques.php");
} else header("location:index.php");



?>