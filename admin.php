<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>

<div class="planbleus">
  <div class="menuadmin">


    <h1 class="display-4 centretexte">Panneau d'administration</h1>

    <div id="bouton">
      <a href="liste_clients.php" class="boutons orange">Gérer les clients</a>
      <a href="liste_messages.php" class="boutons orange">Gérer les messages reçus</a>
      <a href="liste_produits.php" class="boutons orange">Gérer les produits</a>
      <a href="liste_categories.php" class="boutons orange">Gérer les catégories des produits</a>
      <a href="liste_marques.php" class="boutons orange">Gérer les marques</a>
      <a href="liste_partenaires.php" class="boutons orange">Gérer les partenaires</a>
      <a href="liste_salles.php" class="boutons orange">Gérer les salles</a>
    </div>
  </div>
</div>

<?php 
 } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>
