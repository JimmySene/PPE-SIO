<?php $titrePage = "Liste des clients";
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
	
		$resultat = recup_clients();
		$i = 0;
		while($client = mysqli_fetch_assoc($resultat)) {

			if($client['lvl'] == 0) $lvl = "Utilisateur";
			elseif($client['lvl'] == 1) $lvl = "Administrateur"; 

			
			if($i%2==0) echo "<tr bgcolor='#ffffff'>"; else echo "<tr>"; 
			echo "
					<td>".htmlspecialchars($client["nom"])."</td>
					<td>".htmlspecialchars($client["prenom"])."</td>
					<td>".htmlspecialchars($client["adresse_mail"])."</td>
					<td>".$lvl."</td>
					<td>
						<a href='modif_user.php?id=".$client["id"]."'>
							<img src='images\modif.png' width='25' />
						</a>
					</td>
					<td>
						<a href='sup_user.php?id=".$client["id"]."'>
							<img src='images\supprimer.png' width='25'/>
						</a>
					</td>
				</tr>
				";
				$i++;
		}
    
	?>


	</table>

	
 <?php } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>
