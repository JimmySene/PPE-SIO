<?php $titrePage = "Ajouter une marque";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['nom'])) { // Si une nouvelle marque a été envoyée

		ajouter_marque($_POST['nom']);

		header('location:liste_marques.php');
		
	} else { // Sinon on affiche le formulaire d'ajout ?>

        
		<h1 class="display-4">Ajouter une marque</h1>
		<hr />
	
		<form action="ajout_marque.php" method="post">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" /></p>

			<p><input type="submit" value="Ajouter la marque" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>