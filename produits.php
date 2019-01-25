<?php $titrePage = "Produits";
include('includes/header.php'); 
include('fonctions.php'); ?>
    
    <h1 class="display-4">Nos produits</h1>
    <hr />
    <div class="row">
        <div class="col-12 col-md-3" style="margin-top : 15px" >
            <ul class="list-group">
                <li class="list-group-item active">CATEGORIES</li>
                <?php // Récupération et affichage des catégories dans un menu
                $data = recup_categories();
                while($categorie = mysqli_fetch_assoc($data)) { ?>
                <li class="list-group-item"><a class="list-group-item-action" href="produits.php?id=<?=$categorie['id']?>"><?=ucfirst($categorie['nom']);?></a></li>
            <?php } ?>
            </ul>
        </div>
        <div id="prez_produits" class="col-12 col-md-9 ">
            <div class="row">
            <?php 

            if(isset($_GET['id'])) // Si on cherche des produits d'une catégorie précise, alors on les affiche
            {
                $data = recup_produits_par_cat($_GET['id']);  

            } else { // Sinon on affiche tous les produits

                $data = recup_produits();
            }
            while($donnees = mysqli_fetch_assoc($data)) { ?>
                <div class="card col-12 col-md-6 col-lg-4 ">
                    <img class="card-img-top" src="images/produits/<?=$donnees['produit_id']?>.jpg" alt="photo <?=$donnees['produit_nom']?>" />
                    <div class="card-body">
                        <p class="card-title "><strong><?=$donnees['produit_nom']?></strong></p>
                        <p><small><?php if($donnees['marque_id'] != 1) echo $donnees['marque_nom']; else { echo '<br />'; }?></small></p>
                    
                        <p class="prix"><mark><?=$donnees['prix']?>€</mark> <i class="fas fa-shopping-basket"></i></p>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>