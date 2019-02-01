<?php $titrePage = "Ajouter une catégorie";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['nom'])) { // Si une nouvelle catégorie a été envoyée

		ajouter_categorie($_POST['nom']);

		header('location:liste_categories.php');
		
	} else { // Sinon on affiche le formulaire de modification ?>

        
		<h1 class="display-4">Ajouter une catégorie</h1>
		<hr />
	
		<form action="ajout_categorie.php" method="post">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" /></p>

			<p><input type="submit" value="Ajouter la catégorie" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>