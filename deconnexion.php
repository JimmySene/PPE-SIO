<?php include('fonctions.php');

session_start();
$login = $_SESSION['login'];
$id_session = $_SESSION['id_session'];
$con = sql_connect();
$req = "UPDATE session_utilisateur SET date_deconnexion = NOW() WHERE id = '$id_session'";
mysqli_query($con, $req);
session_destroy();

header('location:index.php');

?>