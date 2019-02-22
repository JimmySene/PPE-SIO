<?php $titrePage = "Liste des salles";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-4">Panneau d'administration</h1>
	<hr />
	<h2>Liste des salles</h2>
	<hr />
	
	<p><a href="ajout_salle.php" class="btn btn-primary" >Ajouter une salle</a></p>
	<table class="table table-striped table-bordered ">
		<tr>
			<th>Image</th>
			<th>Nom</th>
			<th>Description</th>
			<th>Adresse</th>
            <th>Ville</th>
            <th>Code postal</th>
            <th>Tarif jour</th>
            <th>Disponibilité</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
						
	<?php
		$resultat = recup_salles();
		$i = 0;
		while($salle = mysqli_fetch_assoc($resultat)) { 

			
			if($i%2==0) echo "<tr bgcolor='#ffffff'>"; else echo "<tr>"; ?>
			
					<td><img src="images/salles/<?=htmlspecialchars($salle["id"])?>.jpg" alt="<?=htmlspecialchars($salle["nom"])?>" width="100"/></td>
					<td><?=htmlspecialchars($salle["nom"])?></td>
					<td><?=htmlspecialchars($salle["description"])?></td>
					<td><?=htmlspecialchars($salle["adresse"])?></td>
					<td><?=htmlspecialchars($salle["ville"])?></td>
                    <td><?=htmlspecialchars($salle["code_postal"])?></td>
                    <td><?=htmlspecialchars($salle["tarif"])?>€</td>
                    <td><?=htmlspecialchars($salle["disponibilite"])?></td>
					<td>
						<a href="modif_salle.php?id=<?=$salle["id"]?>">
							<img src="images\modif.png" width="25" />
						</a>
					</td>
					<td>
						<a href="sup_salle.php?id=<?=$salle["id"]?>">
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
