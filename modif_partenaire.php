<?php $titrePage = "Modifier un partenaire";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['nom'])) { // Si un nouveau partenaire a été envoyé

		modifier_partenaire($_POST['id'], $_POST['nom'], $_POST['type']);
        
		header('location:liste_partenaires.php');
		
    } elseif(isset($_GET['id'])) { // Sinon on affiche le formulaire de modification
    
    $partenaire = mysqli_fetch_assoc(recup_partenaire_par_id($_GET['id'])); ?>

        
		<h1 class="display-4">Modifier un partenaire</h1>
		<hr />
	
		<form action="modif_partenaire.php" method="post">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" value="<?=$partenaire['nom']?>" /></p>
            <p class="form-group"><label for="type">Type : </label><input type="text" name="type" id="type" class="form-control" value="<?=$partenaire['type']?>" /></p>
            <input type="hidden" name="id" value="<?=$_GET['id']?>" />
			<p><input type="submit" value="Modifier le partenaire" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>