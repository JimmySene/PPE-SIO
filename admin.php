<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>



    <h1 class="display-4">Panneau d'administration</h1>
    <hr/>

    <div id="menu_admin">
      <a href="liste_clients.php" >Gérer les clients</a>
      <a href="liste_messages.php" >Gérer les messages reçus</a>
      <a href="liste_produits.php" >Gérer les produits</a>
      <a href="liste_categories.php" >Gérer les catégories des produits</a>
      <a href="liste_marques.php" >Gérer les marques</a>
      <a href="liste_partenaires.php" >Gérer les partenaires</a>
      <a href="liste_salles.php" >Gérer les salles</a>
    </div>
  

<?php 
 } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>
