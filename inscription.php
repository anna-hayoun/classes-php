<?php

include('user.php');
include('user-pdo.php');

$newuser = new User();
$newuser = new Userpdo();

    if (isset($_POST['submit']))
    {
        $login = $_POST['login'];
            
        $password = $_POST['password'];
            
        $email = $_POST['mail'];

        $prenom = $_POST['prenom'];

        $nom = $_POST['nom'];

        $newuser->register($login, $password, $email, $prenom, $nom);
 
        header('Location: connexion.php');
    } 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="index.css" rel="stylesheet" type="text/css"/>
    <title>Classes - Inscription</title>
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">

<body>
    
<form class="box" action="" method="post">

    <h1 class="box-title">Inscrivez-vous !</h1>
    
	<input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur" required />
	
	<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />

	<input type="text" class="box-input" name="mail" placeholder="Email" required />

    <input type="text" class="box-input" name="prenom" placeholder="Prénom" required />

    <input type="text" class="box-input" name="nom" placeholder="Nom" required />
	
	<input type="submit" name="submit" value="S'inscrire" class="box-button" />
    
	<p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>

</form>

<footer>

<div id="link">© 2022 Copyright:
    <a href="https://github.com/anna-hayoun/livre-or">⎖ github.com/anna-hayoun</a>
</div>

</footer>

</body>
</html>