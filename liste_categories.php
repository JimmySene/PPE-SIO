<?php $titrePage = "Liste des categories";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration ?>


	<h1 class="display-4">Panneau d'administration</h1>
	<hr />
	<h2>Liste des catégories</h2>
	<hr />
	
	<p><a href="ajout_categorie.php" class="btn btn-primary" >Ajouter une catégorie</a></p>
	<table class="table table-striped table-bordered ">
		<tr>
			<th>Nom</th>
			<th>Modifier</th>
			<th>Supprimer</th>
		</tr>
						
	<?php
		
		$resultat = recup_categories();
		$i = 0;
		while($categorie = mysqli_fetch_assoc($resultat)) {

			
			if($i%2==0) echo "<tr bgcolor='#ffffff'>"; else echo "<tr>"; 
			echo "
					<td>".htmlspecialchars($categorie["nom"])."</td>
					<td>
						<a href='modif_categorie.php?id=".$categorie["id"]."'>
							<img src='Images\modif.png' width='25' />
						</a>
					</td>
					<td>
						<a href='sup_categorie.php?id=".$categorie["id"]."'>
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