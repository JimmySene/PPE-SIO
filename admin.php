<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-4">Panneau d'administration</h1>
	
	<ul>
		<li><a href="liste_clients.php">Gérer les clients</a></li>
		<li><a href="liste_messages.php">Gérer les messages reçus</a></li>
		<li><a href="liste_produits.php">Gérer les produits</a></li>
		<li><a href="liste_categories.php">Gérer les catégories des produits</a></li>
		<li><a href="liste_marques.php">Gérer les marques</a></li>
	</ul>
<?php 
 } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>
