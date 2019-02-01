<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id'])) // Si l'utilisateur est admin et que l'ID du membre est renseigné, alors on supprime le membre de la BDD
{
	supprimer_client($_GET['id']);
	header("location:liste_clients.php");
} else header("location:index.php");



?>