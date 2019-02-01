<?php $titrePage = "Modifier un produit";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['id'])) { // Si l'ID du produit a été transmis par formulaire alors on le modifie dans la BDD et on redirige l'utilisateur sur le pannel admin

		modifier_produit($_POST['id'], $_POST['nom'], $_POST['prix'], $_POST['categorie'], $_POST['marque']);

		header('location:liste_produits.php');
		
	} elseif(isset($_GET['id'])) { // Sinon on affiche le formulaire de modification

        $info_produit = mysqli_fetch_assoc(recup_produit_par_id($_GET['id'])); ?>

	
		<h1 class="display-4">Modifier un produit</h1>
		<hr />
	
		<form action="modif_produit.php" method="post">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="<?=htmlspecialchars($info_produit['produit_nom'])?>" class="form-control" /></p>
			<p class="form-group"><label for="prenom">Prix : </label><input type="number" name="prix" id="prix" value="<?=htmlspecialchars($info_produit['prix'])?>" class="form-control" /></p>
			
			<p class="form-group">
				<label for="categorie">Catégorie : </label>
				<select name="categorie" id="categorie" class="form-control" />
				<?php $categories = recup_categories();
				while($categorie = mysqli_fetch_assoc($categories)) { ?>
					<option value="<?=$categorie['id']?>" <?php if($info_produit['categorie_id'] == $categorie['id']) { echo 'selected'; } ?>><?=$categorie['nom']?></option>
				<?php } ?>
            	</select>
			</p>

			<p class="form-group">
				<label for="marque">Marque : </label>
				<select name="marque" id="marque" class="form-control" />
				<?php $marques = recup_marques();
				while($marque = mysqli_fetch_assoc($marques)) { ?>
					<option value="<?=$marque['id']?>" <?php if($info_produit['marque_id'] == $marque['id']) { echo 'selected'; } ?>><?=$marque['nom']?></option>
				<?php } ?>
            	</select>
			</p>


            <input type="hidden" name="id" value="<?=$_GET['id']?>" />

			<p><input type="submit" value="Modifier le produit" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>

	

	
	
	
	
	
	
	
	
	
	
	