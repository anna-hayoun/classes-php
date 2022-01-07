<?php

include('user.php');
include('user-pdo.php');

session_start();

$upduser = new User();
$upduser = new Userpdo();
$upduser->login = $_SESSION['login'];

    if (isset($_POST['submit']))
    {
        $log = $_SESSION['login'];

        $login = $_POST['login'];
            
        $password = $_POST['password'];
            
        $email = $_POST['mail'];

        $firstname = $_POST['firstname'];

        $lastname = $_POST['lastname'];

        $upduser->update($login, $password, $email, $firstname, $lastname);

        echo "Votre profil a été modifié."; 
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="index.css" rel="stylesheet" type="text/css"/>
    <title>Classes - Profil</title>
</head>

<body>
    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">

<header>
    <nav>
        <p><a aria-current='page' href='index.php'>⎖ home</a></p>
    </nav>
</header>

<main>

<form class="box" action="" method="post">

    <h1 class="box-title">Modifier votre profil</h1>
    
	<input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur" required />
	
	<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />

	<input type="text" class="box-input" name="mail" placeholder="Email" required />

    <input type="text" class="box-input" name="firstname" placeholder="Prénom" required />

    <input type="text" class="box-input" name="lastname" placeholder="Nom" required />
	
	<input type="submit" name="submit" value="modifier" class="box-button" />
    
</form>

<div class="infos">
    <div class="inf"><p></br>Toutes vos informations:</br><p>

    <?php var_dump(array($upduser->getAllInfos())); ?></div>

    <div class="inf"><p></br>Votre Nom d'utilisateur:</br><p>

    <?php var_dump($upduser->getLogin()); ?></div>

    <div class="inf"><p></br>Votre Email:</br><p>

    <?php var_dump($upduser->getEmail()); ?></div>

    <div class="inf1"><p></br>Votre Prénom:</br><p>

    <?php var_dump($upduser->getFirstname()); ?></div>

    <div class="inf1"><p></br>Votre Nom:</br><p>

    <?php var_dump($upduser->getLastname()); ?></div>
</div>

</main>

<footer>

<div id="link">© 2022 Copyright:
    <a href="https://github.com/anna-hayoun/classes-php">github.com/anna-hayoun</a>
</div>

</footer>

</body>
</html>