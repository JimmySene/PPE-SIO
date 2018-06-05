<?php include("fonctions.php");

if(isset($_POST['email']) && !empty($_POST['email'])  && !empty($_POST['pseudo'])  && !empty($_POST['message'])) // Si infos du formulaire alors envoi d'un message
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
else header("location:contact.php"); // Sinon renvoi vers la page de contact

?>