<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 

if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration  ?>
    <form action="journal_session.php" method="post">
        <p>Entrez la date du début <input type="text" name="date_debut" placeholder="AAAA-MM-JJ" /> 
        et la date de fin <input type="text" name="date_fin" placeholder="AAAA-MM-JJ" />
        <input type="submit" name="recherche_date" value="Rechercher" /></p>
        
    </form>
    <p><a href="journal_session.php?cacher">Cacher les sessions de + de 3 mois</a></p>
    <table class="table table-striped table-bordered">
        <tr>
            <th>Login</th>
            <th>Date de connexion</th>
            <th>Date de déconnexion</th>
        </tr>

        <?php $con = sql_connect(); 
        if(isset($_POST['recherche_date']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin'])) 
        { 
            $debut = $_POST['date_debut'];
            $fin = $_POST['date_fin'];
            $req = "SELECT login, date_connexion as connexion, date_deconnexion as deconnexion FROM session_utilisateur WHERE date_connexion BETWEEN '$debut' AND '$fin' ORDER BY date_connexion DESC";
            $data = mysqli_query($con, $req);
        } 
        else
        {
            if(isset($_GET['cacher']))
            {
                $req = "SELECT login, 
                DATE_FORMAT(date_connexion, '%d/%m/%Y %Hh%imin%ss') as connexion, 
                DATE_FORMAT(date_deconnexion, '%d/%m/%Y %Hh%imin%ss') as deconnexion 
                FROM session_utilisateur WHERE DATEDIFF(NOW(), date_connexion) < 90  ORDER BY date_connexion DESC";
            } else {
            $req = "SELECT login, 
            DATE_FORMAT(date_connexion, '%d/%m/%Y %Hh%imin%ss') as connexion, 
            DATE_FORMAT(date_deconnexion, '%d/%m/%Y %Hh%imin%ss') as deconnexion 
            FROM session_utilisateur ORDER BY date_connexion DESC"; }
            $data = mysqli_query($con, $req); 
            if(!$data) echo mysqli_error($con);
        }

        while($donnees = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?=$donnees['login']?></td>
                <td><?=$donnees['connexion']?></td>
                <td><?=$donnees['deconnexion']?></td>
            </tr>
<?php } ?>
</table>
 <?php } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); ?>