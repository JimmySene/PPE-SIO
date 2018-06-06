<?php $titrePage = "Produits";
include('includes/header.php'); 
include('fonctions.php'); 
$con = sql_connect(); ?>
    
    <h1 class="display-4">Nos produits</h1>
    <hr />
    <div class="row">
        <div class="col-12 col-md-3" style="margin-top : 15px" >
            <ul class="list-group">
                <li class="list-group-item active">CATEGORIES</li>
                <?php // Récupératione et affichage des catégories dans un menu
                $req1 = "SELECT * FROM categorie ORDER BY nom_categorie";
            $data =  mysqli_query($con, $req1); 
            while($donnees_cat = mysqli_fetch_assoc($data)) { ?>
                <li class="list-group-item"><a class="list-group-item-action" href="produits.php?id=<?=$donnees_cat['id_categorie']?>"><?=ucfirst($donnees_cat['nom_categorie']);?></a></li>
            <?php } ?>
            </ul>
        </div>
        <div id="prez_produits" class="col-12 col-md-9 ">
            <div class="row">
            <?php 

            if(isset($_GET['id'])) // Si on cherche des produits d'une catégorie précise, alors on les affiche
            {
                $id_cat = $_GET['id'];
                
                $req3 = "SELECT * FROM produit, marque WHERE produit.categorie_id = '$id_cat' AND produit.marque_id = marque.id_marque ORDER BY produit.nom";
                $data = mysqli_query($con, $req3);

            } else { // Sinon on affiche tous les produits

            $req2 = "SELECT * FROM produit, marque WHERE produit.marque_id = marque.id_marque ORDER BY produit.nom";
            $data = mysqli_query($con, $req2); 
            }
            while($donnees = mysqli_fetch_assoc($data)) { ?>
                <div class="card col-12 col-md-6 col-lg-4 ">
                    <img class="card-img-top" src="images/produits/<?=$donnees['id']?>.jpg" alt="photo <?=$donnees['nom']?>" />
                    <div class="card-body">
                        <p class="card-title "><strong><?=$donnees['nom']?></strong></p>
                        <p><small><?php if($donnees['id_marque'] != 1) echo $donnees['nom_marque']; else { echo '<br />'; }?></small></p>
                    
                        <p class="prix"><mark><?=$donnees['prix']?>€</mark> <i class="fas fa-shopping-basket"></i></p>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>