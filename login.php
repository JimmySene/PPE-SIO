<?php 
$titrePage = "Login";
include('includes/header.php');
include('fonctions.php'); 

if(isset($_POST['login'])) // Si le formulaire de connexion a été envoyé
{
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    $con = sql_connect();
    $req = "SELECT * FROM client WHERE adresse_mail = '$login'";
    $data = mysqli_query($con, $req);

    if(mysqli_num_rows($data) > 0) // Si l'utilisateur a été trouvé
    {
        $donnees = mysqli_fetch_assoc($data);
        $verif_mdp = password_verify($mdp, $donnees['mot_de_passe']);
        if($verif_mdp)
        {
            $_SESSION['login'] = $login;
            $_SESSION['lvl'] = $donnees['lvl'];
        } 
        
    }
    
    header('location:login.php');

} else { // Sinon on affiche le formulaire d'inscription

    if(isset($_SESSION['login'])) // Si on est connecté alors on nous redirige vers l'accueil
        header("location:index.php");
    else {
?>


    <h1 class="display-4">Connectez-vous</h1>
    <hr />
    <form action="login.php" method="post">
        <p class="form-group"><label for="login">Adresse mail : </label><input type="email" name="login" id="login" placeholder="Entrez votre adresse mail" class="form-control" /></p>
        <p class="form-group"><label for="mdp">Mot de passe : </label><input type="password" name="mdp" id="mdp" class="form-control" placeholder="Entrez votre mot de passe" /></p>
        <p><input type="submit" value="Se connecter" class="btn btn-primary" /></p>
    </form>


<?php include('includes/footer.php');
} } ?>