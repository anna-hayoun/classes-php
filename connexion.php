<?php

session_start();

include('user.php');
include('user-pdo.php');

$user = new User();
$user = new Userpdo();

    if (isset($_POST['submit']))
    {
        $login = $_POST['login'];
            
        $password = $_POST['password']; 

        $user->connect($login, $password);
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="index.css" rel="stylesheet" type="text/css"/>
    <title>Classes - Connexion</title>
</head>

<body>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">

<form class="box" action="" method="post" name="login">

<h1 class="box-title">Connexion</h1>

<input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">

<input type="password" class="box-input" name="password" placeholder="Mot de passe">

<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>

<footer>

<div id="link">© 2022 Copyright:
    <a href="https://github.com/anna-hayoun/livre-or">⎖ github.com/anna-hayoun</a>
</div>

</footer>

</body>
</html>