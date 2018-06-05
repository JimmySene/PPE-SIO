<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-4">Panneau d'administration</h1>
	<hr />
	<h2>Liste des utilisateurs</h2>
	<hr />
	
	<p><a href="ajout_user.php" class="btn btn-primary" ><img src="images/ajouter.png" width="25" /> Ajouter un utilisateur</a></p>
	<table class="table table-striped table-bordered ">
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Adresse mail</th>
			<th>Level</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
						
	<?php
		$con  = sql_connect();
		$req = "SELECT * FROM client ORDER BY nom";
		
		$resultat = mysqli_query($con,$req);
		if(!$resultat) echo mysqli_error($con);
		$i = 0;
		while($ligne = mysqli_fetch_assoc($resultat)) {

			if($ligne['lvl'] == 0) $lvl = "Utilisateur";
			elseif($ligne['lvl'] == 1) $lvl = "Administrateur"; 

			
			if($i%2==0) echo "<tr bgcolor='#ffffff'>"; else echo "<tr>"; 
			echo "
					<td>".htmlspecialchars($ligne["nom"])."</td>
					<td>".htmlspecialchars($ligne["prenom"])."</td>
					<td>".htmlspecialchars($ligne["adresse_mail"])."</td>
					<td>".$lvl."</td>
					<td>
						<a href='modif_user.php?id=".$ligne["id"]."'>
							<img src='images\modif.png' width='25' />
						</a>
					</td>
					<td>
						<a href='supp_user.php?id=".$ligne["id"]."'>
							<img src='images\supprimer.png' width='25'/>
						</a>
					</td>
				</tr>
				";
				$i++;
		}
    
	?>


	</table>

	<hr />
	<h2>Messages reçus</h2>
	<hr />

	<?php $req="SELECT * FROM contact ORDER BY date";
	$data = mysqli_query($con, $req);
	while($donnees = mysqli_fetch_assoc($data)) { ?>

		<div class="media border p-3">
  			<img src="Images/img_avatar3.png" alt="icone utilisateur" class="mr-3 mt-3 rounded-circle" style="width:60px;">
			<div class="media-body">
				<h4><?=htmlspecialchars($donnees['pseudo']). ' ' .htmlspecialchars($donnees['adresse_mail'])?> <small><i><?=$donnees['date']?></i></small> <a href="supp_message.php?id=<?=$donnees['id']?>">
							<img src='images\supprimer.png' width='25'/>
						</a></h4>
				<p><?=nl2br(htmlspecialchars($donnees['message']))?></p>
			</div>
		</div>

<?php }
 } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>
