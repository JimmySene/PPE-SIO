<?php $titrePage = "Ajouter un utilisateur";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est un admin

	if(isset($_POST['nom'])) { // Si le formulaire d'ajout d'utilisateur a bien été envoyé

		gestion_user('ajout', 0, $_POST['adresse_mail'], $_POST['mot_de_passe'], $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'],
		$_POST['code_postal'], $_POST['telephone'], $_POST['lvl']); // Ajout de l'utilisateur

		header('location:admin.php');
		
	} else { // Sinon on affiche le formulaire d'ajout d'utilisateur ?>

	
		<h1 class="display-4">Ajouter un utilisateur</h1>
		<hr />
		
		<form action="ajout_user.php" method="post">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" /></p>
			<p class="form-group"><label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" class="form-control" /></p>
			<p class="form-group"><label for="adresse_mail">Adresse mail : </label><input type="email" name="adresse_mail" id="adresse_mail" class="form-control" /></p>
			<p class="form-group"><label for="mot_de_passe">Mot de passe : </label><input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control"/></p>
			<p class="form-check-inline">
				<label for="mr" class="form-check-label">
					<input type="radio" name="civilite" value="mr" id="mr" class="form-check-input" />Mr
				</label>
			</p>
			<p class="form-check-inline">
				<label for="mme" class="form-check-label">
					<input type="radio" name="civilite" value="mme" id="mme" class="form-check-input" />Mme
				</label>
			</p>
			
			</p>
			<p class="form-group"><label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" class="form-control" /></p>
			<p class="form-group"><label for="code_postal">Code postal : </label><input type="text" name="code_postal" id="code_postal" class="form-control" /></p>
			<p class="form-group"><label for="ville">Ville : </label><input type="text" name="ville" id="ville" class="form-control" /></p>
			<p class="form-group"><label for="telephone">Téléphone : </label><input type="tel" name="telephone" id="telephone" class="form-control" /></p>
			<p class="form-group"><label for="lvl">Niveau d'accréditation : </label><select name="lvl" id="lvl" class="form-control" />
				<option value="0">Utilisateur</option>
				<option value="1">Administrateur</option>
			</select></p>

			<p><input type="submit" value="Ajouter l'utilisateur" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>
	
	
	
	
	
	
	
	
	
	
	