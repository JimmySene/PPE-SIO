<?php 

// Connexion MySQL à la BDD
function sql_connect() 
{
    $con = mysqli_connect('localhost', 'root', '', 'belle_table');
    return $con;
}

// Connecte l'utilisateur si ses identifiants sont corrects
function connexion_utilisateur($login, $mdp){
    $con = sql_connect($login, $mdp);
    $req = "SELECT * FROM client WHERE adresse_mail = '$login'";
    $data = mysqli_query($con, $req);

    if(mysqli_num_rows($data) > 0) // Si l'utilisateur a été trouvé
    {
        $client = mysqli_fetch_assoc($data);
        $verif_mdp = password_verify($mdp, $client['mot_de_passe']);
        if($verif_mdp)
        {
            $_SESSION['id'] = $client['id'];
            $_SESSION['login'] = $login;
            $_SESSION['lvl'] = $client['lvl'];
            $_SESSION['panier'] = array();
            $_SESSION['panier']['id'] = array();
            $_SESSION['panier']['nom'] = array();
            $_SESSION['panier']['prix'] = array();
            $_SESSION['panier']['quantite'] = array();
        }    
    }
}

function inscription_utilisateur($email, $mdp, $civilite, $nom, $prenom, $adresse, $ville, $cp, $tel){
    $con = sql_connect();
    $req = "INSERT INTO  client(adresse_mail, mot_de_passe, civilite, nom, prenom, adresse, ville, code_postal, telephone ) 
    VALUES('$email','$mdp','$civilite', '$nom', '$prenom', '$adresse', '$ville', '$cp', '$tel')";
    return mysqli_query($con, $req);
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

// Ajoute une catégorie de produit
function ajouter_categorie($nom){
    $con = sql_connect();
    $req = "INSERT INTO categorie VALUES(null, '$nom')";
    mysqli_query($con, $req);
}

// Renvoie les catégories de produit
function recup_categories(){
    $con = sql_connect();
    $req = "SELECT * FROM categorie ORDER BY nom";
    return mysqli_query($con, $req);
}

// Renvoie la catégorie de l'id renseigné
function recup_categorie_par_id($id){
    $con = sql_connect();
    $req = "SELECT * FROM categorie WHERE id = $id";
    return mysqli_query($con, $req);
}

// Modifie la catégorie avec l'id renseigné
function modifier_categorie($id, $nom){
    $con = sql_connect();
    $req = "UPDATE categorie SET nom = '$nom'
    WHERE id = $id";
    mysqli_query($con, $req);
}
// Supprime une catégorie de produit
function supprimer_categorie($id){
    $con = sql_connect();
    $req = "DELETE FROM categorie WHERE id = $id";
    mysqli_query($con, $req);
}

// Renvoie les produits par catégorie
function recup_produits_par_cat($id_cat){
    $con = sql_connect();
    $req = "SELECT produit.id as produit_id, produit.nom as produit_nom, prix, marque.id as marque_id, marque.nom as marque_nom
    FROM produit, marque 
    WHERE produit.categorie_id = $id_cat 
    AND produit.marque_id = marque.id 
    ORDER BY produit.nom";
    return mysqli_query($con, $req);
}

// Ajoute un produit
function ajouter_produit($nom, $prix, $photo, $categorie, $marque){
    $con = sql_connect();
    $req = "INSERT INTO produit VALUES(null, '$nom', '', $prix, $categorie, $marque)";
    mysqli_query($con, $req);
    if($photo['error'] == 0 && ($photo['type'] == 'image/jpg' || $photo['type'] == 'image/jpeg')) {
        $req = "SELECT id FROM produit ORDER BY id DESC LIMIT 0, 1";
        $last_id = mysqli_fetch_assoc(mysqli_query($con, $req));
        $last_id = $last_id['id'];
        move_uploaded_file($photo['tmp_name'], "images/produits/$last_id.jpg");  
    } 
}
// Modifie un produit
function modifier_produit($id, $nom, $prix, $photo, $categorie, $marque){
    $con = sql_connect();
    $req = "UPDATE produit SET nom = '$nom',
    prix = $prix,
    categorie_id = $categorie,
    marque_id = $marque
    WHERE id = $id";
    mysqli_query($con, $req);
    if($photo['error'] == 0 && ($photo['type'] == 'image/jpg' || $photo['type'] == 'image/jpeg')) {
        unlink("images/produits/$id.jpg");
        move_uploaded_file($photo['tmp_name'], "images/produits/$id.jpg");  
    } 
}

// Supprime un produit
function supprimer_produit($id){
    $con = sql_connect();
    $req = "DELETE FROM produit WHERE id = $id";
    mysqli_query($con, $req);
    unlink("images/produits/$id.jpg");
}

// Ajoute une marque de produit
function ajouter_marque($nom){
    $con = sql_connect();
    $req = "INSERT INTO marque VALUES(null, '$nom')";
    mysqli_query($con, $req);
}

// Supprime une marque de produit
function supprimer_marque($id){
    $con = sql_connect();
    $req = "DELETE FROM marque WHERE id = $id";
    mysqli_query($con, $req);
}

// Renvoie les marques
function recup_marques(){
    $con = sql_connect();
    $req = "SELECT id, nom FROM marque ORDER BY nom";
    return mysqli_query($con, $req);
}

// Renvoie la marque de l'id renseigné
function recup_marque_par_id($id){
    $con = sql_connect();
    $req = "SELECT * FROM marque WHERE id = $id";
    return mysqli_query($con, $req);
}

// Modifie la marque de l'id renseigné
function modifier_marque($id, $nom){
    $con = sql_connect();
    $req = "UPDATE marque SET nom = '$nom'
    WHERE id = $id";
    mysqli_query($con, $req);
}

// Renvoie tous les produits classés par nom
function recup_produits(){
    $con = sql_connect();
    $req = "SELECT produit.id as produit_id, produit.nom as produit_nom, prix, marque.id as marque_id, marque.nom as marque_nom
    FROM produit, marque
    WHERE produit.marque_id = marque.id 
    ORDER BY produit.nom";

    return mysqli_query($con, $req); 
}

// Renvoie tous les produits pour la zone d'admin
function recup_admin_produits(){
    $con = sql_connect();
    $req = "SELECT produit.id as produit_id, produit.nom as produit_nom, prix, marque.id as marque_id, marque.nom as marque_nom, categorie.nom as categorie_nom
    FROM produit, marque, categorie
    WHERE produit.marque_id = marque.id
    AND produit.categorie_id = categorie.id
    ORDER BY produit.nom";

    return mysqli_query($con, $req);
}

// Renvoie un produit avec l'id renseigné
function recup_produit_par_id($id){
    $con = sql_connect();
    $req = "SELECT produit.id as produit_id, produit.nom as produit_nom, prix, marque.id as marque_id, marque.nom as marque_nom, categorie.nom as categorie_nom, categorie.id as categorie_id
    FROM produit, marque, categorie
    WHERE produit.marque_id = marque.id
    AND produit.categorie_id = categorie.id
    AND produit.id = $id";

    return mysqli_query($con, $req);
}

// Renvoie tous les clients classés par nom
function recup_clients(){
    $con = sql_connect();
    $req = "SELECT * FROM client ORDER BY nom";
    return mysqli_query($con, $req);
}

// Renvoie le client avec l'id renseigné
function recup_client_par_id($id_client){
    $con = sql_connect();
    $req = "SELECT * FROM client WHERE id = $id_client";
    return mysqli_query($con, $req);
}

// Renvoie toutes les salles
function recup_salles(){
    $con = sql_connect();
    $req = "SELECT * FROM salle";
    return mysqli_query($con, $req);
}

// Récupère la salle avec l'id renseigné
function recup_salle_par_id($id_salle){
    $con = sql_connect();
    $req = "SELECT * FROM salle WHERE id = $id_salle";
    return mysqli_query($con, $req);
}

// Ajoute une salle
function ajouter_salle($nom, $description, $adresse, $ville, $code_postal, $tarif, $disponibilite, $photo){
    $con = sql_connect();
    $req = "INSERT INTO salle VALUES(null, '$nom', '$description','$adresse', '$ville', '$code_postal', $tarif, '$disponibilite')";
    mysqli_query($con, $req);
    if($photo['error'] == 0 && ($photo['type'] == 'image/jpg' || $photo['type'] == 'image/jpeg')) {
        $req = "SELECT id FROM salle ORDER BY id DESC LIMIT 0, 1";
        $last_id = mysqli_fetch_assoc(mysqli_query($con, $req));
        $last_id = $last_id['id'];
        move_uploaded_file($photo['tmp_name'], "images/salles/$last_id.jpg");  
    } 
}

// Modifie une salle
function modifier_salle($id, $nom, $description, $adresse, $ville, $code_postal, $tarif, $disponibilite, $photo){
    $con = sql_connect();
    $req = "UPDATE salle SET nom = '$nom',
    description = '$description',
    adresse = '$adresse',
    ville = '$ville',
    code_postal = '$code_postal',
    tarif = $tarif,
    disponibilite = '$disponibilite'
    WHERE id = $id";
    mysqli_query($con, $req);
    if($photo['error'] == 0 && ($photo['type'] == 'image/jpg' || $photo['type'] == 'image/jpeg')) {
        unlink("images/salles/$id.jpg");
        move_uploaded_file($photo['tmp_name'], "images/salles/$id.jpg");  
    } 
}


// Supprime la salle avec l'id renseigné
function supprimer_salle($id_salle){
    $con  = sql_connect();
    $req = "DELETE FROM salle WHERE id = $id_salle";
    unlink("images/salles/$id_salle.jpg");
	mysqli_query($con,$req);
}

// Renvoie tous les messages privés reçus
function recup_messages(){
    $con = sql_connect();
    $req = "SELECT * FROM contact ORDER BY date_envoie DESC";
    return mysqli_query($con, $req);
}

// Supprime le message privé avec l'id renseigné
function supprimer_message($id_message){
    $con  = sql_connect();
	$req = "DELETE FROM contact WHERE id = $id_message";
	mysqli_query($con,$req);
}

// Supprime le client avec l'id renseigné
function supprimer_client($id_client){
    $con  = sql_connect();
	$req = "DELETE FROM client WHERE id = $id_client";
	mysqli_query($con,$req);
}

// Envoie un message privé
function envoyer_message($email, $pseudo, $message, $date_envoie){
    $con  = sql_connect();
    $req = "INSERT INTO  contact(adresse_mail, pseudo, message, date_envoie) VALUES('$email','$pseudo','$message','$date_envoie')";
    mysqli_query($con,$req);
}

// Récupère tous les partenaires
function recup_partenaires(){
    $con = sql_connect();
    $req = "SELECT * FROM partenaire ORDER BY nom";
    return mysqli_query($con, $req);
}

// Ajoute un partenaire
function ajouter_partenaire($nom, $type){
    $con = sql_connect();
    $req = "INSERT INTO partenaire VALUES(null, '$nom', '$type')";
    mysqli_query($con, $req);
}

function recup_partenaire_par_id($id_partenaire){
    $con = sql_connect();
    $req = "SELECT * FROM partenaire WHERE id = $id_partenaire";
    return mysqli_query($con,$req);
}

// Supprime le partenaire avec l'id renseigné
function supprimer_partenaire($id_partenaire){
    $con  = sql_connect();
	$req = "DELETE FROM partenaire WHERE id = $id_partenaire";
	mysqli_query($con,$req);
}

// Modifie le partenaire de l'id renseigné
function modifier_partenaire($id, $nom, $type){
    $con = sql_connect();
    $req = "UPDATE partenaire SET nom = '$nom',
    type = '$type'
    WHERE id = $id";
    mysqli_query($con,$req);
}

function prix_total_panier(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['id']); $i++)
    {
        $total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
    }
    return $total;
}

function compter_panier(){
    $nb_produits = 0;
    if(isset($_SESSION['panier']['id'])){
        while($nb_produits < count($_SESSION['panier']['id'])){
            $nb_produits++;
        }
    }
    return $nb_produits;
}

?>