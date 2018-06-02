<?php 

function sql_connect() // CONNEXION A LA BDD
{
    $con = mysqli_connect('localhost', 'root', '', 'belle_table');
    return $con;
}

function verif_admin() // RETOURNE TRUE SI L'UTILISATEUR EST ADMIN, SINON FALSE
{
    if(isset($_SESSION['login']) && $_SESSION['lvl'] != 0)
        return true;
    else   
        return false;
}

function gestion_user($mode, $id, $email, $mdp, $civilite, $nom, $prenom, $adresse, $ville, $cp, $tel, $lvl) // AJOUT ET MODIFICATION UTILISATEUR
{
    if(!empty($email) && !empty($nom) && !empty($prenom))
    {
        if($mode == 'ajout')
        {
            $con  = sql_connect();
            $req = "INSERT INTO client VALUES(null,'$email','$mdp','$civilite', '$nom', '$prenom', '$adresse', '$ville', '$cp', '$tel', '$lvl')";

            mysqli_query($con,$req);
        } elseif($mode == 'modif') {

            $con  = sql_connect();
            $req = "UPDATE `client` SET `adresse_mail` = '$email',
            `mot_de_passe` = '$mdp',
            `civilite` = '$civilite', 
            `nom` = '$nom',
            `prenom` = '$prenom',
            `adresse` = '$adresse', 
            `ville` = '$ville',
            `code_postal` = '$cp', 
            `telephone` = '$tel',
            `lvl` = '$lvl' 
            WHERE `id` = '$id'";

            mysqli_query($con,$req);

        }
    }
}





?>