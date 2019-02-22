<?php $titrePage = "Modifier une salle";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['nom'])) { // Si une nouveau salle a été envoyée

        modifier_salle( 
            $_POST['id'],
            $_POST['nom'], 
            $_POST['description'], 
            $_POST['adresse'], 
            $_POST['ville'], 
            $_POST['code_postal'], 
            $_POST['tarif'],
            $_POST['disponibilite'], 
            $_FILES['photo']
        );
        
		header('location:liste_salles.php');
		
    } elseif(isset($_GET['id'])) { // Sinon on affiche le formulaire de modification 
    $salle = mysqli_fetch_assoc(recup_salle_par_id($_GET['id'])); ?>

        
		<h1 class="display-4">Modifier une salle</h1>
		<hr />
	
		<form action="modif_salle.php" method="post" enctype="multipart/form-data">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" value="<?=$salle['nom']?>" /></p>
            <p class="form-group"><label for="description">Description : </label><textarea id="description" name="description" class="form-control"><?=$salle['description']?></textarea></p>
            <p class="form-group"><label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" class="form-control" value="<?=$salle['adresse']?>" /></p>
            <p class="form-group"><label for="ville">Ville : </label><input type="text" name="ville" id="ville" class="form-control" value="<?=$salle['ville']?>" /></p>
			<p class="form-group"><label for="code_postal">Code postal : </label><input type="text" name="code_postal" id="code_postal" class="form-control" value="<?=$salle['code_postal']?>" /></p>
            <p class="form-group"><label for="prenom">Tarif : </label><input type="number" name="tarif" id="tarif" class="form-control" value="<?=$salle['tarif']?>" /></p> 
            <div class="form-check">
                <input class="form-check-input" type="radio" name="disponibilite" id="disponible" value="disponible" <?php if($salle['disponibilite'] == "disponible") echo "checked" ?>>
                <label class="form-check-label" for="disponible">
                    Disponible
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="disponibilite" id="indisponible" value="indisponible" <?php if($salle['disponibilite'] == "indisponible") echo "checked" ?>>
                <label class="form-check-label" for="indisponible">
                    Indisponible
                </label>
            </div>  
            <p class="form-group"><label for="photo">Photo : </label><input type="file" name="photo" class="form-control-file" /></p>    
			<p><input type="submit" value="Modifier la salle" class="btn btn-primary" /></p>
            <input type="hidden" name="id" value="<?=$_GET['id']?>" />
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>