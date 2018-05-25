<?php $titrePage = "Produits";
include('includes/header.php'); 
include('fonctions.php'); 
$con = sql_connect(); ?>

<main id="produits">
    <h1>Nos produits</h1>
    <div id="categories">
        <p>Catégories</p>
        <ul>
            <?php $req1 = "SELECT * FROM categorie ORDER BY nom_categorie";
           $data =  mysqli_query($con, $req1); 
           while($donnees_cat = mysqli_fetch_assoc($data)) { ?>
            <li><a href="produits.php?id=<?=$donnees_cat['id_categorie']?>"><?=$donnees_cat['nom_categorie'];?></a></li>
           <?php } ?>
        </ul>
    </div>
    <div id="prez_produits">
    <?php 

    if(isset($_GET['id']))
    {
        $id_cat = $_GET['id'];
        
        $req3 = "SELECT * FROM produit, marque WHERE produit.categorie_id = '$id_cat' AND produit.marque_id = marque.id_marque ORDER BY produit.nom";
        $data = mysqli_query($con, $req3);
    } else {

    $req2 = "SELECT * FROM produit, marque WHERE produit.marque_id = marque.id_marque ORDER BY produit.nom";
    $data = mysqli_query($con, $req2); 
    }
    while($donnees = mysqli_fetch_assoc($data)) { ?>
        <div class="produit">
            <h2><?php if(strlen($donnees['nom']) > 40) { echo substr($donnees['nom'], 0, 40) . '...'; } else { echo utf8_decode($donnees['nom']); }?></h2>
            <p class="marque"><?php if($donnees['id_marque'] != 1) echo $donnees['nom_marque']; else { echo '<br />'; }?></p>
            <p><img width="200" height="200" src="Images/produits/<?=$donnees['id']?>.jpg" alt="photo <?=$donnees['nom']?>" /></p>
            <p class="prix"><?=$donnees['prix']?>€ <i class="fas fa-shopping-basket"></i></p>
        </div>
    <?php } 
     ?>

    </div>
</main>
<?php include('includes/footer.php'); ?>