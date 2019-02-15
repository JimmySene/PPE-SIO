<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id'])) // Si l'utilisateur est admin et que l'ID du partenaire est renseigné, alors on supprime le partenaire de la BDD
{
	supprimer_partenaire($_GET['id']);
	header("location:liste_partenaires.php");
} else header("location:index.php");



?>