<?php $titrePage = "Ajouter un produit";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['nom'])) { // Si un nouveau produit a été envoyé

		ajouter_produit($_POST['nom'], $_POST['prix'], $_FILES['photo'], $_POST['categorie'], $_POST['marque']);

		header('location:liste_produits.php');
		
	} else { // Sinon on affiche le formulaire de modification ?>

        
		<h1 class="display-4">Ajouter un produit</h1>
		<hr />
	
		<form action="ajout_produit.php" method="post" enctype="multipart/form-data">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" /></p>
			<p class="form-group"><label for="prenom">Prix : </label><input type="number" name="prix" id="prix" class="form-control" /></p>
			<p class="form-group"><label for="photo">Photo : </label><input type="file" name="photo" class="form-control-file" /></p>
			
			<p class="form-group">
				<label for="categorie">Catégorie : </label>
				<select name="categorie" id="categorie" class="form-control" />
				<?php $categories = recup_categories();
				while($categorie = mysqli_fetch_assoc($categories)) { ?>
					<option value="<?=$categorie['id']?>"><?=$categorie['nom']?></option>
				<?php } ?>
            	</select>
			</p>

			<p class="form-group">
				<label for="marque">Marque : </label>
				<select name="marque" id="marque" class="form-control" />
				<?php $marques = recup_marques();
				while($marque = mysqli_fetch_assoc($marques)) { ?>
					<option value="<?=$marque['id']?>"><?=$marque['nom']?></option>
				<?php } ?>
            	</select>
			</p>

			<p><input type="submit" value="Ajouter le produit" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>