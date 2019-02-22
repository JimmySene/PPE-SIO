<?php $titrePage = "Ajouter un partenaire";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['nom'])) { // Si un nouveau partenaire a été envoyé

		ajouter_partenaire($_POST['nom'], $_POST['type']);

		header('location:liste_partenaires.php');
		
	} else { // Sinon on affiche le formulaire d'ajout ?>

        
		<h1 class="display-4">Ajouter un partenaire</h1>
		<hr />
	
		<form action="ajout_partenaire.php" method="post">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" /></p>
            <p class="form-group"><label for="type">Type : </label><input type="text" name="type" id="type" class="form-control" /></p>

			<p><input type="submit" value="Ajouter le partenaire" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>