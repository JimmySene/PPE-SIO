<!DOCTYPE html>
<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belle table - <?php echo $titrePage ?></title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css" /> <!-- BOOTSTRAP V4 -->
    <link rel="stylesheet" href="css/style.css"/>
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/scripts.js"></script>
    
</head>
<body <?php if($titrePage == "Accueil") echo 'class="menufond"' ?>>
    <header>
    <nav class="navbar navbar-expand-sm nav_color navbar-dark">
            <a href="index.php" class="navbar-brand "> <img src="Images/logo2.png" alt="Logo" style="width:200px;padding-bottom:12px;"></a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Services </a>
                        <div class="dropdown-menu">
                            <a href="produits.php" class="dropdown-item">Produits</a>
                            <a href="salles.php" class="dropdown-item">Réservation de salles</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="a-propos.php" class="nav-link">A propos</a></li>
                </ul>
            </div>
       
            <a href="panier.php" class="nav-link panier_nav"> <img src="Images/shop.png" alt="Panier" style="width:25px;padding-bottom:12px;"></a>
            <p id="menu_login" class=""><?php if(isset($_SESSION['login'])) {
                if($_SESSION['lvl'] != 0) { // Si l'utilisateur est admin affiche le lien du panneau d'admin ?> 
                    <a href="admin.php" ><img src="Images/admin.png" alt="Panneau admin" style="width:25px;padding-bottom:12px;padding-top:12px;margin-right: 10px"></a> 
                    <?php } ?>
                <a href="deconnexion.php" ><img src="Images/deco.png" alt="Déconnexion" style="width:25px;padding-bottom:12px;padding-top:12px;"></a> 
                <?php } 

                
                 else { ?>
                <a href="login.php" class="btn btn-primary">Connexion</a> <a href="inscription.php" class="btn btn-primary">Inscription</a><?php } ?>
            </p>
    
    </nav>

    </header>
    
 
       
        
