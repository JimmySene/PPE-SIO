<?php $titrePage = "Inscription";
include('includes/header.php'); 
include('fonctions.php');

if(isset($_POST['email']))
{
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

    if($mdp == $verif_mdp)
    {
        $con = sql_connect();
        $req = "INSERT INTO  client(adresse_mail, mot_de_passe, civilite, nom, prenom, adresse, ville, code_postal, telephone ) VALUES('$email','$mdp','$civilite', '$nom', '$prenom', '$adresse', '$ville', '$cp', '$tel')";
        $data = mysqli_query($con, $req);
        

    }
    else
    {
        header("location:inscription.php");
    }
    header("location:index.php");
} else { 
    if(isset($_SESSION['login']))
        header("location:index.php");
    else {
?>
<main id="inscription">
    <h1>Inscription</h1>
    <p>Inscrivez vous en moins de deux minutes afin de pouvoir acheter nos produits ou réserver une salle.</p>
    <form action="inscription.php" method="post">
        <p><label for="email">Adresse mail : (login) </label><input type="email" name="email" id="email" size="30" /></p>
        <p><label for="mdp">Mot de passe : </label><input type="password" name="mdp" id="mdp" size="30" /></p>
        <p><label for="verif_mdp">Vérification du mot de passe : </label><input type="password" name="verif_mdp" id="verif_mdp" size="30" /></p>
        <p>Civilité : <label for="mr">Mr</label><input type="radio" name="civilite" value="mr" id="mr" />
        <label for="mme">Mme</label><input type="radio" name="civilite" value="mme" id="mme" /></p>
        <p><label for="nom">Nom : </label><input type="text" name="nom" id="nom" size="30" /></p>
        <p><label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" size="30" /></p>
        <p><label for="adresse">Adresse : </label><input type="text" name="adresse" id="adresse" size="30" /></p>
        <p><label for="ville">Ville : </label><input type="text" name="ville" id="ville" size="30" /></p>
        <p><label for="cp">Code postal : </label><input type="text" name="cp" id="cp" size="30" /></p>
        <p><label for="tel">Téléphone : </label><input type="tel" name="tel" id="tel" size="30" /></p>
        <p><input type="submit" value="S'inscrire" class="envoi" /></p>
    </form>
</main>
<?php include('includes/footer.php');
} } ?>