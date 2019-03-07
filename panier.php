<?php $titrePage = "Panier";
include('includes/header.php'); 
include('fonctions.php'); 

if(isset($_SESSION['login'])){ // On vérifie que l'utilisateur est connecté
    if(compter_panier() > 0) { ?>

    <table id="panier" class="table">
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Supprimer</th>
        </tr>
        <?php 
        $nbProduits = count($_SESSION['panier']['id']);
        for($i=0;$i<$nbProduits;$i++)
        { ?>
        <tr data-id="<?=$i?>">
            <td><img src="images/produits/<?=$_SESSION['panier']['id'][$i]?>.jpg" alt="" width="100" height="100" /> <?=$_SESSION['panier']['nom'][$i]?></td>
            <td><?=$_SESSION['panier']['prix'][$i]?>€</td>
            <td><?=$_SESSION['panier']['quantite'][$i]?></td>
            <td><a href="sup_panier.php?id=<?=$i?>"><img src="images/supprimer.png" class="supprimer" alt="supprimer" width="50"/></a></td>
        </tr>
        <?php }
        ?>
    </table>  
    <p id="total">Total : <span><?=prix_total_panier()?></span>€</p>
    <p><a href="#">Acheter</a></p>

    <?php } else { ?>
       <p>Votre panier est vide !</p>
    <?php } 
} else { // Sinon on le renvoie sur la page de connexion
    header('location:login.php');
}
?>



<?php include('includes/footer.php'); ?>