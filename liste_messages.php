<?php $titrePage = "Liste des messages";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-4">Panneau d'administration</h1>

	<hr />

	<h2>Messages reçus</h2>
	<hr />

	<?php $data = recup_messages();
	while($message = mysqli_fetch_assoc($data)) { ?>

		<div class="media border p-3">
  			<img src="images/img_avatar3.png" alt="icone utilisateur" class="mr-3 mt-3 rounded-circle" style="width:60px;">
			<div class="media-body">
				<h4><?=htmlspecialchars($message['sujet'])?><a href="sup_message.php?id=<?=$message['id']?>">
							<img src='images\supprimer.png' width='25'/>
						</a></h4>
				<p><?=htmlspecialchars($message['pseudo']).' '.htmlspecialchars($message['adresse_mail'])?> <small><i><?=$message['date_envoie']?></i></small></p>
				<p><?=nl2br(htmlspecialchars($message['message']))?></p>
			</div>
		</div>

<?php }
} else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>