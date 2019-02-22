<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id'])) // Si l'utilisateur est admin et que l'ID de la salle est renseigné, alors on supprime la salle de la BDD
{
	supprimer_salle($_GET['id']);
	header("location:liste_salles.php");
} else header("location:index.php");



?>