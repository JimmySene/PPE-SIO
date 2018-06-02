<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { ?>

<main id="admin">
	<h1>Liste des Utilisateur</h1>
	<hr width="30%" color="red" />
	<p><a href="ajout_user.php"><img src="images/ajouter.png" width="25" /> Ajouter un utilisateur</a></p>
	<table>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
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
			if($i%2==0) echo "<tr bgcolor='#ffffff'>"; else echo "<tr>"; 
			echo "
					<td>".$ligne["nom"]."</td>
					<td>".$ligne["prenom"]."</td>
					<td>".$ligne["lvl"]."</td>
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
</main>

<?php } else header("location:index.php");

include('includes/footer.php'); 
?>
