<?php $titrePage = "Gérer mon profil";
include('includes/header.php'); 
include('fonctions.php'); 

if(isset($_POST['id'])) { // Si l'ID du membre a été transmis par formulaire alors on le modifie dans la BDD et on redirige l'utilisateur sur le pannel admin

gestion_user('modif', $_POST['id'], $_POST['adresse_mail'], $_POST['mot_de_passe'], $_POST['civilite'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'],
$_POST['code_postal'], $_POST['telephone'], $_SESSION['lvl']);

header('location:index.php');

} elseif(isset($_SESSION['id'])) { // Sinon on affiche le formulaire de modification

$info_user = mysqli_fetch_assoc(recup_client_par_id($_SESSION['id'])); ?>


<h1 class="display-4">Gérer mon profil</h1>
<hr />

<form action="profil.php" method="post">
    <p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="<?=htmlspecialchars($info_user['nom'])?>" class="form-control" /></p>
    <p class="form-group"><label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" value="<?=htmlspecialchars($info_user['prenom'])?>" class="form-control" /></p>
    <p class="form-group"><label for="adresse_mail">Adresse mail : </label><input type="email" name="adresse_mail" id="adresse_mail" value="<?=htmlspecialchars($info_user['adresse_mail'])?>" class="form-control" /></p>
    <p class="form-group"><label for="mot_de_passe">Mot de passe : (laisser vide si vous ne voulez pas changer) </label><input type="password" name="mot_de_passe" id="mot_de_passe" value="" class="form-control" /></p>
    <p class="form-check-inline">
        <label for="mr" class="form-check-label"><input type="radio" name="civilite" value="mr" id="mr" class="form-check-input" <?php if($info_user['civilite'] == 'mr') { echo 'checked'; } ?>  />Mr</label>
    </p>
    <p class="form-check-inline">
        <label for="mme" class="form-check-label"><input type="radio" name="civilite" value="mme" id="mme" class="form-check-input" <?php if($info_user['civilite'] == 'mme') { echo 'checked'; } ?> />Mme</label>
    </p>
    <p class="form-group"><label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" value="<?=htmlspecialchars($info_user['adresse'])?>" class="form-control" /></p>
    <p class="form-group"><label for="code_postal">Code postal : </label><input type="text" name="code_postal" id="code_postal" value="<?=htmlspecialchars($info_user['code_postal'])?>" class="form-control"/></p>
    <p class="form-group"><label for="ville">Ville : </label><input type="text" name="ville" id="ville" value="<?=htmlspecialchars($info_user['ville'])?>" class="form-control" /></p>
    <p class="form-group"><label for="telephone">Téléphone : </label><input type="tel" name="telephone" id="telephone" value="<?=htmlspecialchars($info_user['telephone'])?>" class="form-control" /></p>
    
    <input type="hidden" name="id" value="<?=$_SESSION['id']?>" />

    <p><input type="submit" value="Modifier mon profil" class="btn btn-primary" /></p>
</form>


<?php } else {
    header('location:login.php');
}

include('includes/footer.php'); ?>