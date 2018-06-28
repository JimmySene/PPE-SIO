<?php $titrePage = "Panneau d'administrateur";
include('includes/header.php');
include('fonctions.php'); 
include('lib/phpGraph.php');



if(verif_admin()) { // Si l'utilisateur est admin alors affiche le panneau d'administration  ?>
  <h1 class="display-4">Sessions utilisateurs</h1>
  <!--  <form action="journal_session.php" method="post">
        <p>Entrez la date du début <input type="text" name="date_debut" placeholder="AAAA-MM-JJ" /> 
        et la date de fin <input type="text" name="date_fin" placeholder="AAAA-MM-JJ" />
        <input type="submit" name="recherche_date" value="Rechercher" /></p>
        
    </form>
    <p><a href="journal_session.php?cacher">Cacher les sessions de + de 3 mois</a></p>-->
    <table class="table table-striped table-bordered">
        <tr>
            <th>Login</th>
            <th>IP</th>
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
                $req = "SELECT login, ip,
                DATE_FORMAT(date_connexion, '%d/%m/%Y %Hh%imin%ss') as connexion, 
                DATE_FORMAT(date_deconnexion, '%d/%m/%Y %Hh%imin%ss') as deconnexion 
                FROM session_utilisateur WHERE DATEDIFF(NOW(), date_connexion) < 90  ORDER BY date_connexion DESC";
            } else {
            $req = "SELECT login, ip,
            DATE_FORMAT(date_connexion, '%d/%m/%Y %Hh%imin%ss') as connexion, 
            DATE_FORMAT(date_deconnexion, '%d/%m/%Y %Hh%imin%ss') as deconnexion 
            FROM session_utilisateur ORDER BY date_connexion DESC"; 
            }

            $data = mysqli_query($con, $req); 
            if(!$data) echo mysqli_error($con);
        }

        while($donnees = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?=$donnees['login']?></td>
                <td><?=$donnees['ip']?></td>
                <td><?=$donnees['connexion']?></td>
                <td><?=$donnees['deconnexion']?></td>
            </tr>
<?php } ?>
</table>
<h2>Histogramme des connexions par mois</h2>

<?php $req = "SELECT MONTH(date_connexion) as mois, COUNT(*) as nb_session
    FROM session_utilisateur
    GROUP BY MONTH(date_connexion)";
    
    $data = mysqli_query($con, $req);
    if(!$data) echo mysqli_error($con);
    
    $data_histo = array(
        'Janvier' => 0,
        'Février' => 0,
        'Mars' => 0,
        'Avril' => 0,
        'Mai' => 0,
        'Juin'=> 0,
        'Juillet' => 0,
        'Aout' => 0,
        'Septembre' => 0,
        'Octobre' => 0,
        'Novembre' => 0,
        'Décembre'=> 0
       );
 
    while($donnees = mysqli_fetch_assoc($data))
    { 
        switch($donnees['mois'])
        {
            case 1:
                $data_histo['Janvier'] = $donnees['nb_session'];
                break;
            case 2:
            $data_histo['Février'] = $donnees['nb_session'];
                break;
            case 3:
            $data_histo['Mars'] = $donnees['nb_session'];
                break;
            case 4:
            $data_histo['Avril'] = $donnees['nb_session'];
                break;
            case 5:
            $data_histo['Mai'] = $donnees['nb_session'];
                break;
            case 6:
            $data_histo['Juin'] = $donnees['nb_session'];
                break;
            case 7:
            $data_histo['Juillet'] = $donnees['nb_session'];
                break;
            case 8:
            $data_histo['Aout'] = $donnees['nb_session'];
                break;
            case 9:
                $data_histo['Septembre'] = $donnees['nb_session'];
                break;
            case 10:
                $data_histo['Octobre'] = $donnees['nb_session'];
                break;
            case 11:
                $data_histo['Novembre'] = $donnees['nb_session'];
            break;
            case 12:
                $data_histo['Décembre'] = $donnees['nb_session'];
            break;
        }
    }
    
    $G = new phpGraph();
      
      echo $G->draw($data_histo);?>


 <?php } else header("location:index.php"); // Sinon redirection sur la page d'accueil

include('includes/footer.php'); ?>