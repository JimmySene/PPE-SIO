<?php $titrePage = "Salles";
include('includes/header.php'); 
include('fonctions.php');
$con = sql_connect();?>

    <h1 class="display-4">Réservation de salles</h1>
    <hr />
    <div class="row">
    <?php 
    $req = "SELECT * FROM salle";
    $data = mysqli_query($con, $req);
    while($donnees = mysqli_fetch_assoc($data)) { // Affichage des salles 
    $txt_dispo = "Réserver la salle"?>
        <div class="card cols-6" style="width:500px;margin:15px;">
            <img src="Images/salle/<?= $donnees['id'] ?>.jpg" alt="plan salle" class="card-img-top" />
            <div class="card-body">
                <h2 class="card-title"><?= $donnees['nom'] ?></h2>
            
                <p class="card-text"><?= $donnees['description'] ?></p>
                <p class="card-text">Située à : <?php echo $donnees['adresse'] . ' ' . $donnees['code_postal'] . ' ' .  $donnees['ville'] ?> </p>
                <p style="margin-top : 40px;"><a href="" class=" btn <?php if($donnees['disponibilite'] != 'disponible') { $txt_dispo = "Indisponible"; echo 'btn-danger'; } else { echo 'btn-success'; } ?>"><?=$txt_dispo?></a></p>
                <p></p>
            </div>
        </div>
    <?php } ?>
    </div>
<?php include('includes/footer.php'); ?>