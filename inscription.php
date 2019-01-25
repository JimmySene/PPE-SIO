<?php $titrePage = "Inscription";
include('includes/header.php'); 
include('fonctions.php');


if(isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['verif_mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
{ // Si le formulaire d'inscription a été envoyé et a bien été rempli alors on inscrit le nouvel utilisateur

    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $verif_mdp = $_POST['verif_mdp'];
    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $tel = $_POST['tel'];

    if(!verif_doublon_user($email))
    {
        if($mdp == $verif_mdp) // Si les deux mots de passes correspondent alors on enregistre l'utilisateur dans la BDD
        {
            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
            inscription_utilisateur($email, $mdp, $civilite, $nom, $prenom, $adresse, $ville, $cp, $tel);

            echo "Votre compte a bien été créé. Vous allez être redirigé sur la page d'accueil dans quelques secondes...";
            header("refresh:3;url=index.php");
        }
        else // Sinon on affiche un message d'erreur et on renvoie sur le formulaire d'inscription
        {
            echo "Erreur : Les 2 mots de passes ne correspondent pas. Vous allez être redirigé sur le formulaire d'inscription dans quelques secondes...";
            header("refresh:3;url=inscription.php");
        }
    } else {
        echo "Erreur : Cette adresse email est déjà prise. Vous allez être redirigé sur le formulaire d'inscription dans quelques secondes...";
        header("refresh:3;url=inscription.php");
    }
    
} else { // Sinon on affiche le formulaire d'inscription

    if(isset($_SESSION['login'])) // On vérifie si l'utilisateur est connecté, si oui alors on le renvoie sur la page d'accueil
        header("location:index.php");
    else {
?>

    <h1 class="display-4">Inscription</h1>
    <hr />
    <p>Inscrivez vous en moins de deux minutes afin de pouvoir acheter nos produits ou réserver une salle.</p>
    <form action="inscription.php" method="post">
        <p class="form-group"><label for="email">Adresse mail : </label><input type="email" name="email" id="email" size="30" class="form-control" /></p>
        <p class="form-group"><label for="mdp">Mot de passe : </label><input type="password" name="mdp" id="mdp" size="30" class="form-control" /></p>
        <p class="form-group"><label for="verif_mdp">Vérification du mot de passe : </label><input type="password" name="verif_mdp" id="verif_mdp" size="30" class="form-control" /></p>
        <p class="form-check-inline">
            <label for="mr" class="form-check-label" ><input type="radio" name="civilite" value="mr" id="mr" class="form-check-input" />Mr</label>
        </p>
        <p class="form-check-inline">
            <label for="mme" class="form-check-label"><input type="radio" name="civilite" value="mme" id="mme" class="form-check-input" />Mme</label>
        </p>
        <p class="form-group"><label for="nom">Nom : </label><input type="text" name="nom" id="nom" size="30" class="form-control" /></p>
        <p class="form-group"><label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" size="30" class="form-control" /></p>
        <p class="form-group"><label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" size="30" class="form-control" /></p>
        <p class="form-group"><label for="ville">Ville : </label><input type="text" name="ville" id="ville" size="30" class="form-control" /></p>
        <p class="form-group"><label for="cp">Code postal : </label><input type="text" name="cp" id="cp" size="30" class="form-control" /></p>
        <p class="form-group"><label for="tel">Téléphone : </label><input type="tel" name="tel" id="tel" size="30" class="form-control" /></p>
        <p><input type="submit" value="S'inscrire" class="btn btn-primary" /></p>
    </form>

<?php include('includes/footer.php');
} } ?>