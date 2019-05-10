<?php $titrePage = "Contact";
include('includes/header.php');
include("fonctions.php"); ?>

    <h1 class="display-4 form">Nous contacter</h1>
    <hr />
    <p class ="pad-form">Vous pouvez nous contacter via le formulaire ci-dessous. Nous vous recontacterons ensuite par email.</p>
    <form action="envoi_message.php" method="post" class="form">
        <p class="form-group"><label for="email">Votre adresse mail : </label><input type="email" name="email" id="email" size="30" class="form-control"
        <?php if(isset($_SESSION['login'])) { ?> value="<?=$_SESSION['login']?>" <?php } ?> required /></p>
        <p class="form-group"><label for="pseudo">Votre nom d'entreprise ou prénom : </label><input type="text" name="pseudo" id="pseudo" size="30" class="form-control" required /></p>
        <p class="form-group"><label for="sujet">Sujet : </label><input type="text" name="sujet" id="sujet" size="30" class="form-control" 
        <?php if(isset($_GET['salle'])) { 
            $salle = mysqli_fetch_assoc(recup_salle_par_id($_GET['salle']));
            $nom_salle = $salle['nom']; ?>
               value="Réservation de la salle <?=$nom_salle?>" <?php } ?> required /></p>
        <p class="form-group">
            <label for="message">Votre message : </label><br />
            <textarea name="message" id="meessage" cols="70" rows="10" class="form-control" required>
<?php if(isset($_GET['salle'])) { echo "Bonjour, 
je souhaite réserver la salle $nom_salle pour X jours du JJ/MM au JJ/MM. 
J'attends votre retour par email. 
                    
Cordialement."; }?>
            </textarea>
        </p>
        <p><input type="submit" value="Envoyer le message" class="btn btn-primary" /></p>
    </form>

<?php include('includes/footer.php'); ?>
