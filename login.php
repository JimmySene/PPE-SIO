<?php 
$titrePage = "Login";
include('includes/header.php'); 

if(isset($_POST['login']))
{
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    $con = mysqli_connect('localhost', 'root', '', 'belle_table');
    $req = "SELECT * FROM client WHERE adresse_mail = '$login' AND mot_de_passe = '$mdp'";
    $data = mysqli_query($con, $req);

    if(mysqli_num_rows($data) > 0)
    {
        $donnees = mysqli_fetch_assoc($data);
        $_SESSION['login'] = $login;
        $_SESSION['lvl'] = $donnees['lvl'];
    }
    
    header('location:login.php');
} else { 
    if(isset($_SESSION['login']))
        header("location:index.php");
    else {
?>
<main id="login">
    <h1>Connectez-vous</h1>
    <form action="login.php" method="post">
        <p><label for="login">Login : </label><input type="text" name="login" id="login" placeholder="Entrez votre adresse mail" /></p>
        <p><label for="mdp">Mot de passe : </label><input type="password" name="mdp" id="mdp" /></p>
        <p><input type="submit" value="Se connecter" class="envoi" /></p>
    </form>
</main>
<?php include('includes/footer.php');
} } ?>