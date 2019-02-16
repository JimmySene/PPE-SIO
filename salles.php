<?php $titrePage = "Salles";
include('includes/header.php'); 
include('fonctions.php'); ?>

    <h1 class="display-4">Réservation de salles</h1>
    <hr />
    <div class="row">
    <?php 
    $data = recup_salles();
    while($salle = mysqli_fetch_assoc($data)) { // Affichage des salles 
    $txt_dispo = "Réserver la salle"?>
        <div class="card cols-6" style="width:500px;margin:15px;">
            <img src="images/salles/<?= $salle['id'] ?>.jpg" alt="plan salle" class="card-img-top" />
            <div class="card-body">
                <h2 class="card-title"><?= $salle['nom'] ?></h2>
            
                <p class="card-text"><?= $salle['description'] ?></p>
                <p class="card-text">Située à : <?php echo $salle['adresse'] . ' ' . $salle['code_postal'] . ' ' .  $salle['ville'] ?> </p>
                <p>Tarif : <mark class="prix"><?=$salle['tarif']?>€</mark></p>
                <p style="margin-top : 40px;"><a href="" class=" btn <?php if($salle['disponibilite'] != 'disponible') { $txt_dispo = "Indisponible"; echo 'btn-danger'; } else { echo 'btn-success'; } ?>"><?=$txt_dispo?></a></p>
            </div>
        </div>
    <?php } ?>
    </div>
<?php include('includes/footer.php'); ?>