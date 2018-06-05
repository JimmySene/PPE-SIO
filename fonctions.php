<?php 

/* === Connexion à la BDD ===
Renvoie le resultat de mysqli_connect  */
function sql_connect() 
{
    $con = mysqli_connect('localhost', 'root', '', 'belle_table');
    return $con;
}

/* === Vérification Admin ===
Renvoie TRUE si l'utilisateur est admin, sinon FALSE */
function verif_admin() 
{
    if(isset($_SESSION['login']) && $_SESSION['lvl'] != 0)
        return true;
    else   
        return false;
}

/* === Vérifie si l'email d'un nouvel utilisateur est déjà prise ===
Renvoie TRUE si il y a doublon, sinon FALSE */
function verif_doublon_user($email)
{
    $con = sql_connect();
    $req = "SELECT * FROM client WHERE adresse_mail = '$email'";
    $data = mysqli_query($con, $req);
    $doublon = (mysqli_num_rows($data) > 0) ? true : false;
    return $doublon;
}

/* === Gestion des utilisateurs dans le panneau d'admin ===
Ajoute ou modifie un utilisateur en fonction du paramètre $mode ('ajout' / 'modif') 
Si on ajoute un utilisateur, on mettra $id à 0 lors de l'appel à la fonction */
function gestion_user($mode, $id, $email, $mdp, $civilite, $nom, $prenom, $adresse, $ville, $cp, $tel, $lvl) 
{
    if(!empty($email) && !empty($nom) && !empty($prenom))
    {
        
       
            if($mode == 'ajout') // Si on veut ajouter un utilisateur
            {
                if(!empty($mdp))
                {
                    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                    $con  = sql_connect();
                    $req = "INSERT INTO client VALUES(null,'$email','$mdp','$civilite', '$nom', '$prenom', '$adresse', '$ville', '$cp', '$tel', '$lvl')";
        
                    mysqli_query($con,$req);
                }
                
                
            } elseif($mode == 'modif') { // Si on veut modifier un utilisateur
                echo '..........................'.$mdp;
                $con  = sql_connect();
                if(!empty($mdp)) {  // Si un mot de passe a été renseigné alors on le change

                    $mdp = password_hash($mdp, PASSWORD_DEFAULT); 
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

                } else { // Sinon on ne change pas le mot de passe

                    $req = "UPDATE `client` SET `adresse_mail` = '$email',
                    `civilite` = '$civilite', 
                    `nom` = '$nom',
                    `prenom` = '$prenom',
                    `adresse` = '$adresse', 
                    `ville` = '$ville',
                    `code_postal` = '$cp', 
                    `telephone` = '$tel',
                    `lvl` = '$lvl' 
                    WHERE `id` = '$id'";
                }

                    mysqli_query($con,$req);
            }
        
    }
}





?>