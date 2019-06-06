<?php $titrePage = "Liste des produits";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-4">Panneau d'administration</h1>
	<hr />
	<h2>Liste des produits</h2>
	<hr />
	
	<p><a href="ajout_produit.php" class="btn btn-primary" >Ajouter un produit</a></p>
	<table class="table table-striped table-bordered ">
		<tr>
			<th>Image</th>
			<th>Nom</th>
			<th>Prix</th>
			<th>Catégorie</th>
			<th>Marque</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
						
	<?php
		$resultat = recup_admin_produits();
		$i = 0;
		while($produit = mysqli_fetch_assoc($resultat)) { 

			
			if($i%2==0) echo "<tr bgcolor='#ffffff'>"; else echo "<tr>"; ?>
			
					<td><img src="Images/produits/<?=htmlspecialchars($produit["produit_id"])?>.jpg" alt="<?=htmlspecialchars($produit["produit_nom"])?>" width="100"/></td>
					<td><?=htmlspecialchars($produit["produit_nom"])?></td>
					<td><?=htmlspecialchars($produit["prix"])?></td>
					<td><?=htmlspecialchars($produit["categorie_nom"])?></td>
					<td><?=htmlspecialchars($produit["marque_nom"])?></td>
					<td>
						<a href="modif_produit.php?id=<?=$produit["produit_id"]?>">
							<img src="Images\modif.png" width="25" />
						</a>
					</td>
					<td>
						<a href="sup_produit.php?id=<?=$produit["produit_id"]?>">
							<img src="Images\supprimer.png" width="25" />
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
