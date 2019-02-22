<?php $titrePage = "Partenaires";
include('includes/header.php'); 
include('fonctions.php'); ?>

    <h1 class="display-4">Nos partenaires</h1>
    <hr />
    <p>Nous remercions nos partenaires pour leur coopération et leur fidélité.</p>
    <ul class="list-group">
    <?php $resultat = recup_partenaires();
    while($partenaire = mysqli_fetch_assoc($resultat)) { ?>
        <li class="list-group-item"><?=$partenaire['nom']?> - <?=$partenaire['type']?></li>
    <?php } ?>
    </ul>

<?php include('includes/footer.php'); ?>