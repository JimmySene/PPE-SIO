<?php $titrePage = "Contact";
include('includes/header.php'); ?>
<main id="contact">
    <h1>Nous contacter</h1>
    <p>Vous pouvez nous contacter en remplissant le formulaire ci-dessous.</p>
    <form action="contact.php" method="post">
        <p><label for="email">Votre adresse mail : </label><input type="email" name="email" id="email" size="30"/></p>
        <p><label for="pseudo">Votre Prénom / Pseudo : </label><input type="text" name="pseudo" id="pseudo" size="30"/></p>
        <p>
            <label for="message">Votre message : </label><br />
            <textarea name="message" id="meessage" cols="70" rows="10"></textarea>
        </p>
        <p><input type="submit" value="Envoyer le message" class="envoi" /></p>
    </form>
</main>
<?php include('includes/footer.php'); ?>
