<!DOCTYPE html>
<?php session_start(); ?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belle table - <?php echo $titrePage ?></title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
<header>
    <h1>Belle Table</h1>
<p id="menu_login"><?php if(isset($_SESSION['login'])) { if($_SESSION['lvl'] != 0) { ?> <a href="admin.php">Panneau admin</a> | <?php } ?> <a href="deconnexion.php">Déconnexion</a> <?php } else { ?> <a href="login.php">connexion</a> | <a href="inscription.php">inscription</a><?php } ?></p>
    <nav>
        <ul>
        <li><a href="index.php">Présentation</a></li>
        <li><a href="produits.php">Produits</a></li>
        <li><a href="salles.php">Réservation de salles</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="forum.php">Forum</a></li>
        <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>
