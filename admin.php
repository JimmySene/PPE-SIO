<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>

<div class="planbleus">
  <div class="menuadmin">

    <h1 class="display-4 centretexte">Panneau d'administration</h1>

    <div id="bouton">
      <a href="liste_clients.php" class="boutons orange">Les clients</a>
      <a href="liste_messages.php" class="boutons orange">Les messages</a>
      <a href="liste_produits.php" class="boutons orange">Les produits</a>
      <a href="liste_categories.php" class="boutons orange">Les catégories</a>
      <a href="liste_marques.php" class="boutons orange">Les marques</a>
      <a href="#.php" class="boutons orange">Les Salles</a>
      <a href="#.php" class="boutons orange">Les Partenaires</a>
    </div>
  </div>
</div>
<?php 
 } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>
