<?php // CE SCRIPT EST ASSOCIE A UNE REQUETE AJAX POUR AJOUTER UN PRODUIT AU PANIER
session_start();

if(isset($_POST['id'])){ 
    for($i=0;$i<count($_SESSION['panier']['id']);$i++)
    {
        if($_SESSION['panier']['id'][$i] == $_POST['id']) { // Si le produit ajouté est déjà dans le panier alors mettre à jour la quantité
            $_SESSION['panier']['quantite'][$i] = $_POST['quantite'];
            exit();
        }
    }

    array_push($_SESSION['panier']['id'], $_POST['id']);
    array_push($_SESSION['panier']['nom'], $_POST['nom']);
    array_push($_SESSION['panier']['prix'], $_POST['prix']);
    array_push($_SESSION['panier']['quantite'], $_POST['quantite']);
}


?>