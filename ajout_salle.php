<?php $titrePage = "Ajouter une salle";
include('includes/header.php'); 
include('fonctions.php');

if(verif_admin()) { // On vérifie si l'utilisateur est admin

	if(isset($_POST['nom'])) { // Si une nouveau salle a été envoyée

        ajouter_salle( 
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
		
	} else { // Sinon on affiche le formulaire d'ajout' ?>

        
		<h1 class="display-4">Ajouter une salle</h1>
		<hr />
	
		<form action="ajout_salle.php" method="post" enctype="multipart/form-data">
			<p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" class="form-control" /></p>
            <p class="form-group"><label for="description">Description : </label><textarea id="description" name="description" class="form-control"></textarea></p>
            <p class="form-group"><label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" class="form-control" /></p>
            <p class="form-group"><label for="ville">Ville : </label><input type="text" name="ville" id="ville" class="form-control" /></p>
			<p class="form-group"><label for="code_postal">Code postal : </label><input type="text" name="code_postal" id="code_postal" class="form-control" /></p>
            <p class="form-group"><label for="prenom">Tarif : </label><input type="number" name="tarif" id="tarif" class="form-control" /></p> 
            <div class="form-check">
                <input class="form-check-input" type="radio" name="disponibilite" id="disponible" value="disponible" checked>
                <label class="form-check-label" for="disponible">
                    Disponible
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="disponibilite" id="indisponible" value="indisponible">
                <label class="form-check-label" for="indisponible">
                    Indisponible
                </label>
            </div>  
            <p class="form-group"><label for="photo">Photo : </label><input type="file" name="photo" class="form-control-file" /></p>    
			<p><input type="submit" value="Ajouter la salle" class="btn btn-primary" /></p>
		</form>
	

	<?php }
	} else header("location:index.php"); 

include('includes/footer.php'); ?>