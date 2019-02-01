<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id'])) // Si l'utilisateur est admin et que l'ID du produit est renseigné, alors on supprime le produit de la BDD
{
	supprimer_produit($_GET['id']);
	header("location:liste_produits.php");
} else header("location:index.php");



?>