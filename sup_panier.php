<?php // CE SCRIPT EST ASSOCIEE A UNE REQUETE AJAX POUR SUPPRIMER UN ELEMENT DU PANIER
session_start();

if(isset($_POST['id'])){
    array_splice($_SESSION['panier']['id'], $_POST['id'], 1);
    array_splice($_SESSION['panier']['nom'], $_POST['id'], 1);
    array_splice($_SESSION['panier']['prix'], $_POST['id'], 1);
    array_splice($_SESSION['panier']['quantite'], $_POST['id'], 1);
    
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['id']); $i++)
    {
        $total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
    }

    echo $total; // RENVOIE LE PRIX TOTAL DU PANIER
}
?>