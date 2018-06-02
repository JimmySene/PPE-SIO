<?php include("fonctions.php");

if(isset($_POST['pseudo']))
{
        $email = $_POST['email'];
        $message = $_POST['message'];
        $pseudo = $_POST['pseudo'];
        $date = date('Y-m-d');

        $con  = sql_connect();
        $req = "INSERT INTO  contact(adresse_mail, pseudo, message, date) VALUES('$email','$pseudo','$message','$date')";

        mysqli_query($con,$req);

        echo "Votre message a bien été envoyé ! Vous allez être redirigé vers la page d'accueil dans quelques secondes...";
        header("Refresh:3;URL=index.php");
}
header("location:index.php");

?>