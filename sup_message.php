<?php
session_start();
include('fonctions.php');

if(verif_admin() && isset($_GET['id'])) // Si l'utilisateur est admin et que l'ID du message est renseigné, alors on supprime le message de la BDD
{
	supprimer_message($_GET['id']);
	header("location:liste_messages.php");
} else header("location:index.php");



?>