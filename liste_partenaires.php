<?php $titrePage = "Liste des partenaires";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-1">Panneau d'administration</h1>
	<hr />
	<h2>Liste des partenaires</h2>
	<hr />
	
	<p><a href="ajout_partenaire.php" class="btn btn-primary" >Ajouter un partenaire</a></p>
	<table class="table table-striped table-bordered ">
		<tr>
			<th>Nom</th>
			<th>Type</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
						
	<?php
		$resultat = recup_partenaires();
		$i = 0;
		while($partenaire = mysqli_fetch_assoc($resultat)) { 

			
			if($i%2==0) echo "<tr bgcolor='#ffffff'>"; else echo "<tr>"; ?>
			
					
					<td><?=htmlspecialchars($partenaire["nom"])?></td>
					<td><?=htmlspecialchars($partenaire["type"])?></td>
					<td>
						<a href="modif_partenaire.php?id=<?=$partenaire["id"]?>">
							<img src="images\modif.png" width="25" />
						</a>
					</td>
					<td>
						<a href="sup_partenaire.php?id=<?=$partenaire["id"]?>">
							<img src="images\supprimer.png" width="25" />
						</a>
					</td>
				
				<?php echo "</tr>";
				 $i++; 
				}
    
	?>


	</table>

	
 <?php } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); 
?>
