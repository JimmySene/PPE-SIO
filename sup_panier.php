<?php 
session_start();

if(isset($_GET['id'])){
    array_splice($_SESSION['panier']['id'], $_GET['id'], 1);
    array_splice($_SESSION['panier']['nom'], $_GET['id'], 1);
    array_splice($_SESSION['panier']['prix'], $_GET['id'], 1);
    array_splice($_SESSION['panier']['quantite'], $_GET['id'], 1);
    
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['id']); $i++)
    {
        $total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
    }
    
    header('location:panier.php');
}
?>