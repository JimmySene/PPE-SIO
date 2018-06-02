<?php $titrePage = "Modifier un utilisateur";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) {
	if(isset($_POST['id'])) { 

		gestion_user('modif', $_POST['id'], $_POST['adresse_mail'], $_POST['mot_de_passe'], $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'],
		$_POST['code_postal'], $_POST['telephone'], $_POST['lvl']);

		header('location:admin.php');
		
	} else {

        $id = $_GET['id'];
        $con = sql_connect();
        $req = "SELECT * FROM client WHERE id = '$id'";
        $resultat = mysqli_query($con, $req);
        $info_user = mysqli_fetch_assoc($resultat); ?>

	<main id="modif_user">
		<h1>Modifier un utilisateur</h1>
		<hr width="30%" color="red" />
		<form action="modif_user.php" method="post">
			<p><label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="<?=$info_user['nom']?>" /></p>
			<p><label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" value="<?=$info_user['prenom']?>"/></p>
			<p><label for="adresse_mail">Adresse mail : </label><input type="email" name="adresse_mail" id="adresse_mail" value="<?=$info_user['adresse_mail']?>"/></p>
			<p><label for="mot_de_passe">Mot de passe : </label><input type="password" name="mot_de_passe" id="mot_de_passe" value="<?=$info_user['mot_de_passe']?>" /></p>
			<p>Civilité : <label for="mr">Mr</label><input type="radio" name="civilite" value="mr" id="mr" <?php if($info_user['civilite'] == 'mr') { echo 'checked'; } ?> />
						<label for="mme">Mme</label><input type="radio" name="civilite" value="mme" id="mme" <?php if($info_user['civilite'] == 'mme') { echo 'checked'; } ?> /></p>
			<p><label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" value="<?=$info_user['adresse']?>"/></p>
			<p><label for="code_postal">Code postal : </label><input type="text" name="code_postal" id="code_postal" value="<?=$info_user['code_postal']?>"/></p>
			<p><label for="ville">Ville : </label><input type="text" name="ville" id="ville" value="<?=$info_user['ville']?>"/></p>
			<p><label for="telephone">Téléphone : </label><input type="tel" name="telephone" id="telephone" value="<?=$info_user['telephone']?>" /></p>
			<p><label for="lvl">Niveau d'accréditation : </label><select name="lvl" id="lvl" />
				<option value="0" <?php if($info_user['lvl'] == 0) { echo 'selected'; } ?>>Utilisateur</option>
				<option value="1" <?php if($info_user['lvl'] == 1) { echo 'selected'; } ?>>Admin</option>
            </select></p>
            <input type="hidden" name="id" value="<?=$id?>" />

			<p><input type="submit" value="Envoyer" class="envoi" /></p>
		</form>
	</main>

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>

	

	
	
	
	
	
	
	
	
	
	
	