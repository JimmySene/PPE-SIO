<?php $titrePage = "Ajouter un utilisateur";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) {
	if(isset($_POST['nom'])) { 

		gestion_user('ajout', 0, $_POST['adresse_mail'], $_POST['mot_de_passe'], $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'],
		$_POST['code_postal'], $_POST['telephone'], $_POST['lvl']);

		header('location:admin.php');
		
	} else { ?>

	<main id="ajout_user">
		<h1>Ajouter un utilisateur</h1>
		<hr width="30%" color="red" />
		<form action="ajout_user.php" method="post">
			<p><label for="nom">Nom : </label><input type="text" name="nom" id="nom" /></p>
			<p><label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" /></p>
			<p><label for="adresse_mail">Adresse mail : </label><input type="email" name="adresse_mail" id="adresse_mail" /></p>
			<p><label for="mot_de_passe">Mot de passe : </label><input type="password" name="mot_de_passe" id="mot_de_passe"/></p>
			<p>Civilité : <label for="mr">Mr</label><input type="radio" name="civilite" value="mr" id="mr" />
						<label for="mme">Mme</label><input type="radio" name="civilite" value="mme" id="mme" /></p>
			<p><label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" /></p>
			<p><label for="code_postal">Code postal : </label><input type="text" name="code_postal" id="code_postal" /></p>
			<p><label for="ville">Ville : </label><input type="text" name="ville" id="ville" /></p>
			<p><label for="telephone">Téléphone : </label><input type="tel" name="telephone" id="telephone" /></p>
			<p><label for="lvl">Niveau d'accréditation : </label><select name="lvl" id="lvl" />
				<option value="0">0</option>
				<option value="1">1</option>
			</select></p>

			<p><input type="submit" value="Envoyer" class="envoi" /></p>
		</form>
	</main>

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>
	
	
	
	
	
	
	
	
	
	
	