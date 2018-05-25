<?php $titrePage = "Salles";
include('includes/header.php'); 
include('fonctions.php');
$con = sql_connect();?>
<main id="salles">
    <h1>Réservation de salles</h1>

    <?php 
    $req = "SELECT * FROM salle";
    $data = mysqli_query($con, $req);
    while($donnees = mysqli_fetch_assoc($data)) { ?>
        <div class="salle">
            <div><img src="Images/salle/<?= $donnees['id'] ?>.jpg" alt="plan salle" width="400" /></div>
            
            <div>
                <h2><?= $donnees['nom'] ?></h2>
            
                <p><?= $donnees['description'] ?></p>
                <p>Située à : <?php echo $donnees['adresse'] . ' ' . $donnees['code_postal'] . ' ' .  $donnees['ville'] ?> </p>
                <p style="margin-top : 40px;"><a href="" <?php if($donnees['disponibilite'] != 'disponible') { echo 'class="indisponible"'; } else { echo 'class="disponible"'; } ?>>Réserver la salle</a></p>
                <p></p>
            </div>
        </div>
    <?php } ?>
</main>
<?php include('includes/footer.php'); ?>