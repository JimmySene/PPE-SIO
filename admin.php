<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-4 centretexte">Panneau d'administration</h1>

<div id="bouton">
  <a href="liste_clients.php" class="boutons blue">Les clients</a>
  <a href="liste_messages.php" class="boutons green">Les messages</a>
  <a href="liste_produits.php" class="boutons red">Les produits</a>
  <a href="liste_categories.php" class="boutons purple">Les catégories</a>
  <a href="liste_marques.php" class="boutons orange">Les marques</a>
</div>

<?php 
 } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>
