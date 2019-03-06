<?php $titrePage = "Panier";
include('includes/header.php'); 
include('fonctions.php'); 

if(isset($_SESSION['login'])){ // On vérifie que l'utilisateur est connecté
    if(isset($_SESSION['panier'])) { ?>

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
            <td><img src="images/supprimer.png" class="supprimer" alt="supprimer" width="50"/></td>
        </tr>
        <?php }
        ?>
    </table>  
    <p id="total">Total : <span><?=prix_total_panier()?></span>€</p>
    <p><a href="#">Acheter</a></p>

    <!-- MODAL SUPPRESSION PRODUIT -->
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Produit supprimé du panier</h5>
                </div>
                <div class="modal-body">
                    <p>Votre produit a bien été supprimé du panier !</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary ok">OK</button>
                </div>
            </div>
        </div>
    </div>



    <?php } else { ?>
       <p>Votre panier est vide !</p>
    <?php } 
} else { // Sinon on le renvoie sur la page de connexion
    header('location:login.php');
}
?>



<?php include('includes/footer.php'); ?>