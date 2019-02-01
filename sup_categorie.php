<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id'])) // Si l'utilisateur est admin et que l'ID du produit est renseigné, alors on supprime la catégorie de la BDD
{
	supprimer_categorie($_GET['id']);
	header("location:liste_categories.php");
} else header("location:index.php");



?>