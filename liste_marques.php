<?php $titrePage = "Liste des marques";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-4">Panneau d'administration</h1>
	<hr />
	<h2>Liste des marques</h2>
	<hr />
	
	<p><a href="ajout_marque.php" class="btn btn-primary" >Ajouter une marque</a></p>
	<table class="table table-striped table-bordered ">
		<tr>
			<th>Nom</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
						
	<?php
		
		$resultat = recup_marques();
		$i = 0;
		while($marque = mysqli_fetch_assoc($resultat)) {

			
			if($i%2==0) echo "<tr bgcolor='#ffffff'>"; else echo "<tr>"; 
			echo "
					<td>".htmlspecialchars($marque["nom"])."</td>
					<td>
						<a href='modif_marque.php?id=".$marque["id"]."'>
							<img src='Images\modif.png' width='25' />
						</a>
					</td>
					<td>
						<a href='sup_marque.php?id=".$marque["id"]."'>
							<img src='Images\supprimer.png' width='25'/>
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