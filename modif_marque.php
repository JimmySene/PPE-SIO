<?php $titrePage = "Modifier une marque";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['nom'])) { // Si une nouvelle catégorie a été envoyée

		modifier_marque($_POST['id'], $_POST['nom']);

		header('location:liste_marques.php');
		
    } elseif(isset($_GET['id'])) { // Sinon on affiche le formulaire de modification 
    
    $marque = mysqli_fetch_assoc(recup_marque_par_id($_GET['id'])); ?>

        
		<h1 class="display-4">Modifier une marque</h1>
		<hr />
	
		<form action="modif_marque.php" method="post">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" value="<?=$marque['nom']?>" /></p>
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
			<p><input type="submit" value="Modifier la marque" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>