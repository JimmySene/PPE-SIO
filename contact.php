<?php $titrePage = "Contact";
include('includes/header.php'); ?>

    <h1 class="display-4">Nous contacter</h1>
    <hr />
    <p>Vous pouvez nous contacter via le formulaire ci-dessous. Nous vous recontacterons ensuite par email.</p>
    <form action="envoi_message.php" method="post">
        <p class="form-group"><label for="email">Votre adresse mail : </label><input type="email" name="email" id="email" size="30" class="form-control" /></p>
        <p class="form-group"><label for="pseudo">Votre nom d'entreprise ou prénom : </label><input type="text" name="pseudo" id="pseudo" size="30" class="form-control" /></p>
        <p class="form-group">
            <label for="message">Votre message : </label><br />
            <textarea name="message" id="meessage" cols="70" rows="10" class="form-control"></textarea>
        </p>
        <p><input type="submit" value="Envoyer le message" class="btn btn-primary" /></p>
    </form>

<?php include('includes/footer.php'); ?>
